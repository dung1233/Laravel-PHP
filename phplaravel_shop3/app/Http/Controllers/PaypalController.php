<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\Session;
use App\Models\PurchaseHistory;
class PaypalController extends Controller
{
    public function paypala(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $cart = session()->get('cart', []);
        $total = array_reduce($cart, function ($sum, $item) {
            return $sum + ($item['total_price'] * $item['quantity']);
        }, 0);

        $exchangeRate = 23000; // 1 USD = 23,000 VNĐ
        $totalUSD = round($total / $exchangeRate, 2);

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $totalUSD
                    ]
                ]
            ],
            "application_context" => [
                "return_url" => route('success'),
                "cancel_url" => route('cancel'),
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('tickets.cart')->with('error', 'Something went wrong.');
        }
    }

    public function success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $cart = session()->get('cart', []);

            foreach ($cart as $item) {
                PurchaseHistory::create([
                    'user_id' => Auth::id(),
                    'ticket_type' => $item['ticket_type'],
                    'name' => $item['name'],
                    'quantity' => $item['quantity'],
                    'total_price' => $item['total_price'],
                    'date' => $item['date'],
                    'time' => $item['time'],
                    'status' => 'completed',
                ]);
            }

            session()->forget('cart');
           
            return view('payment.success');
        }

        return redirect()->route('payment.cancel');
    }

    public function cancel()
    {
        $cart = session()->get('cart', []);

        foreach ($cart as $item) {
            PurchaseHistory::create([
                'user_id' => Auth::id(),
                'ticket_type' => $item['ticket_type'],
                'name' => $item['name'],
                'quantity' => $item['quantity'],
                'total_price' => $item['total_price'],
                'date' => $item['date'],
                'time' => $item['time'],
                'status' => 'failed',
            ]);
        }

        return view('payment.cancel');
    }
}


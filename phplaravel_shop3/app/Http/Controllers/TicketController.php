<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Price;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class TicketController extends Controller
{
    public function create()
    {
        $prices = Price::all();
        return view('muave.muave', compact('prices'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn phải đăng nhập trước khi mua vé.');
        }

        $request->validate([
            'date' => 'required|date',
            'time' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'ticket_type' => 'required|exists:prices,id',
        ]);

        $price = Price::find($request->ticket_type);
        $totalPrice = $price->price * $request->quantity;

        $ticketData = [
            'user_id' => Auth::id(),
            'ticket_type' => $price->ticket_type,
            'name' => $price->ticket_type,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'date' => $request->date,
            'time' => $request->time,
        ];

        // Lưu dữ liệu vào session
        $cart = session()->get('cart', []);

        // Kiểm tra xem mục đã tồn tại trong giỏ hàng hay chưa
        $found = false;
        foreach ($cart as $index => $item) {
            if ($item['ticket_type'] === $ticketData['ticket_type'] && $item['date'] === $ticketData['date'] && $item['time'] === $ticketData['time']) {
                // Cập nhật số lượng và tổng giá trị
                $cart[$index]['quantity'] += $ticketData['quantity'];
                $cart[$index]['total_price'] += $ticketData['total_price'];
                $found = true;
                break;
            }
        }

        if (!$found) {
            $cart[] = $ticketData;
        }

        session()->put('cart', $cart);

        if ($request->action === 'buy-now') {
            return redirect()->route('tickets.success');
        } else {
            return redirect()->route('tickets.cart');
        }
    }

    public function success()
    {
        $cart = session()->get('cart', []);
        $totalPrice = array_reduce($cart, function ($sum, $item) {
            return $sum + ($item['total_price'] * $item['quantity']);
        }, 0);
        $totalQuantity = array_reduce($cart, function ($sum, $item) {
            return $sum + $item['quantity'];
        }, 0);
        $total = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['total_price'] * $item['quantity']);
        }, 0);

        $totalUSD = $total / 23000;

        return view('thanhtoan.thanhtoan', compact('cart', 'totalPrice', 'totalQuantity', 'total', 'totalUSD'));
    }

    public function cart()
    {
        $cart = session()->get('cart', []);
        $total = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['total_price'] * $item['quantity']);
        }, 0);
        $totalUSD = $total / 23000;
        return view('thanhtoan.thanhtoan', compact('cart', 'total', 'totalUSD'));
    }

    public function removeFromCart($index)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$index])) {
            unset($cart[$index]);
            session()->put('cart', array_values($cart)); // Reset keys after removing item
        }
        return redirect()->route('tickets.success');
    }


    public function getTicketPrice()
    {
        $price = Price::where('ticket_type', 'standard')->first()->price;
        return response()->json(['price' => $price]);
    }

    public function processCheckout(Request $request)
    {
        $cart = session()->get('cart', []);
        $totalPrice = array_reduce($cart, function ($sum, $item) {
            return $sum + ($item['total_price'] * $item['quantity']);
        }, 0);
        $totalQuantity = array_reduce($cart, function ($sum, $item) {
            return $sum + $item['quantity'];
        }, 0);
        $total = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['total_price'] * $item['quantity']);
        }, 0);

        $totalUSD = $total / 23000;


        $request->session()->put('billing_info', $request->all());


        return view('paypal', compact('cart', 'totalPrice', 'totalQuantity', 'total', 'totalUSD'));
    }
    public function processPayment(Request $request)
    {
        // Xử lý thanh toán PayPal hoặc các phương thức thanh toán khác ở đây
        // Ví dụ: Chuyển hướng đến trang thanh toán PayPal
        if ($request->payment_method == 'paypal') {
            // Chuyển hướng đến xử lý thanh toán PayPal
            $cart = session()->get('cart', []);
            $totalPrice = array_reduce($cart, function ($sum, $item) {
                return $sum + ($item['total_price'] * $item['quantity']);
            }, 0);
            $totalQuantity = array_reduce($cart, function ($sum, $item) {
                return $sum + $item['quantity'];
            }, 0);

            return view('paypal', compact('cart', 'totalPrice', 'totalQuantity'));
        }

        // Xử lý các phương thức thanh toán khác
    }
    public function payWithPayPal(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $cart = session()->get('cart', []);
        $total = array_reduce($cart, function ($sum, $item) {
            return $sum + ($item['total_price'] * $item['quantity']);
        }, 0);

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $total
                    ]
                ]
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
}

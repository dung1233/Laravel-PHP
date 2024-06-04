<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Price;
use Illuminate\Support\Facades\Auth;

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
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'date' => $request->date,
            'time' => $request->time,
        ];

        // Lưu dữ liệu vào session
        $cart = session()->get('cart', []);
        $cart[] = $ticketData;
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
        return view('thanhtoan.thanhtoan', compact('cart'));
    }

    public function cart()
    {
        $cart = session()->get('cart', []);
        return view('thanhtoan.thanhtoan', compact('cart'));
    }

    public function removeFromCart($index)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$index])) {
            unset($cart[$index]);
            session()->put('cart', $cart);
        }
        return redirect()->route('tickets.success');
    }

    public function getTicketPrice()
    {
        $price = Price::where('ticket_type', 'standard')->first()->price;
        return response()->json(['price' => $price]);
    }
}



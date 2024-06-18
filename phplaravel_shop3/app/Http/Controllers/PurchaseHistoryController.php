<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseHistory;
use Illuminate\Support\Facades\Auth;

class PurchaseHistoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $purchaseHistories = PurchaseHistory::where( $user->all)->get();
        return view('payment.history', compact('purchaseHistories'));
    }
    public function show()
    {
        $userId = Auth::id();
        $purchases = PurchaseHistory::where('user_id', $userId)->get();
        return view('student.history.history', compact('purchases'));
    }
    public function showa()
    {
        $userId = Auth::user();
        $purchases = PurchaseHistory::with('user')->get();
        return view('admin.historyevent', compact('purchases'));
    }
}

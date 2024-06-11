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
}

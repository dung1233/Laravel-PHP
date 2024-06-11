<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExhibitionEntry;
use App\Models\Prices;
use App\Models\PurchaseHistory;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function index()
    {

        $entries = ExhibitionEntry::where('status', 'pending')->get();
        $totalTickets = PurchaseHistory::sum('quantity');
        $totalPrice = PurchaseHistory::sum('total_price');
        $totalEntries = ExhibitionEntry::count();
        $entriesByMonth = ExhibitionEntry::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Tạo một mảng với đủ 12 tháng và gán số lượng bài đăng vào từng tháng
        $entriesData = array_fill(1, 12, 0);
        foreach ($entriesByMonth as $month => $count) {
            $entriesData[$month] = $count;
        }
        $ticketsByMonth = PurchaseHistory::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Tạo một mảng với đủ 12 tháng và gán số lượng vé vào từng tháng
        $ticketsData = array_fill(1, 12, 0);
        foreach ($ticketsByMonth as $month => $count) {
            $ticketsData[$month] = $count;
        }
        $salesData = DB::table('purchase_histories')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(total_price) as total_sales'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();

        // Chuyển đổi dữ liệu sang định dạng mà Chart.js có thể sử dụng
        $months = [];
        $sales = [];
        foreach ($salesData as $data) {
            $months[] = $data->month;
            $sales[] = $data->total_sales;
        }



        return view('Admin.admin', compact('entries', 'totalTickets', 'totalPrice', 'totalEntries', 'entriesData', 'ticketsData', 'months', 'sales'));
    }
    public function Xetduyet()
    {
        $entries = ExhibitionEntry::where('status', 'pending')->get();
        $totalTickets = PurchaseHistory::sum('quantity');
        $totalPrice = PurchaseHistory::sum('total_price');
        $totalEntries = ExhibitionEntry::count();

        return view('Admin.xetduyet', compact('entries', 'totalTickets', 'totalPrice', 'totalEntries'));
    }
    public function updateStatus(Request $request, $id)
    {
        $entry = ExhibitionEntry::find($id);
        $entry->status = $request->status;
        $entry->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }
    public function history()
    {
        $entries = ExhibitionEntry::with('user', 'exhibition')->get();

        // Truyền dữ liệu tới view
        return view('admin.eventhistory', compact('entries'));
    }


    public function chart()
    {


        $entries = ExhibitionEntry::where('status', 'pending')->get();
    $totalTickets = PurchaseHistory::sum('quantity');
    $totalPrice = PurchaseHistory::sum('total_price');
    $totalEntries = ExhibitionEntry::count();
    $entriesByMonth = ExhibitionEntry::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('month')
        ->pluck('count', 'month')
        ->toArray();

    // Tạo một mảng với đủ 12 tháng và gán số lượng bài đăng vào từng tháng
    $entriesData = array_fill(1, 12, 0);
    foreach ($entriesByMonth as $month => $count) {
        $entriesData[$month] = $count;
    }

    $ticketsByMonth = PurchaseHistory::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('month')
        ->pluck('count', 'month')
        ->toArray();

    // Tạo một mảng với đủ 12 tháng và gán số lượng vé vào từng tháng
    $ticketsData = array_fill(1, 12, 0);
    foreach ($ticketsByMonth as $month => $count) {
        $ticketsData[$month] = $count;
    }

    $salesData = PurchaseHistory::selectRaw('DATE(created_at) as date, SUM(total_price) as total_sales')
    ->groupBy(DB::raw('DATE(created_at)'))
    ->orderBy('date')
    ->get();

    // Chuyển đổi dữ liệu sang định dạng mà Chart.js có thể sử dụng
    $dates = [];
    $sales = [];
    foreach ($salesData as $data) {
        $dates[] = $data->date;
        $sales[] = $data->total_sales;
    }

    return view('Admin.chart', compact('entries', 'totalTickets', 'totalPrice', 'totalEntries', 'entriesData', 'ticketsData', 'dates', 'sales'));
    }
    public function getChartData(Request $request)
{
    $period = $request->input('period', 'month');

    if ($period == 'month') {
        $salesData = PurchaseHistory::selectRaw('DATE(created_at) as date, SUM(total_price) as total_sales')
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('date')
            ->get();
    } else {
        $salesData = PurchaseHistory::selectRaw('YEAR(created_at) as date, SUM(total_price) as total_sales')
            ->groupBy(DB::raw('YEAR(created_at)'))
            ->orderBy('date')
            ->get();
    }

    $dates = [];
    $sales = [];
    foreach ($salesData as $data) {
        $dates[] = $data->date;
        $sales[] = $data->total_sales;
    }

    return response()->json([
        'dates' => $dates,
        'sales' => $sales,
    ]);
}
}

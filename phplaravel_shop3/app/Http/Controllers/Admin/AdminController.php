<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExhibitionEntry;
use App\Models\Prices;
class AdminController extends Controller
{
   
    public function index(){

       $entries = ExhibitionEntry::where('status', 'pending')->get();
       
       return view('Admin.admin', compact('entries'));
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
}

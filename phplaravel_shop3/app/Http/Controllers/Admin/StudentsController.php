<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\ExhibitionEntry;

class StudentsController extends Controller
{
  public function index()
  {


    $user = Auth::user(); // Lấy thông tin người dùng hiện tại
    $products = $user->products;
    $entries = ExhibitionEntry::with('user', 'exhibition')->get();
    return view('student.students', compact('products', 'entries'));
    $entries = ExhibitionEntry::with('user', 'exhibition')->get();
    return view('student.chucnang.suabai', compact('products', 'entries'));
    $exhibitions = Event::all(); // Truy vấn tất cả các sự kiện
    return view('student.chucnang.sukien', compact('exhibitions'));
  }
}

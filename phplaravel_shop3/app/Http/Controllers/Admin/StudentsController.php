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
        $userId = Auth::id();

        // Lấy các bài đăng của người dùng hiện tại
        $entries = ExhibitionEntry::where('user_id', $userId)
            ->with('user', 'exhibition')
            ->get();

        return view('student.students', compact('entries'));
    }
}

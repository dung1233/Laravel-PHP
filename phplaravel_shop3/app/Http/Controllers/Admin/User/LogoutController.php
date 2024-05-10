<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout()
    {
        Auth::logout(); // Đăng xuất người dùng
        return redirect('/'); // Chuyển hướng người dùng đến trang chính
    }
}

<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        // Hiển thị trang đăng nhập, bạn có thể tùy chỉnh view tương ứng
        return view('loginad.login', [
            'title' => 'Login System'
        ]);
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $user = Auth::user();

            // Kiểm tra loại người dùng
            if ($user->UserType == 1) { // Nếu là admin
                Auth::logout();
                return redirect()->route('login.admin')->withErrors([
                    'email' => 'Admins must log in from the admin login page.',
                ]);
            }

            return $this->authenticated($request, $user);
        } else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    protected function authenticated(Request $request, $user)
    {
        // Nếu là sinh viên
        if ($user->UserType == 2) {
            return redirect()->route('profile.student');
        }
        // Nếu là nhân viên ngoài
        if ($user->UserType == 3) {
            return redirect()->route('profile.external');
        }

        return redirect('/');
    }
    
}

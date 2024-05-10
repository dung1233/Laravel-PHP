<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function index(){
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
        return $this->authenticated($request, $user);
    } else {
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}

protected function authenticated(Request $request, $user)
{
    // Nếu là admin
    if ($user->UserType == 1) {
        return redirect()->route('admin');
    }

    // Nếu là sinh viên
    if ($user->UserType == 2) {
        return redirect()->route('student');
    }

    // Nếu là nhân viên ngoài
    if ($user->UserType == 3) {
        return redirect()->route('external');
    }

    return redirect('/');
}
    
}



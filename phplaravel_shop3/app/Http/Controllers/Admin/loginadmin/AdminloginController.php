<?php

namespace App\Http\Controllers\Admin\loginadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminloginController extends Controller
{
    public function index()
    {
        // Hiển thị trang đăng nhập, bạn có thể tùy chỉnh view tương ứng
        return view('admin.login', [
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
        if ($user->UserType == 1) {
            return redirect()->route('profile.admin');
        }
        return redirect('/');
    }
};

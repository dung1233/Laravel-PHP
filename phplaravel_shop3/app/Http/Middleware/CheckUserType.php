<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra người dùng đã đăng nhập và có user_type là 'student' hay không
        if (Auth::check() && Auth::user()->user_type == 3) {
            return $next($request);
        }

        // Nếu không phải là 'student', bạn có thể redirect họ đi nơi khác
        return('error Bạn không có quyền truy cập vào trang này.');
    }
}

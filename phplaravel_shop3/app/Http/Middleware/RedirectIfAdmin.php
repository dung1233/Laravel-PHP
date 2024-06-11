<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAdmin
{
    public function handle(Request $request, Closure $next)
{
    if (Auth::check() && Auth::user()->UserType == 1) {
        Auth::logout();
        return redirect()->route('login.admin')->withErrors([
            'email' => 'Admins must log in from the admin login page.',
        ]);
    }

    return $next($request);
}

}

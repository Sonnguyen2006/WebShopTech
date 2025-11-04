<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra user đã login chưa
        if (!Auth::check()) {
            // Chuyển về login với message
            return redirect('/login')->with('error', 'Bạn chưa đăng nhập');
        }

        // Nếu đã login, tiếp tục request
        return $next($request);
    }
}

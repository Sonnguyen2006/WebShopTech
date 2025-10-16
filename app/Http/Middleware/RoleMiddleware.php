<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role): Response
    {

        $userRole = Auth::user()->role;

        // Cho phép admin vào cả home
        if ($role === 'user' && $userRole !== 'user' && $userRole !== 'admin') {
            abort(403, 'Access denied');
        }

        if ($role === 'admin' && $userRole !== 'admin') {
            abort(403, 'Access denied');
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CTVMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || !in_array(auth()->user()->role, ['admin', 'ctv'])) {
            abort(403, 'Ban khong co quyen truy cap trang nay.');
        }

        return $next($request);
    }
}

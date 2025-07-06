<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanchayatAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('panchayat')->check()) {
            return redirect()->route('panchayat.login');
        }

        return $next($request);
    }
} 
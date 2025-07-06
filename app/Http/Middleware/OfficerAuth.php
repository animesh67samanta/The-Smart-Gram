<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfficerAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('officer')->check()) {
            return redirect()->route('officer.login');
        }

        return $next($request);
    }
} 
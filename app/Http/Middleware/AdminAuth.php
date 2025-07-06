<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }

        // Check if the authenticated user is an admin user
        if (Auth::guard('admin')->user()->user_type !== 'admin') {
            return redirect()->route('admin.login')->with('error', 'Access denied. Only admin users can access this area.');
        }

        return $next($request);
    }
}

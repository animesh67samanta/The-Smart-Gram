<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class InactivityLogout
{
    public function handle(Request $request, Closure $next)
    {
        $guards = [
            'admin' => 'admin.login',
            'officer' => 'officer.login',
            'panchayat' => 'panchayat.login',
        ];
        $timeout = 30000; // 5 minutes in seconds
        $now = Carbon::now()->timestamp;
        foreach ($guards as $guard => $loginRoute) {
            if (Auth::guard($guard)->check()) {
                $lastActivity = session('last_activity_' . $guard);
                if ($lastActivity && ($now - $lastActivity > $timeout)) {
                    Auth::guard($guard)->logout();
                    session()->invalidate();
                    session()->regenerateToken();
                    return redirect()->route($loginRoute)->with('error', 'You have been logged out due to inactivity.');
                }
                session(['last_activity_' . $guard => $now]);
            }
        }
        return $next($request);
    }
} 
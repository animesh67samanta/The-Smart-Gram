<?php

namespace App\Http\Controllers\panchayat;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Property;
use App\Models\BirthCertificate;
use App\Models\DeathCertificate;
use App\Models\MarriageCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AuthOfficerController extends Controller
{

    public function showLoginForm()
    {
        // If user is already logged in, redirect to dashboard
        if (Auth::guard('officer')->check()) {
            return redirect()->route('officer.officer.dashboard');
        }
        
        return view('officer.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember_me');

        if (Auth::guard('officer')->attempt($credentials, $remember)) {
            // Check if the authenticated user is an officer user
            if (Auth::guard('officer')->user()->user_type !== 'officer') {
                Auth::guard('officer')->logout();
                return redirect()->back()->with('error', 'Access denied. Only officer users can access this area.');
            }
            
            $request->session()->regenerate();
            return redirect()->intended(route('officer.officer.dashboard'));
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function logout(Request $request)
    {
        Auth::guard('officer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('officer.login');
    }
}

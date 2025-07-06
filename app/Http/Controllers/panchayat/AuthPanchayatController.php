<?php

namespace App\Http\Controllers\panchayat;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Property;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthPanchayatController extends Controller
{

    public function showLoginForm()
    {
        // If user is already logged in, redirect to dashboard
        if (Auth::guard('panchayat')->check()) {
            return redirect()->route('panchayat.dashboard');
        }
        
        return view('panchayat.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember_me');

        if (Auth::guard('panchayat')->attempt($credentials, $remember)) {
            // Check if the authenticated user is a panchayat user
            if (Auth::guard('panchayat')->user()->user_type !== 'panchayat') {
                Auth::guard('panchayat')->logout();
                return redirect()->back()->with('error', 'Access denied. Only panchayat users can access this area.');
            }
            
            $request->session()->regenerate();
            return redirect()->intended(route('panchayat.dashboard'));
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function dashboard()
    {
        $userId = Auth::guard('panchayat')->user()->id;
        $totalProperty = Property::where('panchayat_id', $userId)->count();

        return view('panchayat.pages.dashboard.dashboard', compact('totalProperty'));
    }

    public function profile()
    {
        return view('panchayat.auth.profile');
    }

    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string',
            'password' => 'required|string',
            'confirm_password' => 'required|string|same:password',
        ]);

        $user = Auth::guard('panchayat')->user();

        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'The old password is incorrect.',
            ], 403);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Password updated successfully!',
        ], 200);
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        Admin::where('id', Auth::guard('panchayat')->user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully!',
        ], 200);
    }

    public function logout(Request $request)
    {
        Auth::guard('panchayat')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('panchayat.login');
    }
}

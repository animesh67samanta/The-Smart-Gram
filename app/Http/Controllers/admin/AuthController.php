<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\BirthCertificate;
use App\Models\DeathCertificate;
use App\Models\MarriageCertificate;
use App\Models\Property;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|string',
    //     ]);

    //     $credentials = $request->only('email', 'password');
    //     $remember = $request->filled('remember_me');

    //     if (Auth::guard('admin')->attempt($credentials, $remember)) {
    //         $request->session()->regenerate();
    //         if (Auth::guard('admin')->user()->user_type=='panchayat'){

    //             return redirect()->intended(route('panchayat.dashboard'));
    //         }
    //         else{
    //             return redirect()->back()->withErrors('error',);
    //         }

    //         return redirect()->intended(route('admin.dashboard'));
    //     }


    // }
    public function login(Request $request)
{
    // Validate the input fields
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    // Get credentials and the 'remember me' option
    $credentials = $request->only('email', 'password');
    $remember = $request->filled('remember_me');

    // Attempt to login using the 'admin' guard
    if (Auth::guard('admin')->attempt($credentials, $remember)) {
        // Regenerate session to prevent session fixation
        $request->session()->regenerate();

        // Check the user_type to redirect to the appropriate dashboard
        if (Auth::guard('admin')->user()->user_type == 'admin') {
            return redirect()->intended(route('admin.dashboard'));
        } else {
            // If user_type is not recognized, log out and show an error
            Auth::guard('admin')->logout();
            return redirect()->back()->withErrors(['error' => 'Invalid user type.']);
        }
    }

    // If login fails, redirect back with an error message
    return redirect()->back()->withErrors(['error' => 'Invalid login credentials.']);
}


    public function dashboard()
    {
        $panchayats = Admin::where('user_type','panchayat')->get();
        $userCount = [
            'panchayat' => Admin::where('user_type', 'panchayat')->count(),
            'officer'   => Admin::where('user_type', 'officer')->count(),
        ];

        $propertyCount = Property::count();

        $certificateCount = BirthCertificate::count() 
            + DeathCertificate::count() 
            + MarriageCertificate::count();

        $totalUserCount = array_sum($userCount);
        return view('admin.pages.dashboard.dashboard',compact('panchayats', 'totalUserCount', 'propertyCount', 'certificateCount'));
    }
    public function profile()
    {
        return view('admin.auth.profile');
    }
    public function passwordUpdate(Request $request)
    {
        // dd($request->all());
        // Validate the input data
        $request->validate([
            'old_password' => 'required|string', // Old password
            'password' => 'required|string', // Old password
            'confirm_password' => 'required|string|same:password', // New password with confirmation
        ]);


        // Get the current authenticated user
        $user = Auth::guard('admin')->user();

        // Check if the old password matches
        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'The old password is incorrect.',
            ], 403);
        }

        // Update the user's password
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Password updated successfully!',
        ], 200);
    }

    public function profileUpdate(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'address'=>'required',
        ]);
        Admin::where('id',Auth::guard('admin')->user()->id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,

        ]);
        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully!',
        ], 200);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}

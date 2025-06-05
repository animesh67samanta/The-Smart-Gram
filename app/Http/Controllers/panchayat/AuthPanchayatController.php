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
use Illuminate\Support\Facades\Validator;

class AuthPanchayatController extends Controller
{

    public function showLoginForm()
    {
        return view('panchayat.auth.login');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required|string',
        // ]);

        $credentials = $request->only('email', 'password');
        // dd( $credentials);
        $remember = $request->filled('remember_me');

        if (Auth::guard('admin')->attempt($credentials)) {
            // dd(Auth::guard('admin')->user());

            if (Auth::guard('admin')->user()->user_type=="panchayat"){

                return redirect()->intended(route('panchayat.dashboard'));
            }
            if (Auth::guard('admin')->user()->user_type=="officer"){

                return redirect()->intended(route('panchayat.officer.dashboard'));
            }


            else{
                return redirect()->back()->with('error','You donot have permission to login panchayat');
            }
        }else{
            return redirect()->back()->with('error','Wrong Credential');
        }


    }

    public function dashboard()
    {
        $userId = Auth::guard('admin')->user()->id;
        $totalProperty = Property::where('panchayat_id', $userId)->count();

        return view('panchayat.pages.dashboard.dashboard',compact('totalProperty'));
    }
    public function officerDashboard()
    {
        $totalBirthCertificate = BirthCertificate::where('panchayat_id',Auth::guard('admin')->user()->panchayat_id)->where('approve_status', 1)->count();
        $totalDeathCertificate = DeathCertificate::where('panchayat_id',Auth::guard('admin')->user()->panchayat_id)->where('approve_status', 1)->count();
        $totalMarriageCertificate = MarriageCertificate::where('panchayat_id',Auth::guard('admin')->user()->panchayat_id)->where('approve_status', 1)->count();
        return view('panchayat.pages.dashboard.officer_dashboard',compact('totalBirthCertificate','totalDeathCertificate','totalMarriageCertificate'));
    }
    public function profile()
    {
        return view('panchayat.auth.profile');
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
        return redirect()->route('panchayat.login');
    }
}

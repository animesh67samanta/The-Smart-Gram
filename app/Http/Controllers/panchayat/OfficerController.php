<?php

namespace App\Http\Controllers\panchayat;

use App\Http\Controllers\Controller;

use App\Models\BirthCertificate;
use App\Models\DeathCertificate;
use App\Models\MarriageCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class OfficerController extends Controller
{
    /**
     * Display the officer dashboard
     */
    public function dashboard()
    {
        $totalBirthCertificate = BirthCertificate::where('panchayat_id', Auth::guard('officer')->user()->panchayat_id)
            ->where('approve_status', 1)->count();
        $totalDeathCertificate = DeathCertificate::where('panchayat_id', Auth::guard('officer')->user()->panchayat_id)
            ->where('approve_status', 1)->count();
        $totalMarriageCertificate = MarriageCertificate::where('panchayat_id', Auth::guard('officer')->user()->panchayat_id)
            ->where('approve_status', 1)->count();
        
        return view('officer.dashboard', compact('totalBirthCertificate', 'totalDeathCertificate', 'totalMarriageCertificate'));
    }

    /**
     * Display the officer profile
     */
    public function profile()
    {
        return view('officer.auth.profile');
    }

    /**
     * Update officer password
     */
    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string',
            'password' => 'required|string',
            'confirm_password' => 'required|string|same:password',
        ]);

        $user = Auth::guard('officer')->user();

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

    /**
     * Update officer profile
     */
    public function profileUpdate(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
        ]);

        $user = Auth::guard('officer')->user();
        $user->update($request->only(['name', 'email', 'phone', 'address']));
        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Profile updated successfully!']);
        }
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    /**
     * Logout officer
     */
    public function logout()
    {
        Auth::guard('officer')->logout();
        return redirect()->route('officer.login');
    }

    // Certificate Approval Methods
    public function birthCertificateApprovalList()
    {
        $birthCertificates = BirthCertificate::where('panchayat_id', Auth::guard('officer')->user()->panchayat_id)->get();
        return view('officer.certificate_approval.birth_certificate_approval_list', compact('birthCertificates'));
    }

    public function birthCertificateApprove($id)
    {
        $birthCertificate = BirthCertificate::findOrFail($id);
        $birthCertificate->approve_status = 1;
        $birthCertificate->approve_time = Date::now();
        $birthCertificate->save();
        return redirect()->back()->with('success', 'Birth Certificate approved successfully.');
    }

    public function birthCertificateView($id)
    {
        $details = BirthCertificate::with('panchayat')->findOrFail($id);
     
        return view('officer.officer_certificate_view.birth_certificate_view', compact('details'));
    }

    public function deathCertificateApprovalList()
    {
        $deathCertificates = DeathCertificate::where('panchayat_id', Auth::guard('officer')->user()->panchayat_id)->get();
        return view('officer.certificate_approval.death_certificate_approval_list', compact('deathCertificates'));
    }

    public function deathCertificateApprove($id)
    {
        $deathCertificate = DeathCertificate::findOrFail($id);
        $deathCertificate->approve_status = 1;
        $deathCertificate->approve_time = Date::now();
        $deathCertificate->save();
        return redirect()->back()->with('success', 'Death Certificate approved successfully.');
    }

    public function deathCertificateView($id)
    {
        $details = DeathCertificate::with('panchayat')->findOrFail($id);
        return view('officer.officer_certificate_view.death_certificate_view', compact('details'));
    }

    public function marriageCertificateApprovalList()
    {
        $marriageCertificates = MarriageCertificate::where('panchayat_id', Auth::guard('officer')->user()->panchayat_id)->get();
        return view('officer.certificate_approval.marriage_certificate_approval_list', compact('marriageCertificates'));
    }

    public function marriageCertificateApprove($id)
    {
        $marriageCertificate = MarriageCertificate::findOrFail($id);
        $marriageCertificate->approve_status = 1;
        $marriageCertificate->approve_time = Date::now();
        $marriageCertificate->save();
        return redirect()->back()->with('success', 'Marriage Certificate approved successfully.');
    }

    public function marriageCertificateView($id)
    {
        $details = MarriageCertificate::with('panchayat')->findOrFail($id);
        return view('officer.officer_certificate_view.marriage_certificate_view', compact('details'));
    }
} 
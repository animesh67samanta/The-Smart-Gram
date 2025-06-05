<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\BirthCertificate;
use App\Models\DeathCertificate;
use App\Models\MarriageCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Stichoza\GoogleTranslate\GoogleTranslate;

class OfficerController extends Controller
{
    public function officerCreate($id = null)
    {
        $panchayats = Admin::where('user_type','panchayat')->get();
        return view('admin.pages.officers.create', compact('panchayats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function officerStore(Request $request, $id = null)
    {

        // Validate input fields
        $request->validate([
            'panchayat_id' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:100',
            'phone' => 'required|string|max:50',
            'address' => 'required|string|max:255',
            'password' => 'nullable|string|min:6|confirmed', // Only require password if creating a new record
        ]);

        // Check if an officer already exists for the selected panchayat_id
        $existingOfficer = Admin::where('panchayat_id', $request->panchayat_id)
                                ->where('user_type', 'officer')
                                ->first();

        if ($existingOfficer) {
            // Redirect to the edit route with a message if an officer exists
            return redirect()->route('admin.officer.edit', $existingOfficer->id)
                             ->with('warning', 'Officer already exists for this Panchayat. You can edit the officer details.');
        }

        // Handle digital signature upload
        $digitalSignaturePath = null;
        if ($request->hasFile('digital_signature')) {
            $digitalSignature = $request->file('digital_signature');
            $digitalSignatureName = time() . '_' . $digitalSignature->getClientOriginalName();
            $digitalSignature->move(public_path('digital_signature'), $digitalSignatureName);
            $digitalSignaturePath = 'digital_signature/' . $digitalSignatureName;
        }

        // Create a new officer if none exists
        Admin::create([
            'panchayat_id' => $request->panchayat_id,
            'name' => $request->name,
            'name_mr' =>  GoogleTranslate::trans($request->name, 'mr'),
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'address_mr' =>  GoogleTranslate::trans($request->address, 'mr'),
            'password' => Hash::make($request->password),
            'user_type' => 'officer',
            'digital_signature' => $digitalSignaturePath,
        ]);

        return redirect()->route('admin.officer.list')->with('success', 'Officer created successfully.');
    }


    public function officerList()
    {
        $officers = Admin::where('user_type', 'officer')->with('panchayatName')->get();

        return view('admin.pages.officers.list', compact('officers'));
    }

    public function officerEdit($id)
    {
        $officer = Admin::find($id);
        $panchayats = Admin::where('user_type','panchayat')->get();
        return view('admin.pages.officers.edit', compact('officer','panchayats'));

    }

    public function officerUpdate(Request $request, $id)
    {
        // Define validation rules
        $request->validate([
            'panchayat_id' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:100',
            'phone' => 'required|string|max:50',
            'address' => 'required|string|max:255',
        ]);
        $officer = Admin::find($id);

        if ($request->hasFile('digital_signature')) {
            $digitalSignature = $request->file('digital_signature');
            $digitalSignatureName = time() . '_' . $digitalSignature->getClientOriginalName();
            $digitalSignature->move(public_path('digital_signature'), $digitalSignatureName);
            // $digitalSignaturePath = 'digital_signature/' . $digitalSignatureName;
            $officer->digital_signature = 'digital_signature/' . $digitalSignatureName;
        }

        $officer->user_type = 'officer';
        $officer->panchayat_id = $request->panchayat_id;
        $officer->name = $request->name;
        $officer->name_mr = $request->name_mr;

        $officer->email = $request->email;
        $officer->phone = $request->phone;
        $officer->address = $request->address;
        $officer->address_mr = $request->address_mr;

        $officer->password = Hash::make($request->password);


        $officer->save();
        return redirect()->route('admin.officer.list')->with('success', 'Officer updated successfully.');
    }

    public function officerDelete($id)
    {
        $officer = Admin::find($id);
        $officer->delete();
        return redirect()->back()->with('success', 'Officer deleted successfully.');
    }

    //controller for certificate approval
    public function birthCertificateApprovalList(){
       $birthCertificates = BirthCertificate::where('panchayat_id',Auth::guard('admin')->user()->panchayat_id)->get();
       return view('panchayat.pages.certificate_approval.birth_certificate_approval_list',compact('birthCertificates'));
    }

    public function birthCertificateApprove($id){
        $birthCertificate = BirthCertificate::findOrFail($id);
        $birthCertificate->approve_status = 1;
        $birthCertificate->approve_time = Date::now();
        $birthCertificate->save();
        return redirect()->back()->with('success', 'Birth Certificate approved successfully.');
    }

    public function birthCertificateView($id){

        $details = BirthCertificate::with('panchayat')->findOrFail($id);
        return view('panchayat.pages.officer_certificate_view.birth_certificate_view',compact('details'));

    }

    public function deathCertificateApprovalList(){
        $deathCertificates = DeathCertificate::where('panchayat_id',Auth::guard('admin')->user()->panchayat_id)->get();
        return view('panchayat.pages.certificate_approval.death_certificate_approval_list',compact('deathCertificates'));
    }

     public function deathCertificateApprove($id){
         $deathCertificate = DeathCertificate::findOrFail($id);
         $deathCertificate->approve_status = 1;
         $deathCertificate->approve_time = Date::now();
         $deathCertificate->save();
         return redirect()->back()->with('success', 'Death Certificate approved successfully.');
     }

     public function deathCertificateView($id){

        $details = DeathCertificate::with('panchayat')->findOrFail($id);
        return view('panchayat.pages.officer_certificate_view.death_certificate_view',compact('details'));

    }

     public function marriageCertificateApprovalList(){
        $marriageCertificates = MarriageCertificate::where('panchayat_id',Auth::guard('admin')->user()->panchayat_id)->get();
        return view('panchayat.pages.certificate_approval.marriage_certificate_approval_list',compact('marriageCertificates'));
    }

    public function marriageCertificateApprove($id){
         $marriageCertificate = MarriageCertificate::findOrFail($id);
         $marriageCertificate->approve_status = 1;
         $marriageCertificate->approve_time = Date::now();
         $marriageCertificate->save();
         return redirect()->back()->with('success', 'Marriage Certificate approved successfully.');
    }

    public function marriageCertificateView($id){

        $details = MarriageCertificate::with('panchayat')->findOrFail($id);
        return view('panchayat.pages.officer_certificate_view.marriage_certificate_view',compact('details'));

    }
}

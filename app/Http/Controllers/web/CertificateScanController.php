<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BirthCertificate;
use App\Models\DeathCertificate;
use App\Models\MarriageCertificate;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class CertificateScanController extends Controller
{
    public function birthCertificateScan($id){

       $details = BirthCertificate::with('panchayat')->where('id',$id)->first();
       $officer = Admin::where('panchayat_id',$details->panchayat_id)->where('user_type', 'officer')->first();
       return view('web.birth_certificate_scan', compact('details','officer'));
    }

    public function deathCertificateScan($id){

        $details = DeathCertificate::with('panchayat')->where('id',$id)->first();
        $officer = Admin::where('panchayat_id', $details->panchayat_id)->where('user_type', 'officer')->first();
        return view('web.death_certificate_scan', compact('details','officer'));
     }

     public function marriageCertificateScan($id){

        $details = MarriageCertificate::with('panchayat')->where('id',$id)->first();
        $officer = Admin::where('panchayat_id',$details->panchayat_id)->where('user_type', 'officer')->first();
        return view('web.marriage_certificate_scan', compact('details','officer'));
     }
}

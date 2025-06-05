@extends('panchayat.layouts.main')
@section('title', 'Details of Birth Certificate')
@section('content')

<div class="page-wrapper text-white">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">BirthCertificate</div>
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('panchayat.dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Details</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Birth Certificate Details</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Panchayat Name:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{  Auth::guard('admin')->user()->name  }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Child's Name:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->childname }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Child's Name in Maratrhi:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->childname_mr }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Date of Birth:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->dob }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Gender:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->gender }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Gender in Marathi :</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->gender_mr }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Father's Name:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->father_name }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Father's Name in Marathi:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->father_name_mr }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Mother's Name:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->mother_name }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Mother's Name in Marathi:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->mother_name_mr }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Place of Birth:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->birth_place }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Permanent Address:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->permanent_address }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Permanent Address in Marathi:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->permanent_address_mr }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Registration Number:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->registration_number }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Registration Number in Marathi:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->registration_number_mr }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Registration Date:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->registration_date }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Remarks:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->remarks }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Issue Date:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->issue_date }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Certificate Number:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->number }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Parent's Address:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->parent_address }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Parent's Address in Marathi:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->parent_address_mr }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Parent's Nationality:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->parent_nationality }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Parent's Nationality in Marathi: </label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->parent_nationality_mr }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Aadhar Card Number (Father):</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->adhar_card_no_father }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Aadhar Card Number (Mother):</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->adhar_card_no_mother }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

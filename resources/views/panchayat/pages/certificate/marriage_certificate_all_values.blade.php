@extends('panchayat.layouts.main')
@section('title', 'Details of Marriage Certificate')
@section('content')

<div class="page-wrapper text-white">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Marriage Certificate</div>
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-2">
                        <li class="breadcrumb-item"><a href="{{ route('panchayat.dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Details</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Marriage Certificate Details</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Panchayat Name:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ Auth::guard('admin')->user()->name }}</p>
                    </div>
                </div>

                <!-- Groom Details -->
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Groom's Name:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->groom_name }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Groom's Name in Marathi:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->groom_name_mr }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Groom's Address:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->groom_address }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Groom's Address in Marathi:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->groom_address_mr }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Groom's Religion:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->groom_religion }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Groom's Religion in Marathi:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->groom_religion_mr }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Groom's Nationality:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->groom_nationality }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Groom's Nationality in Marathi:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->groom_nationality_mr }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Groom's Guardian's Name:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->groom_gurdian_name }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Groom's Guardian's Name in Marathi:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->groom_gurdian_name_mr }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Groom's Guardian's Address:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->groom_gurdian_address }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Groom's Guardian's Address in Marathi:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->groom_gurdian_address_mr }}</p>
                    </div>
                </div>

                <!-- Bride Details -->
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Bride's Name Before Marriage:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->bride_name_before_marriage }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Bride's Name Before Marriage in Marathi:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->bride_name_before_marriage_mr }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Bride's Name After Marriage:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->bride_name }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Bride's Name After Marriage in Marathi:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->bride_name_mr }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Bride's Address:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->bride_address }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Bride's Address in Marathi:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->bride_address_mr }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Bride's Religion:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->bride_religion }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Bride's Religion in Marathi:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->bride_religion_mr }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Bride's Nationality:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->bride_nationality }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Bride's Nationality in Marathi:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->bride_nationality_mr }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Bride's Guardian's Name:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->bride_gurdian_name }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Bride's Guardian's Name in Marathi:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->bride_gurdian_name_mr }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Bride's Guardian's Address:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->bride_gurdian_address }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Bride's Guardian's Address in Marathi:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->bride_gurdian_address_mr }}</p>
                    </div>
                </div>

                <!-- Marriage Details -->
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Date of Marriage:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->date_of_marriage }}</p>
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
                    <label class="col-sm-3 col-form-label">Issue Date:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->issue_date }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Remarks:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->remarks }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Remarks in Marathi:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext text-white">{{ $details->remarks_mr }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

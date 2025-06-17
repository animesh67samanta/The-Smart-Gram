@extends('panchayat.layouts.main')
@section('title', 'Death Certificate List')
@section('content')

<div class="wrapper">
    <div class="page-wrapper">
        <div class="page-content">

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Death Certificate</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-2">
                            <li class="breadcrumb-item"><a href="{{ route('panchayat.dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">List</li>
                        </ol>
                    </nav>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body">
                     <!-- CSV Upload Form -->
                   <div class="mb-4">
                        <h5>Upload Death Certificates (CSV)</h5>
                        <form action="{{ route('panchayat.deathCertificate.bulkUpload') }}" method="POST" enctype="multipart/form-data" class="d-flex align-items-center">
                            @csrf
                            <div class="col-sm-12 col-md-6">
                                <div class="mb-2 mt-2">
                                    <div class="d-flex align-items-center">
                                        <a href="{{ asset('csv/death-certificate.csv') }}" class="btn btn-sm btn-outline-warning me-2">
                                            <i class="fas fa-file-csv me-1"></i> Download Sample CSV
                                        </a>
                                        <small class="text-warning">Use this template to ensure proper formatting</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="mb-2 mt-2">
                                    <div class="input-group">
                                        <input type="file" name="csv_file" class="form-control" accept=".csv" required>
                                        <button type="submit" class="btn btn-info ms-2">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @if ($errors->has('csv_file'))
                            <div class="text-danger mt-2">{{ $errors->first('csv_file') }}</div>
                        @endif
                    </div>
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    {{-- <th>Name</th> --}}
                                    <th>Name (Marathi)</th>
                                    {{-- <th style="padding: 0 25px;">Date of Birth</th>
                                    <th>DOB (Marathi)</th> --}}
                                    <th>Date of Death</th>
                                    {{-- <th>Gender</th> --}}
                                    <th>Gender (Marathi)</th>
                                    {{-- <th>Father/Husband Name</th> --}}
                                    <th>Father/Husband Name (Marathi)</th>
                                    {{-- <th>Mother Name</th> --}}
                                    <th>Mother Name (Marathi)</th>
                                    {{-- <th>Death Place</th> --}}
                                    <th>Death Place (Marathi)</th>
                                    {{-- <th>Permanent Address</th> --}}
                                    <th>Permanent Address (Marathi)</th>
                                    {{-- <th>Registration Number</th> --}}
                                    <th>Registration Number (Marathi)</th>
                                    {{-- <th>Registration Date</th> --}}
                                    <th>Registration Date (Marathi)</th>
                                    {{-- <th>Issue Date</th> --}}
                                    <th>Issue Date (Marathi)</th>
                                    {{-- <th>Nationality</th> --}}
                                    <th>Nationality (Marathi)</th>
                                    {{-- <th style="padding: 0 25px;">Aadhar (Deceased)</th> --}}
                                    <th style="padding: 0 25px;">Aadhar (Deceased - Marathi)</th>
                                    {{-- <th>Remarks</th> --}}
                                    <th>Remarks (Marathi)</th>
                                    <th>Download Certificate</th>
                                    <th class="text-center">Action</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deathCertificates as $key => $deathCertificate)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        {{-- <td>{{ $deathCertificate->name ?? 'N/A' }}</td> --}}
                                        <td>{{ $deathCertificate->name_mr ?? 'N/A' }}</td>
                                        {{-- <td style="font-size: 12px;">{{ $deathCertificate->dob ?? 'N/A' }}</td>
                                        <td>{{ $deathCertificate->dob_mr ?? 'N/A' }}</td> --}}
                                        <td>{{ $deathCertificate->dob ?? 'N/A' }}</td>
                                        {{-- <td>{{ $deathCertificate->gender ?? 'N/A' }}</td> --}}
                                        <td>{{ $deathCertificate->gender_mr ?? 'N/A' }}</td>
                                        {{-- <td>{{ $deathCertificate->father_or_husband_name ?? 'N/A' }}</td> --}}
                                        <td>{{ $deathCertificate->father_or_husband_name_mr ?? 'N/A' }}</td>
                                        {{-- <td>{{ $deathCertificate->mother_name ?? 'N/A' }}</td> --}}
                                        <td>{{ $deathCertificate->mother_name_mr ?? 'N/A' }}</td>
                                        {{-- <td>{{ $deathCertificate->death_place ?? 'N/A' }}</td> --}}
                                        <td>{{ $deathCertificate->death_place_mr ?? 'N/A' }}</td>
                                        {{-- <td>{{ $deathCertificate->permanent_address ?? 'N/A' }}</td> --}}
                                        <td>{{ $deathCertificate->permanent_address_mr ?? 'N/A' }}</td>
                                        {{-- <td>{{ $deathCertificate->registration_number ?? 'N/A' }}</td> --}}
                                        <td>{{ $deathCertificate->registration_number_mr ?? 'N/A' }}</td>
                                        {{-- <td>{{ $deathCertificate->registration_date ?? 'N/A' }}</td> --}}
                                        <td>{{ $deathCertificate->registration_date_mr ?? 'N/A' }}</td>
                                        {{-- <td>{{ $deathCertificate->issue_date ?? 'N/A' }}</td> --}}
                                        <td>{{ $deathCertificate->issue_date_mr ?? 'N/A' }}</td>
                                        {{-- <td>{{ $deathCertificate->nationality ?? 'N/A' }}</td> --}}
                                        <td>{{ $deathCertificate->nationality_mr ?? 'N/A' }}</td>
                                        {{-- <td>{{ $deathCertificate->adhar_card_no_deceased ?? 'N/A' }}</td> --}}
                                        <td>{{ $deathCertificate->adhar_card_no_deceased_mr ?? 'N/A' }}</td>
                                        {{-- <td>{{ $deathCertificate->remarks ?? 'N/A' }}</td> --}}
                                        <td>{{ $deathCertificate->remarks_mr ?? 'N/A' }}</td>
                                        <td>
                                            @if($deathCertificate->approve_status == 0)
                                                <p class="btn btn-danger btn-sm" >Download not approved</p>
                                            @else
                                                <a class="btn btn-success btn-sm" href="{{ route('panchayat.deathCertificate.details', $deathCertificate->id) }}">
                                                    Download
                                                </a>
                                            @endif

                                            </td>
                                        <td>
                                            <a class="btn btn-warning btn-sm" href="{{ route('panchayat.deathCertificate.edit', $deathCertificate->id) }}">Edit</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('panchayat.deathCertificate.allValues', $deathCertificate->id) }}">View</a>
                                        </td>
                                        


                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

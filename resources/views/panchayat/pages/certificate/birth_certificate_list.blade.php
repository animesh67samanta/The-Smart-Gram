@extends('panchayat.layouts.main')
@section('title', 'Birth Certificate List')
@section('content')

<div class="wrapper">
    <div class="page-wrapper">
        <div class="page-content">

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Birth Certificate</div>
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
                        <h5>Upload Birth Certificates (CSV)</h5>
                        <form action="{{ route('panchayat.birthCertificate.bulkUpload') }}" method="POST" enctype="multipart/form-data" class="d-flex align-items-center">
                            @csrf
                            <div class="input-group">
                                <input type="file" name="file" class="form-control" accept=".xlsx, .xls, .csv" required>
                                <button type="submit" class="btn btn-info ms-2">Upload</button>
                            </div>
                        </form>
                        @if ($errors->has('file'))
                            <div class="text-danger mt-2">{{ $errors->first('file') }}</div>
                        @endif
                    </div>
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Child Name</th>
                                    <th>Date of Birth</th>
                                    <th>Gender</th>
                                    <th>Father Name</th>
                                    <th>Mother Name</th>
                                    <th>Birth Place</th>
                                    <th>Permanent Address</th>
                                    <th>Registration Number</th>
                                    <th>Registration Date</th>
                                    <th>Actions</th>
                                    <th>Download Certificate</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($birthCertificates as $key => $birthCertificate)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $birthCertificate->childname ?? 'N/A' }}</td>
                                        <td>{{ $birthCertificate->dob ?? 'N/A' }}</td>
                                        <td>{{ $birthCertificate->gender ?? 'N/A' }}</td>
                                        <td>{{ $birthCertificate->father_name ?? 'N/A' }}</td>
                                        <td>{{ $birthCertificate->mother_name ?? 'N/A' }}</td>
                                        <td>{{ $birthCertificate->birth_place ?? 'N/A' }}</td>
                                        <td>{{ $birthCertificate->permanent_address ?? 'N/A' }}</td>
                                        <td>{{ $birthCertificate->registration_number ?? 'N/A' }}</td>
                                        <td>{{ $birthCertificate->registration_date ?? 'N/A' }}</td>

                                            <td style="display: block !important;"><a href="{{route('panchayat.birthCertificate.edit', $birthCertificate->id)}}">Edit</a> <br><a href="{{route('panchayat.birthCertificate.allValues', $birthCertificate->id)}}">View details</a>
                                                {{-- <a href="{{route('panchayat.birthCertificate.details', $birthCertificate->id)}}">
                                                    Download
                                                </a> --}}
                                            </td>
                                            <td>
                                                @if($birthCertificate->approve_status == 0)
                                                    Download not approved
                                                    @else
                                                    <a href="{{route('panchayat.birthCertificate.details', $birthCertificate->id)}}">
                                                    Download
                                                    </a>
                                                @endif

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

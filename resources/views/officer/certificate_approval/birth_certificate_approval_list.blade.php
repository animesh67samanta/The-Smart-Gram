@extends('officer.layouts.main')
@section('title', 'Birth Certificate List')
@section('content')

<div class="wrapper">
    <div class="page-wrapper">
        <div class="page-content">

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Birth Certificate Approval</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('officer.officer.dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">List</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Child Name</th>
                                    <th>Date of Birth</th>
                                    <th>Gender</th>
                                    <th>Birth Place</th>
                                    <th>Permanent Address</th>
                                    <th>Registration Number</th>
                                    <th>Registration Date</th>
                                    <th>Certificate View</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($birthCertificates as $key => $birthCertificate)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $birthCertificate->childname ?? 'N/A' }}</td>
                                        <td>{{ $birthCertificate->dob ?? 'N/A' }}</td>
                                        <td>{{ $birthCertificate->gender ?? 'N/A' }}</td>
                                        <td>{{ $birthCertificate->birth_place ?? 'N/A' }}</td>
                                        <td>{{ $birthCertificate->permanent_address ?? 'N/A' }}</td>
                                        <td>{{ $birthCertificate->registration_number ?? 'N/A' }}</td>
                                        <td>{{ $birthCertificate->registration_date ?? 'N/A' }}</td>
                                        <td >
                                                <a href="{{ route('officer.birthCertificate.view', $birthCertificate->id) }}" class="btn btn-success btn-sm">
                                                    View
                                                </a>

                                        </td>


                                        <td style="display: block !important;">
                                            @if ($birthCertificate->approve_status == 0)

                                                <a href="{{ route('officer.birthCertificate.approve', $birthCertificate->id) }}" class="btn btn-success btn-sm">
                                                    Approve
                                                </a>
                                            @else
                                            <span class="badge bg-success">Already Approved</span>
                                                {{-- Already Approved --}}
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

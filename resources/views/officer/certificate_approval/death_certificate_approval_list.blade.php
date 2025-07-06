@extends('officer.layouts.main')
@section('title', 'Death Certificate List')
@section('content')

<div class="wrapper">
    <div class="page-wrapper">
        <div class="page-content">

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Death Certificate Approval</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
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
                                    <th>Name</th>
                                    <th>Date of Birth</th>
                                    <th>Gender</th>
                                    <th>Permanent Address</th>
                                    <th>Registration Number</th>
                                    <th>Registration Date</th>
                                    <th>Certificate View</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deathCertificates as $key => $deathCertificate)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $deathCertificate->name ?? 'N/A' }}</td>
                                        <td>{{ $deathCertificate->dob ?? 'N/A' }}</td>
                                        <td>{{ $deathCertificate->gender ?? 'N/A' }}</td>
                                        <td>{{ $deathCertificate->permanent_address ?? 'N/A' }}</td>
                                        <td>{{ $deathCertificate->registration_number ?? 'N/A' }}</td>
                                        <td>{{ $deathCertificate->registration_date ?? 'N/A' }}</td>
                                        <td >
                                            <a href="{{ route('officer.deathCertificate.view', $deathCertificate->id) }}" class="btn btn-success btn-sm">
                                                View
                                            </a>
                                        </td>


                                        <td style="display: block !important;">
                                            @if ($deathCertificate->approve_status == 0)

                                                <a href="{{ route('officer.deathCertificate.approve', $deathCertificate->id) }}" class="btn btn-success btn-sm">
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

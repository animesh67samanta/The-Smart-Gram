@extends('officer.layouts.main')
@section('title', 'Marriage Certificate List')
@section('content')

<div class="wrapper">
    <div class="page-wrapper">
        <div class="page-content">

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Marriage Certificate</div>
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
                                    <th>Groom Name</th>
                                    <th>Bride Name Before Marriage</th>
                                    <th>Bride Name After Marriage</th>
                                    <th>Groom Address</th>
                                    <th>Bride Address</th>
                                    <th>Registration Number</th>
                                    <th>Registration Date</th>
                                    <th>Certificate View</th>
                                    <th style="display: block !important;">Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($marriageCertificates as $key => $marriageCertificate)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $marriageCertificate->groom_name ?? 'N/A'}}</td>
                                        <td>{{ $marriageCertificate->bride_name_before_marriage?? 'N/A' }}</td>
                                        <td>{{ $marriageCertificate->bride_name ?? 'N/A'}}</td>
                                        <td>{{ $marriageCertificate->groom_address ?? 'N/A'}}</td>
                                        <td>{{ $marriageCertificate->bride_address ?? 'N/A' }}</td>
                                        <td>{{ $marriageCertificate->registration_number ?? 'N/A' }}</td>
                                        <td>{{ $marriageCertificate->registration_date ?? 'N/A' }}</td>
                                        <td >
                                            <a href="{{ route('officer.marriageCertificate.view', $marriageCertificate->id) }}" class="btn btn-success btn-sm">
                                                View
                                            </a>
                                        </td>
                                        <td style="display: block !important;">
                                            @if ($marriageCertificate->approve_status == 0)

                                                <a href="{{ route('officer.marriageCertificate.approve', $marriageCertificate->id) }}" class="btn btn-success btn-sm">
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

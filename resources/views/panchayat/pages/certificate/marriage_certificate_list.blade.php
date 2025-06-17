@extends('panchayat.layouts.main')
@section('title', 'Marriage Certificate List')
@section('content')

<div class="wrapper">
    <div class="page-wrapper">
        <div class="page-content">

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Marriage Certificate</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-2">
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
                                    <th>Action</th>
                                    <th>Download Certificate</th>


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





                                        <td class="text-center"><a href="{{route('panchayat.marriageCertificate.edit', $marriageCertificate->id)}}">Edit</a> <br><a href="{{route('panchayat.marriageCertificate.allValues', $marriageCertificate->id)}}" class="text-nowrap">View details</a><br>
                                        {{-- <a href="{{route('panchayat.marriageCertificate.details', $marriageCertificate->id)}}">
                                            Download
                                        </a> --}}
                                        <td>
                                            @if($marriageCertificate->approve_status == 0)
                                                Download not approved
                                                @else
                                                <a href="{{route('panchayat.marriageCertificate.details', $marriageCertificate->id)}}">
                                                Download
                                                </a>
                                            @endif

                                            </td>
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

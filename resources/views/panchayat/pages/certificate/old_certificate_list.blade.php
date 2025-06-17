@extends('panchayat.layouts.main')
@section('title', 'Old Certificate List')
@section('content')

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="wrapper">
    <div class="page-wrapper">
        <div class="page-content">

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Old Certificate</div>
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
                        <table id="example2" class="table table-striped table-bordered" style="overflow-x: scroll; width: 1200px !important;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Type</th>

                                    <th>Download Certificate</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($oldCertificates as $key => $oldCertificate)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $oldCertificate->user_name }}</td>
                                        <td>{{ $oldCertificate->name }}</td>
                                        <td>{{ $oldCertificate->mobile }}</td>
                                        <td>@if($oldCertificate->type == 'birth-certificate')
                                        Birth Certificate
                                        @elseif($oldCertificate->type == 'death-certificate')
                                            Death Certificate
                                        @elseif($oldCertificate->type == 'marriage-certificate')
                                            Marriage Certificate
                                        @endif
                                        </td>

                                        <td>
                                        <a href="{{ asset('images/certificates/' .$oldCertificate->image) }}" download class="btn btn-primary btn-sm">
                                            Download
                                        </a>
                                    </td>
                                    
                                    <td></td>


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

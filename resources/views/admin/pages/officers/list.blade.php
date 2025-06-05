@extends('admin.layouts.main')
@section('title', 'Officer List')
@section('content')

<div class="wrapper">
    <div class="page-wrapper">
        <div class="page-content">

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Officer</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Details</li>
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
                                    <th>Panchayat Name</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
                                    <th>Address</th>
                                    <th style="width: 150px;">Digital Signature</th>
                                    <th  style="width: 100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($officers as $key => $officer)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $officer->panchayatName->name ?? 'null' }}</td>
                                        <td>{{ $officer->name ?? 'null' }}</td>
                                        <td>{{ $officer->email ?? 'null' }}</td>
                                        <td>{{ $officer->phone  ?? 'null' }}</td>
                                        <td>{{ $officer->address ?? 'null' }}</td>

                                        <td>
                                            <img src="{{ asset( $officer->digital_signature) }}" alt="Officer-signature" class="" height="50px" weight="50px">
                                        </td>
                                        <td>
                                            <a href="{{route('admin.officer.edit',$officer->id)}}"><i
                                                    class='bx bx-edit'></i>Edit</a>

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

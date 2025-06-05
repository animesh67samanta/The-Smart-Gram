@extends('admin.layouts.main')
@section('title', 'Panchayat List')
@section('content')
    <div class="wrapper">
        <div class="page-wrapper">
            <div class="page-content">

                {{-- <h6 class="mb-0 text-uppercase">Panchayat List</h6>
                <hr /> --}}
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Panchayat</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
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
                                        <th>Sl No</th>
                                        <th>Name</th>
                                        <th>Name in Marathi</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Address in Marathi</th>
                                      
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($panchayats as $key=> $panchayat)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $panchayat->name ?? ' ' }}</td>
                                            <td>{{ $panchayat->name_mr ?? ' ' }}</td>

                                            <td>{{ $panchayat->email ?? ' ' }}</td>
                                            <td>{{ $panchayat->phone ?? ' ' }}</td>
                                            <td>{{ $panchayat->address ?? ' ' }}</td>
                                            <td>{{ $panchayat->address_mr ?? ' ' }}</td>

                                           
                                            <td>
                                                <a href="{{route('admin.panchayat.edit',$panchayat->id)}}"><i
                                                        class='bx bx-edit'></i>Edit</a>

                                                        {{-- <a href="{{route('admin.panchayat.destroy',$panchayat->id)}}"><i
                                                            class='bx bx-trash'></i>Delete</a> --}}
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
    {{-- @push('js')
    @endpush --}}

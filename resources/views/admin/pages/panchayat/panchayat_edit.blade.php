@extends('admin.layouts.main')
@section('title', 'Panchayat Edit')
@section('content')


    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Admin</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Panchayat</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form id="certificateForm" action="{{ route('admin.panchayat.update', $panchayat->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                @csrf
                                <div id="keyboardContainer" class="simple-keyboard"></div>
                                <div class="mb-3">
                                    <label class="form-label">Panchayat Name:</label>
                                    <input type="text" name="name"
                                        value="{{ $panchayat->name }}" class="form-control"
                                        placeholder="Insert Panchayat Name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Panchayat Name in Marathi:</label>
                                    <input type="text" name="name_mr"
                                        value="{{ $panchayat->name_mr }}" class="form-control marathi-input"
                                        placeholder="Insert Panchayat Name in Marathi">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email:</label>
                                    <input type="text" name="email"
                                        value="{{ $panchayat->email }}" class="form-control"
                                        placeholder="Insert Email">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">New Password</label>
                                    <input type="password" name="password"  class="form-control"  placeholder="Insert Password">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control"  placeholder="Insert Confirm Password">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone:</label>
                                    <input type="number" name="phone"
                                        value="{{ $panchayat->phone }}" class="form-control"
                                        placeholder="Insert Phone">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" name="address" value="{{ $panchayat->address }}" class="form-control" placeholder="Insert Address">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Address in Marathi</label>
                                    <input type="text" name="address_mr" value="{{ $panchayat->address_mr }}" class="form-control marathi-input" placeholder="Insert Address in Marathi">
                                </div>
                                
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn  btn-success">Update Panchayat</button>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
            <!--end row-->
        </div>
    </div>

@endsection


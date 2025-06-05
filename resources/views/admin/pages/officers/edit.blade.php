@extends('admin.layouts.main')
@section('title', 'Edit Officer')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!-- Breadcrumb -->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Officer</div>
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.officer.update', $officer->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div id="keyboardContainer" class="simple-keyboard"></div>

                                @method('PUT')

                                <div class="mb-3">
                                    <label for="panchayat">Select Panchayat</label>
                                    <select name="panchayat_id" id="panchayat" class="form-control" required>
                                        <option value="" disabled>Select a Panchayat</option>
                                        @foreach($panchayats as $panchayat)
                                            <option value="{{ $panchayat->id }}" {{ $officer->panchayat_id == $panchayat->id ? 'selected' : '' }}>
                                                {{ $panchayat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" value="{{ old('name', $officer->name) }}" class="form-control" placeholder="Insert Name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Name In Marathi</label>
                                    <input type="text" name="name_mr" value="{{ old('name_mr', $officer->name_mr) }}" class="form-control marathi-input" placeholder="Insert Marathi Name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" name="email" value="{{ old('email', $officer->email) }}" class="form-control" placeholder="Insert Email">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" value="{{ old('phone', $officer->phone) }}" class="form-control" placeholder="Insert Phone">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" name="address" value="{{ old('address', $officer->address) }}" class="form-control" placeholder="Insert Address">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Address In Marathi</label>
                                    <input type="text" name="address" value="{{ old('address_mr', $officer->address_mr) }}" class="form-control marathi-input" placeholder="Insert Address In Marathi">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" value="" class="form-control" placeholder="Insert New Password">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" value="" class="form-control" placeholder="Confirm New Password">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Digital Signature</label>

                                        <input type="file" name="digital_signature" class="form-control">
                                        @if($officer && $officer->digital_signature)
                                            <img src="{{ asset($officer->digital_signature) }}" alt="Digital Signature" width="100" class="mt-2">
                                        @endif
                                   
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                                    <button type="submit" class="btn btn-warning">Update Officer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
    </div>
@endsection

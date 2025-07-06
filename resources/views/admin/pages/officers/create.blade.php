@extends('admin.layouts.main')
@section('title', 'Create Officer')
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
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.officer.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="panchayat">Select Panchayat</label>
                                    <select name="panchayat_id" id="panchayat" class="form-control" required>
                                        <option value="" disabled selected>Select a Panchayat</option>
                                        @foreach($panchayats as $panchayat)
                                            <option value="{{ $panchayat->id }}">{{ $panchayat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Insert Name" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Insert Email" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Insert Phone" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" name="address" value="{{ old('address') }}" class="form-control" placeholder="Insert Address" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Insert Password" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" value="{{ old('password') }}" class="form-control" placeholder="Confirm Password" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Digital Signature</label>
                                    <input type="file" name="digital_signature" class="form-control" >
                                    {{-- @if($officer && $officer->digital_signature)
                                        <img src="{{ asset($officer->digital_signature) }}" alt="Digital Signature" width="100" class="mt-2">
                                    @endif --}}
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-success">Officer Add</button>
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

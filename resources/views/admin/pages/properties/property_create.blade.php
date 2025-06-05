@extends('admin.layouts.main')
@section('title', 'Property Create')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Property</div>
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create11</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('panchayat.property.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- Error Handling -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                {{-- <input type="hidden" name="panchayat_id" value=""> --}}
                                <div class="mb-3">
                                    <label class="form-label">Owner Name:</label>
                                    <input type="text" name="owner_name" value="{{ old('owner_name') }}" class="form-control" placeholder="Insert Owner Name" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Property Name:</label>
                                    <input type="text" name="property_name" value="{{ old('property_name') }}" class="form-control" placeholder="Insert Property Name" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Property Number:</label>
                                    <input type="text" name="property_no" value="{{ old('property_no') }}" class="form-control" placeholder="Insert Property Number" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description:</label>
                                    <textarea name="description" class="form-control" placeholder="Insert Description">{{ old('description') }}</textarea>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Add Property</button>
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

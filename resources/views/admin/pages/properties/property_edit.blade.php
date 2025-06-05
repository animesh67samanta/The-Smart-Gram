@extends('panchayat.layouts.main')
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
                            <li class="breadcrumb-item active" aria-current="page">Property</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('panchayat.property.update', $property->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="panchayat_id" class="form-label">Select a Panchayat</label>
                                    <select class="form-select" name="panchayat_id" id="panchayat_id" required>
                                        <option value="" disabled>Select a Panchayat</option>
                                        @foreach($panchayats as $panchayat)
                                            <option value="{{$panchayat->id }}" {{ $panchayat->id == $property->panchayat_id ? 'selected' : '' }}>{{ $panchayat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Owner Name:</label>
                                    <input type="text" name="owner_name"
                                        value="{{ $property->owner_name }}" class="form-control"
                                        placeholder="Insert Owner Name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Property Name</label>
                                    <input type="text" name="property_name"
                                        value="{{ $property->property_name }}" class="form-control"
                                        placeholder="Insert Url">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <input type="text" name="property_description" value="{{ $property->description }}" class="form-control" placeholder="Insert Description">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Update Property</button>
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


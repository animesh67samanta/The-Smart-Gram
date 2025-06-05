@extends('panchayat.layouts.main')
@section('title', 'Property Select For Namuna 8')
@section('content')

    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Namuna No. 123</div>
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">8</li>
                        </ol>
                    </nav>
                </div>

            </div>
            {{-- @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif --}}

            {{-- Validation Error Messages --}}
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}

            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h2>Select Property for Namuna 8</h2>

                            <form action="{{ route('panchayat.namuna.eight.details') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="property_name" class="form-label">Property</label>
                                    <select class="form-select" name="property_id" id="property_id" required>
                                        <option value="" disabled selected>Select a Property</option>
                                        @foreach($properties as $property)
                                            <option value="{{ $property->id }}">{{$property->owner_name}} - {{ $property->property_no }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="year">Year</label>
                                    <input type="text"  name="year"
                                          value="{{ old('year') }}"
                                           class="form-control">
                                </div>


                                <!-- Submit Button -->
                                <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn admin-btn-decorate">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


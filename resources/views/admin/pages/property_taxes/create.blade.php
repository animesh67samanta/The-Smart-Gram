@extends('admin.layouts.main')
@section('title', 'PropertyTax Create')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Property Tax</div>
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="#"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="card">
                        <div class="card-body">
                         <?php
                         /*print_r($properties) ;*/
                         ?>
                            <form action="{{ route('admin.propertyTax.store') }}" method="POST"  enctype="multipart/form-data">
                                @csrf
                                <!-- Property Selection -->
                                <div class="mb-3">
                                    <label for="property_id" class="form-label">Property</label>
                                    <select class="form-select" name="property_id" id="property_id" required>
                                        <option value="" disabled selected>Select a property</option>

                                        @foreach($properties as $property)
                                            <option value="{{ $property->id }}">{{ $property->property_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Street Name -->
                                <div class="mb-3">
                                    <label for="street_name" class="form-label">Street Name</label>
                                    <input type="text" class="form-control" id="street_name" name="street_name" value="{{ old('street_name') }}" placeholder="Enter street name">
                                </div>

                                <div class="mb-3">
                                    <label for="year_of_income_construction" class="form-label">Year Of Income Construction</label>
                                    <input type="text" class="form-control" id="usage_type" name="year_of_income_construction" value="{{ old('year_of_income_construction') }}" placeholder="Enter Year Of Income Construction">
                                </div>

                                <div class="mb-3">
                                    <label for="area_in_sq_mt" class="form-label">Area (sqm)</label>
                                    <input type="text"  class="form-control" id="area" name="area_in_sq_mt" value="{{ old('area_in_sq_mt') }}" placeholder="Enter area in sq meter">
                                </div>

                                <div class="mb-3">
                                    <label for="area_in_sq_ft" class="form-label">Area (sqft)</label>
                                    <input type="text"  class="form-control" id="area" name="area_in_sqft" value="{{ old('area_in_sqft') }}" placeholder="Enter area in sq ft">
                                </div>

                                 <p>Readirekoner rate per square meter:-</p>
                                <div class="mb-3">
                                    <label for="open_plot" class="form-label">Open Plot</label>
                                    <input type="text" class="form-control" id="open_plot" name="open_plot" value="{{ old('open_plot') }}" placeholder="Enter Open Plot">
                                </div>

                                <!-- Tax Amount -->
                                <div class="mb-3">
                                    <label for="residence" class="form-label">Residence</label>
                                    <input type="text" class="form-control" id="residence" name="residence" value="{{ old('residence') }}" placeholder="Enter residence">
                                </div>


                                <div class="mb-3">
                                    <label for="builders" class="form-label">Builders</label>
                                    <input type="text" class="form-control" id="builders" name="builders" value="{{ old('builders') }}" placeholder="Enter builders">
                                </div>

                                <div class="mb-3">
                                    <label for="depriciation_rate" class="form-label">Depricition Rate</label>
                                    <input type="text"  class="form-control" id="builders" name="depriciation_rate"  placeholder="Enter depriciation rate" value="{{ old('depriciation_rate') }}">
                                </div>


                                <div class="mb-3">
                                    <label for="weight_use_of_builders" class="form-label">Weighted According to the Use of the Builders</label>
                                    <input type="text" class="form-control" id="builders" name="weight_use_of_builders"  placeholder="Enter Weighted Amount" value="{{old('weight_use_of_builders')}}">
                                </div>

                                <div class="mb-3">
                                    <label for="capital_value" class="form-label">Capital Value</label>
                                    <input type="text" class="form-control" id="capital_value" name="capital_value"  placeholder="Enter Capital Value" value="{{old('capital_value')}}">
                                </div>

                                <div class="mb-3">
                                    <label for="tax_rate" class="form-label">Tax Rate</label>
                                    <input type="text" class="form-control" id="tax_rate" name="tax_rate"  placeholder="Enter Tax Rate" value="{{old('tax_rate')}}">
                                </div>
                                <p>Tax Amount:-</p>
                                <div class="mb-3">
                                    <label for="home_tax" class="form-label">Home Tax</label>
                                    <input type="text" class="form-control" id="home_tax" name="home_tax"  placeholder="Enter Home Tax" value="{{old('home_tax')}}">
                                </div>

                                <div class="mb-3">
                                    <label for="lamp_tax" class="form-label">Lamp Tax</label>
                                    <input type="text" class="form-control" id="lamp_tax" name="lamp_tax"  placeholder="Enter Lamp Tax" value="{{old('lamp_tax')}}">
                                </div>

                                <div class="mb-3">
                                    <label for="health_tax" class="form-label">Health Tax</label>
                                    <input type="text" class="form-control" id="health_tax" name="health_tax"  placeholder="Enter Health Tax" value="{{old('health_tax')}}">
                                </div>

                                <div class="mb-3">
                                    <label for="water_tax" class="form-label">Water Tax</label>
                                    <input type="text" class="form-control" id="water_tax" name="water_tax"  placeholder="Enter Water Tax" value="{{old('water_tax')}}">
                                </div>

                                <div class="mb-3">
                                    <label for="total" class="form-label">Total</label>
                                    <input type="text" class="form-control" id="total" name="total"  placeholder="Enter Total" value="{{old('total')}}">
                                </div>

                                <!-- Submit Button -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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

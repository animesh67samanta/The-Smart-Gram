@extends('panchayat.layouts.main')
@section('title', 'Edit Property')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Property</div>
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-2">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form id="certificateForm" action="{{ route('panchayat.property.update', $property->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div id="keyboardContainer" class="simple-keyboard"></div>
                                <div class="mb-3">
                                    <label class="form-label">Street Name:</label>
                                    <input type="text" name="street_name"
                                        value="{{ old('street_name', $property->street_name) }}" class="form-control"
                                        placeholder="Insert Street Name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Street Name in Marathi:</label>
                                    <input type="text" name="street_name_mr"
                                        value="{{ old('street_name_mr', $property->street_name_mr) }}" class="form-control marathi-input"
                                        placeholder="Insert Street Name in Marathi">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">CT Survey No:</label>
                                    <input type="text" name="ct_survey_no"
                                        value="{{ old('ct_survey_no', $property->ct_survey_no) }}" class="form-control"
                                        placeholder="Insert CT Survey No">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Property Number:</label>
                                    <input type="text" name="property_no"
                                        value="{{ old('property_no', $property->property_no) }}" class="form-control"
                                        placeholder="Insert Property Number">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Owner Name:</label>
                                    <input type="text" name="owner_name"
                                        value="{{ old('owner_name', $property->owner_name) }}" class="form-control"
                                        placeholder="Insert Owner Name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Owner Name in Marathi:</label>
                                    <input type="text" name="owner_name_mr"
                                        value="{{ old('owner_name_mr', $property->owner_name_mr) }}" class="form-control marathi-input"
                                        placeholder="Insert Owner Name in Marathi">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Property User Name:</label>
                                    <input type="text" name="property_user_name"
                                        value="{{ old('property_user_name', $property->property_user_name) }}" class="form-control"
                                        placeholder="Insert Property User Name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Property User Name in Marathi:</label>
                                    <input type="text" name="property_user_name_mr"
                                        value="{{ old('property_user_name_mr', $property->property_user_name_mr) }}" class="form-control marathi-input"
                                        placeholder="Insert Property User Name in Marathi">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Property Description:</label>
                                    <select name="description" id="propertyType" class="form-control">
                                        <option value="" disabled>Select Property Type</option>
                                        <option value="House" {{ $property->description == 'House' ? 'selected' : '' }}>House</option>
                                        <option value="Commercial" {{ $property->description == 'Commercial' ? 'selected' : '' }}>Commercial</option>
                                        <option value="MIDC" {{ $property->description == 'MIDC' ? 'selected' : '' }}>MIDC</option>
                                        <option value="Open plot" {{ $property->description == 'Open plot' ? 'selected' : '' }}>Open plot</option>

                                    </select>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Property Description in Marathi:</label>
                                    <input type="text" name="description_mr"
                                        value="{{ old('description_mr', $property->description_mr) }}" class="form-control marathi-input"
                                        placeholder="Insert Property Description in Marathi">
                                </div>



                                <!-- Secondary Dropdown for House Type -->
                                <div class="mb-3" id="houseTypeDiv" style="{{ $property->description == 'House' ? '' : 'display: none;' }}">
                                    <label class="form-label">House Type:</label>
                                    <select name="house_type" id="houseType" class="form-control">
                                        <option value="" disabled>Select House Type</option>
                                        <option value="RCC" {{ $property->house_type == 'RCC' ? 'selected' : '' }}>RCC</option>
                                        <option value="Flat" {{ $property->house_type == 'Flat' ? 'selected' : '' }}>Flat</option>
                                        <option value="Mud brick house" {{ $property->house_type == 'Mud brick house' ? 'selected' : '' }}>Mud brick house</option>
                                        <option value="House of sticks" {{ $property->house_type == 'House of sticks' ? 'selected' : '' }}>House of sticks</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">House Type in Marathi:</label>
                                    <input type="text" name="house_type_mr"
                                        value="{{ old('house_type_mr', $property->house_type_mr) }}" class="form-control marathi-input"
                                        placeholder="Insert House Type in Marathi">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Year of Income Construction:</label>
                                    <input type="text" name="year_of_income_construction"
                                        value="{{ old('year_of_income_construction', $property->year_of_income_construction) }}" class="form-control"
                                        placeholder="Insert Year of income construction">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Area in sqft:</label>
                                    <input id="sqft" type="text" name="area_in_sqft"
                                        value="{{ old('area_in_sqft', $property->area_in_sqft) }}" class="form-control"
                                        placeholder="Insert Area in sqft">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Area in sqmt:</label>
                                    <input id="sqmt" type="text" name="area_in_sqmt" readonly
                                        value="{{ old('area_in_sqmt', $property->area_in_sqmt) }}" class="form-control"
                                        placeholder="Insert Area in sqmt">
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn admin-btn-decorate">Update Property</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
    <script>
        // JavaScript to toggle the house type dropdown based on selection
        document.getElementById('propertyType').addEventListener('change', function () {
            var houseTypeDiv = document.getElementById('houseTypeDiv');
            if (this.value === 'House') {
                houseTypeDiv.style.display = 'block';  // Show house type dropdown
            } else {
                houseTypeDiv.style.display = 'none';   // Hide house type dropdown
                document.getElementById('houseType').value = ''; // Reset house type selection
            }
        });

        const sqftElement = document.querySelector('#sqft');

        // Add a keyup event listener
        sqftElement.addEventListener('keyup', (event) => {
            let value = Number(event.target.value);
            let sqm = document.querySelector('#sqmt');
            sqm.value = convertToSquareMeters(value);
            console.log('Key pressed:', event.key);
            console.log('Current value:', event.target.value);
        });

        function convertToSquareMeters(squareFeet) {
            const conversionFactor = 0.092903;
            return squareFeet * conversionFactor;
        }

    </script>
@endsection

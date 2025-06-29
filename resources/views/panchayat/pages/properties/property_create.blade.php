@extends('panchayat.layouts.main')
@section('title', 'Property Create')
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
                            <li class="breadcrumb-item active" aria-current="page">Create Property Tax</li>
                        </ol>
                    </nav>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <div class="card">
                        <!-- CSV Upload Section -->
                        <div class="card-body">
                            <form action="{{ route('panchayat.properties.upload') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                               <!-- Demo CSV Download Section -->
                                <div class="mb-3">
                                    {{-- <label class="form-label mx-1">Download Sample CSV:</label> --}}
                                    <div class="d-flex align-items-center">
                                        <a href="{{ asset('csv/property.csv') }}" class="btn btn-sm btn-outline-warning me-2">
                                            <i class="fas fa-file-csv me-1"></i> Download Sample CSV
                                        </a>
                                        <small class="text-warning">Use this template to ensure proper formatting</small>
                                    </div>
                                </div>
                               <div class="mb-3">
                                <label class="form-label mx-1">Upload CSV for Bulk Properties:</label>
                                <input type="file" name="csv_file" class="form-control " accept=".csv" required>
                                <small class="text-warning mx-1">Only CSV files allowed. Ensure column format matches the required fields.</small>
                                @error('csv_file')
                                    <span class="text-danger mx-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-success">Upload Property</button>
                            </div>
                            </form>
                        </div>
                        <div class="card-body">    
                            <form action="{{ route('panchayat.property.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Street Name:</label>
                                    <input type="text" name="street_name" value="{{ old('street_name') }}"
                                        class="form-control" placeholder="Insert Street Name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">CT Survey No:</label>
                                    <input type="text" name="ct_survey_no" value="{{ old('ct_survey_no') }}"
                                        class="form-control" placeholder="Insert CT Survey No">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Property Number:</label>
                                    <input type="text" name="property_no" value="{{ old('property_no') }}"
                                        class="form-control" placeholder="Insert Property Number">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Sequence Number:</label>
                                    <input type="number" name="sequence" value="{{ old('sequence') }}"
                                        class="form-control" placeholder="Insert Sequence Number" min="0">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Owner Name:</label>
                                    <input type="text" name="owner_name" value="{{ old('owner_name') }}"
                                        class="form-control" placeholder="Insert Owner Name">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Property User Name:</label>
                                    <input type="text" name="property_user_name" value="{{ old('property_user_name') }}"
                                        class="form-control" placeholder="Insert Property User Name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Property Description:</label>
                                    <select name="description" id="propertyType" class="form-control">
                                        <option value="" disabled selected>Select Property Type</option>
                                        <option value="House">House</option>
                                        <option value="Commercial">Commercial</option>
                                        <option value="MIDC">MIDC</option>
                                        <option value="Open plot">Open plot</option>

                                    </select>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Secondary Dropdown for House Type (initially hidden) -->
                                <div class="mb-3" id="houseTypeDiv" style="display: none;">
                                    <label class="form-label">House Type:</label>
                                    <select name="house_type" id="houseType" class="form-control">
                                        <option value="" disabled selected>Select House Type</option>
                                        <option value="RCC">RCC</option>
                                        <option value="Flat">Flat</option>
                                        <option value="Mud brick house">Mud brick house</option>
                                        <option value="House of sticks">House of sticks</option>
                                    </select>
                                    @error('house_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- <div class="mb-3">
                                    <label class="form-label">Buildings:</label>
                                    <input type="text" name="builders"
                                        value="{{ old('builders') }}" class="form-control"
                                            placeholder="Insert Builders">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Residence:</label>
                                    <input type="text" name="residence"
                                        value="{{ old('residence') }}" class="form-control"
                                        placeholder="Insert Residence">
                                </div>
                                
                                                <div class="mb-3">
                                                    <label class="form-label">Weighted according to the use of the buildings:</label>
                                                    <input type="text" name="use_of_builders"
                                                        value="{{ old('use_of_builders') }}" class="form-control"
                                                            placeholder="Insert Use of Builders">
                                </div> --}}

                                <div class="mb-3">
                                    <label class="form-label">Year of Income Construction:</label>
                                    <input type="text" name="year_of_income_construction"
                                        value="{{ old('year_of_income_construction') }}" class="form-control"
                                        placeholder="Insert Year of income construction">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Area in sqft:</label>
                                    <input id="sqft" type="text" name="area_in_sqft"
                                        value="{{ old('	area_in_sqft') }}" class="form-control"
                                        placeholder="Insert Area in sqft">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Area in sqmt:</label>
                                    <input id="sqmt" type="text" name="area_in_sqmt" readonly
                                        value="{{ old('area_in_sq_mt') }}" class="form-control"
                                        placeholder="Insert Area in sqmt">
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-success">Add Property</button>
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
        document.getElementById('propertyType').addEventListener('change', function() {
            var houseTypeDiv = document.getElementById('houseTypeDiv');
            if (this.value === 'House') {
                houseTypeDiv.style.display = 'block'; // Show house type dropdown
            } else {
                houseTypeDiv.style.display = 'none'; // Hide house type dropdown
                document.getElementById('houseType').value = ''; // Reset house type selection
            }
        });

        // Select the input element
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

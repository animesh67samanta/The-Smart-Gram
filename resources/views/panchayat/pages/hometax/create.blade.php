@extends('panchayat.layouts.main')
@section('title', 'Hometax Create')
@push('styles')
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-results{
        color: black !important;
    }

    
</style>
@endpush
@section('content')

    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Hometax</div>
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Calculation</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- <div id="keyboardContainer" class="simple-keyboard"></div> -->
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h2>Create Property Tax</h2>

                            <form action="{{ route('panchayat.hometaxes.store') }}" method="POST">
                                @csrf
                                <div class="form-group ">
                                    <label for="year" class="form-label mb-2">Payment Year</label>
                                    <select name="year" class="form-control" required>
                                        <option value="" disabled selected>Select a year</option>
                                        <option value="2022" {{ old('year') == '2022' ? 'selected' : '' }}>2022</option>
                                        <option value="2023" {{ old('year') == '2023' ? 'selected' : '' }}>2023</option>
                                        <option value="2024" {{ old('year') == '2024' ? 'selected' : '' }}>2024</option>
                                        <option value="2025" {{ old('year') == '2025' ? 'selected' : '' }}>2025</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="property_name " class="form-label mb-2">Property Details</label>
                                    <!-- <select class="form-select" name="property_id" id="property_id" required>
                                        <option value="" disabled selected>Select a Property</option>
                                        @foreach($properties as $property)
                                            <option value="{{ $property->id }}" data-area="{{ $property->area_in_sqmt }}">
                                                 {{ $property->owner_name_mr }} - {{ $property->property_no }}
                                            </option>
                                        @endforeach
                                    </select> -->
                                    <select class="form-select property-select" name="property_id" id="property_id" required>
                                        <option value="" disabled selected>Select a Property</option>
                                        @foreach($properties as $property)
                                            <option value="{{ $property->id }}">
                                                {{ $property->owner_name_mr }} - {{ $property->property_no }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn admin-btn-decorate">
                                        Bill Create
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@push('scripts')
<!-- jQuery and Select2 JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://www.google.com/jsapi"></script>

<script>
    // $(document).ready(function () {
    //     $('#property_id').select2({
    //         placeholder: 'Select a Property',
    //         allowClear: true,
    //         width: '100%'
    //     });
    // });

    $('#property_id').select2({
    placeholder: 'मालमत्ता निवडा',
    allowClear: true,
    width: '100%',
    language: {
        noResults: function() {
            return "कोणतेही परिणाम सापडले नाहीत";
        }
    }
});

</script>

@endpush
@endsection



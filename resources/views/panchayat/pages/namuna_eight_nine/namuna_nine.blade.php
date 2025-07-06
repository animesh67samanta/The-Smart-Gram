@extends('panchayat.layouts.main')
@section('title', 'Property Select For Namuna 9')
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
                <div class="breadcrumb-title pe-3">Namuna No.</div>
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-2">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">9</li>
                        </ol>
                    </nav>
                </div>

            </div>
            
            <div class="row">
                <div class="col-xl-6 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h2>Select Property for Namuna Nine</h2>

                            <form action="{{ route('panchayat.namuna.nine.details') }}" method="POST">
                           
                                @csrf
                                <div class="mb-3">
                                    <label for="property_name" class="form-label">Property</label>
                                    <select class="form-select" name="property_id" id="property_id" required>
                                        <option value="" disabled selected >Select a Property</option>
                                        @foreach($properties as $property)
                                            <option value="{{ $property->id }}">{{$property->owner_name_mr}} - {{ $property->property_no }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="year">Year</label>
                                        <select name="year" class="form-control" required>
                                            <option value="">Select Year</option>
                                            <option value="2025" {{ old('year') == '2025' ? 'selected' : '' }}>2025 - 2026</option>
                                            {{-- <option value="2026" {{ old('year') == '2026' ? 'selected' : '' }}>2026 - 2027</option>
                                            <option value="2027" {{ old('year') == '2027' ? 'selected' : '' }}>2027 - 2028</option> --}}
                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>
                                </div>
                                <!-- Submit Button -->
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success">
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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
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


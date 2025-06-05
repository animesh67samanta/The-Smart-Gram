@extends('panchayat.layouts.main')
@section('title', 'HealthTax Payment Create')
@section('content')

    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Healthtax</div>
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Payment Create</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h2>Create Health Tax Payment</h2>

                            <form action="{{ route('panchayat.healthtaxes.payment.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="property_name" class="form-label">Property</label>
                                    <select class="form-select" name="property_id" id="property_id" required>
                                        <option value="" disabled selected>Select a Property</option>

                                        @foreach($properties as $property)
                                            <option value="{{ $property->id }}">{{ $property->property_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="year">Payment Year</label>
                                    <select name="year" class="form-control" required>
                                        <option value="" disabled selected>Select a year</option>
                                        <option value="2022" {{ old('year') == '2022' ? 'selected' : '' }}>2022</option>
                                        <option value="2023" {{ old('year') == '2023' ? 'selected' : '' }}>2023</option>
                                        <option value="2024" {{ old('year') == '2024' ? 'selected' : '' }}>2024</option>
                                        <option value="2025" {{ old('year') == '2025' ? 'selected' : '' }}>2025</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="given_tax_amount"> Total Health Tax Amount</label>
                                    <input type="number" step="0.01" name="total_health_tax"
                                           value="{{ old('total_health_tax') }}"
                                           class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="pay_tax_amount">Pay Tax Amount</label>
                                    <input type="number" step="0.01" name="pay_tax_amount"
                                        value="{{ old('pay_tax_amount') }}" class="form-control" required>
                                </div>

                                
                                 <div class="d-flex justify-content-center">
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


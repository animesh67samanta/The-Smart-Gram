@extends('panchayat.layouts.main')
@section('title', 'Hometax Edit')
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
                        <li class="breadcrumb-item active" aria-current="page">Calculation Edit</li>
                    </ol>
                </nav>
            </div>

        </div>
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h2>Edit Home Tax</h2>
                        <form action="{{ route('panchayat.hometaxes.update', $hometax->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="property_name" class="form-label">Property</label>
                                <select class="form-select" name="property_id" id="property_id" required>
                                    <option value="" disabled>Select a Property</option>

                                    @foreach($properties as $property)
                                        <option value="{{ $property->id }}" {{ $property->id == $hometax->property_id ? 'selected' : '' }}>
                                            {{ $property->property_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="square_meter">Square Meter</label>
                                <input type="number" step="0.01" name="square_meter" value="{{ old('square_meter', $hometax->square_meter) }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="open_plot_readireckoner_rate">Open Plot Rate</label>
                                <input type="number" step="0.01" name="open_plot_readireckoner_rate" value="{{ old('open_plot_readireckoner_rate', $hometax->open_plot_readireckoner_rate) }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="builtup_area_readireckoner_rate">Built-up Area Rate</label>
                                <input type="number" step="0.01" name="builtup_area_readireckoner_rate" value="{{ old('builtup_area_readireckoner_rate', $hometax->builtup_area_readireckoner_rate) }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="depreciation">Depreciation</label>
                                <input type="number" step="0.01" name="depreciation" value="{{ old('depreciation', $hometax->depreciation) }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="usage_rate">Usage Rate</label>
                                <input type="number" step="0.01" name="usage_rate" value="{{ old('usage_rate', $hometax->usage_rate) }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="home_tax_rate">Home Tax Rate</label>
                                <input type="number" step="0.01" name="home_tax_rate" value="{{ old('home_tax_rate', $hometax->home_tax_rate) }}" class="form-control" required>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn admin-btn-decorate">
                                    Update
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

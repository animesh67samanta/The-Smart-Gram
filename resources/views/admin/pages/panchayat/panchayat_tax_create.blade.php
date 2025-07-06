@extends('admin.layouts.main')
@section('title', 'Panchayat Create Tax Rate')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Panchayat</div>
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Create Tax Rate</li>
                        </ol>
                    </nav>
                </div>

            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session()->has('success'))
                <div class="alert alert-success">
                    <ul class="mb-0">
                        <li>{{ session('success') }}</li>
                    </ul>
                </div>
            @endif
            <div class="row"> 
                <div class="col-xl-9 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.panchayat.tax.store') }}" method="POST">
                                @csrf
            
                                {{-- Panchayat Dropdown --}}
                                <div class="mb-3">
                                    <label class="form-label">Select Panchayat</label>
                                    <select name="panchayat_id" class="form-control" required>
                                        <option value="" disabled>-- Select Panchayat --</option>
                                        @foreach ($panchayats as $panchayat)
                                            <option value="{{ $panchayat->id }}">{{ $panchayat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
            
                                {{-- RCC Tax Fields --}}
                                <div class="row">
                                    <div class="row text-center text-warning mb-3"><strong><u>Tax Rate Of RCC</u></strong></div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">RCC Open Plot Readireckoner Rate</label>
                                            <input type="number" step="0.01" name="rcc_open_plot_readireckoner_rate" value="{{ old('rcc_open_plot_readireckoner_rate') }}" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">RCC Builtup Area Readireckoner Rate</label>
                                            <input type="number" step="0.01" name="rcc_builtup_area_readireckoner_rate" value="{{ old('rcc_builtup_area_readireckoner_rate') }}" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">RCC Depreciation Rate</label>
                                            <input type="number" step="0.01" name="rcc_depreciation_rate" class="form-control" value="{{ old('rcc_depreciation_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">RCC Usage Rate</label>
                                            <input type="number" step="0.01" name="rcc_usage_rate" class="form-control" value="{{ old('rcc_usage_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">RCC Tax Rate</label>
                                            <input type="number" step="0.01" name="rcc_tax_rate" class="form-control" value="{{ old('rcc_tax_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">RCC Health Tax Rate</label>
                                            <input type="number" step="0.01" name="rcc_health_tax" class="form-control" value="{{ old('rcc_health_tax') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">RCC Lamp Tax Rate</label>
                                            <input type="number" step="0.01" name="rcc_lamp_tax" class="form-control" value="{{ old('rcc_lamp_tax') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">RCC Water Tax Rate</label>
                                            <input type="number" step="0.01" name="rcc_water_tax" class="form-control" value="{{ old('rcc_water_tax') }}" >
                                        </div>
                                    </div>
                                </div>
                                {{-- Flat Tax Fields --}}
                                <div class="row">
                                    <div class="row text-center text-warning mb-3"><strong><u>Tax Rate Of Flat</u></strong></div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Flat Open Plot Readireckoner Rate</label>
                                            <input type="number" step="0.01" name="flat_open_plot_readireckoner_rate" value="{{ old('flat_open_plot_readireckoner_rate') }}" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Flat Builtup Area Readireckoner Rate</label>
                                            <input type="number" step="0.01" name="flat_builtup_area_readireckoner_rate" value="{{ old('flat_builtup_area_readireckoner_rate') }}" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Flat Depreciation Rate</label>
                                            <input type="number" step="0.01" name="flat_depreciation_rate" class="form-control" value="{{ old('flat_depreciation_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Flat Usage Rate</label>
                                            <input type="number" step="0.01" name="flat_usage_rate" class="form-control" value="{{ old('flat_usage_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Flat Tax Rate</label>
                                            <input type="number" step="0.01" name="flat_tax_rate" class="form-control" value="{{ old('flat_tax_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Flat Health Tax Rate</label>
                                            <input type="number" step="0.01" name="flat_health_tax" class="form-control" value="{{ old('flat_health_tax') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Flat Lamp Tax Rate</label>
                                            <input type="number" step="0.01" name="flat_lamp_tax" class="form-control" value="{{ old('flat_lamp_tax') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Flat Water Tax Rate</label>
                                            <input type="number" step="0.01" name="flat_water_tax" class="form-control" value="{{ old('flat_water_tax') }}" >
                                        </div>
                                    </div>
                                </div>
                                {{-- Mud Brick House Tax Fields --}}
                                <div class="row">
                                    <div class="row text-center text-warning mb-3"><strong><u>Tax Rate Of Mud Brick House</u></strong></div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Mud Brick House Open Plot Readireckoner Rate</label>
                                            <input type="number" step="0.01" name="mud_brick_open_plot_readireckoner_rate" class="form-control" value="{{ old('mud_brick_open_plot_readireckoner_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Mud Brick House Builtup Area Readireckoner Rate</label>
                                            <input type="number" step="0.01" name="mud_brick_builtup_area_readireckoner_rate" class="form-control" value="{{ old('mud_brick_builtup_area_readireckoner_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Mud Brick House Depreciation Rate</label>
                                            <input type="number" step="0.01" name="mud_brick_depreciation_rate" class="form-control"value="{{ old('mud_brick_depreciation_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Mud Brick House Usage Rate</label>
                                            <input type="number" step="0.01" name="mud_brick_usage_rate" class="form-control" value="{{ old('mud_brick_usage_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Mud Brick House Tax Rate</label>
                                            <input type="number" step="0.01" name="mud_brick_tax_rate" class="form-control" value="{{ old('mud_brick_tax_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Mud Brick House Health Tax Rate</label>
                                            <input type="number" step="0.01" name="mud_brick_health_tax" class="form-control" value="{{ old('mud_brick_health_tax') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Mud Brick House Lamp Tax Rate</label>
                                            <input type="number" step="0.01" name="mud_brick_lamp_tax" class="form-control" value="{{ old('mud_brick_lamp_tax') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Mud Brick House Water Tax Rate</label>
                                            <input type="number" step="0.01" name="mud_brick_water_tax" class="form-control" value="{{ old('mud_brick_water_tax') }}" >
                                        </div>
                                    </div>
                                </div>
                                {{-- House of Sticks Tax Fields --}}
                                <div class="row">
                                    <div class="row text-center text-warning mb-3"><strong><u>Tax Rate Of House Of Sticks</u></strong></div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">House Of Sticks Open Plot Readireckoner Rate</label>
                                            <input type="number" step="0.01" name="sticks_open_plot_readireckoner_rate" class="form-control" value="{{ old('sticks_open_plot_readireckoner_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">House Of Sticks Builtup Area Readireckoner Rate</label>
                                            <input type="number" step="0.01" name="sticks_builtup_area_readireckoner_rate" class="form-control" value="{{ old('sticks_builtup_area_readireckoner_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">House Of Sticks Depreciation Rate</label>
                                            <input type="number" step="0.01" name="sticks_depreciation_rate" class="form-control" value="{{ old('sticks_depreciation_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">House Of Sticks Usage Rate</label>
                                            <input type="number" step="0.01" name="sticks_usage_rate" class="form-control" value="{{ old('sticks_usage_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">House Of Sticks Tax Rate</label>
                                            <input type="number" step="0.01" name="sticks_tax_rate" class="form-control" value="{{ old('sticks_tax_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">House Of Sticks Health Tax Rate</label>
                                            <input type="number" step="0.01" name="sticks_health_tax" class="form-control" value="{{ old('sticks_health_tax') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">House Of Sticks Lamp Tax Rate</label>
                                            <input type="number" step="0.01" name="sticks_lamp_tax" class="form-control" value="{{ old('sticks_lamp_tax') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">House Of Sticks Water Tax Rate</label>
                                            <input type="number" step="0.01" name="sticks_water_tax" class="form-control" value="{{ old('sticks_water_tax') }}" >
                                        </div>
                                    </div>
                                </div>
                                {{-- Commercial Tax Fields --}}
                                <div class="row">
                                    <div class="row text-center text-warning mb-3"><strong><u>Tax Rate Of Commercial House</u></strong></div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Commercial Open Plot Readireckoner Rate</label>
                                            <input type="number" step="0.01" name="commercial_open_plot_readireckoner_rate" class="form-control" value="{{ old('commercial_open_plot_readireckoner_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Commercial Builtup Area Readireckoner Rate</label>
                                            <input type="number" step="0.01" name="commercial_builtup_area_readireckoner_rate" class="form-control" value="{{ old('commercial_builtup_area_readireckoner_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Commercial Depreciation Rate</label>
                                            <input type="number" step="0.01" name="commercial_depreciation_rate" class="form-control" value="{{ old('commercial_depreciation_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Commercial Usage Rate</label>
                                            <input type="number" step="0.01" name="commercial_usage_rate" class="form-control" value="{{ old('commercial_usage_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Commercial Tax Rate</label>
                                            <input type="number" step="0.01" name="commercial_tax_rate" class="form-control" value="{{ old('commercial_tax_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Commercial Health Tax Rate</label>
                                            <input type="number" step="0.01" name="commercial_health_tax" class="form-control" value="{{ old('commercial_health_tax') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Commercial Lamp Tax Rate</label>
                                            <input type="number" step="0.01" name="commercial_lamp_tax" class="form-control" value="{{ old('commercial_lamp_tax') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Commercial Water Tax Rate</label>
                                            <input type="number" step="0.01" name="commercial_water_tax" class="form-control" value="{{ old('commercial_water_tax') }}" >
                                        </div>
                                    </div>
                                </div>
                                {{-- MIDC Tax Fields --}}
                                <div class="row">
                                    <div class="row text-center text-warning mb-3"><strong><u>Tax Rate Of MIDC</u></strong></div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">MIDC Open Plot Readireckoner Rate</label>
                                            <input type="number" step="0.01" name="midc_open_plot_readireckoner_rate" class="form-control" value="{{ old('midc_open_plot_readireckoner_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">MIDC Builtup Area Readireckoner Rate</label>
                                            <input type="number" step="0.01" name="midc_builtup_area_readireckoner_rate" class="form-control" value="{{ old('midc_builtup_area_readireckoner_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">MIDC Depreciation Rate</label>
                                            <input type="number" step="0.01" name="midc_depreciation_rate" class="form-control" value="{{ old('midc_depreciation_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">MIDC Usage Rate</label>
                                            <input type="number" step="0.01" name="midc_usage_rate" class="form-control" value="{{ old('midc_usage_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">MIDC Tax Rate</label> 
                                            <input type="number" step="0.01" name="midc_tax_rate" class="form-control" value="{{ old('midc_tax_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">MIDC Health Tax Rate</label>
                                            <input type="number" step="0.01" name="midc_health_tax" class="form-control" value="{{ old('midc_health_tax') }}" >
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">MIDC Lamp Tax Rate</label>
                                            <input type="number" step="0.01" name="midc_lamp_tax" class="form-control" value="{{ old('midc_lamp_tax') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">MIDC Water Tax Rate</label>
                                            <input type="number" step="0.01" name="midc_water_tax" class="form-control" value="{{ old('midc_water_tax') }}" >
                                        </div>
                                    </div>
                                </div>
                                
                                {{-- Open plot Tax Fields --}}
                                <div class="row">
                                    <div class="row text-center text-warning mb-3"><strong><u>Tax Rate Of Open plot</u></strong></div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Open plot Readireckoner Rate</label>
                                            <input type="number" step="0.01" name="open_plot_readireckoner_rate" class="form-control" value="{{ old('open_plot_readireckoner_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Open plot Builtup Area Readireckoner Rate</label>
                                            <input type="number" step="0.01" name="open_plot_builtup_area_readireckoner_rate" class="form-control" value="{{ old('open_plot_builtup_area_readireckoner_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Open plot Depreciation Rate</label>
                                            <input type="number" step="0.01" name="open_plot_depreciation_rate" class="form-control" value="{{ old('open_plot_depreciation_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Open plot Usage Rate</label>
                                            <input type="number" step="0.01" name="open_plot_usage_rate" class="form-control" value="{{ old('open_plot_usage_rate') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Open plot Tax Rate</label> 
                                            <input type="number" step="0.01" name="open_plot_tax_rate" class="form-control" value="{{ old('open_plot_tax_rate') }}" >
                                        </div>
                                    </div>
                                    
                                </div>

                                {{-- Special Tax Fields --}}
                                <div class="row">
                                    <div class="row text-center text-warning mb-3"><strong><u>Tax Rate Of Spacial</u></strong></div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Special Tax Name</label>
                                            <input type="text" name="special_tax" class="form-control" value="{{ old('special_tax') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Special Tax Rate</label>
                                            <input type="number" step="0.01" name="special_tax_rate" value="{{ old('special_tax_rate') }}" class="form-control" >
                                        </div>
                                    
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">Add Panchayat Tax</button>
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
@push('js')
    <script src="{{ asset('admin/assets/js/index.js') }}"></script>
@endpush

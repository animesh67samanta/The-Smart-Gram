@extends('admin.layouts.main')
@section('title', 'Panchayat Tax List')
@section('content')
    <div class="wrapper">
        <div class="page-wrapper">
            <div class="page-content">

                {{-- <h6 class="mb-0 text-uppercase">Panchayat List</h6>
                <hr /> --}}
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Panchayat</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Tax List</li>
                            </ol>
                        </nav>
                    </div>

                </div>
                
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center">Sl. No.</th>
                                        <th colspan="2" class="text-center">Panchayat Details</th>
                                        <th colspan="8" class="text-center text-info">Tax Rate Of RCC</th>
                                        <th colspan="8" class="text-center text-info">Tax Rate Of Flat</th>
                                        <th colspan="8" class="text-center text-info">Tax Rate Of Mud Brick House</th>
                                        <th colspan="8" class="text-center text-info">Tax Rate Of House Of Sticks</th>
                                        <th colspan="8" class="text-center text-info">Tax Rate Of Commercial</th>
                                        <th colspan="8" class="text-center text-info">Tax Rate Of MIDC</th>
                                        <!-- <th colspan="3" class="text-center">Tax Rate Of Others</th> -->
                                        <th colspan="3" class="text-center text-info">Tax Rate Of Spacial</th>
                                        <th rowspan="2" class="text-center">Action</th>
                                        
                                      </tr>
                                      <tr>
                                        <th>Name</th>
                                        <th>ID</th>
                                        
                                        <th>Open Plot Readireckoner Rate</th>
                                        <th>Builtup Area Readireckoner Rate</th>
                                        <th>Depreciation Rate</th>
                                        <th>Usage Rate</th>
                                        <th>Tax Rate</th>
                                        <th>Health Tax Rate</th>
                                        <th>Lamp Tax Rate</th>
                                        <th>Water Tax Rate</th>

                                        <th>Open Plot Readireckoner Rate</th>
                                        <th>Builtup Area Readireckoner Rate</th>
                                        <th>Depreciation Rate</th>
                                        <th>Usage Rate</th>
                                        <th>Tax Rate</th>
                                        <th>Health Tax Rate</th>
                                        <th>Lamp Tax Rate</th>
                                        <th>Water Tax Rate</th>

                                        <th>Open Plot Readireckoner Rate</th>
                                        <th>Builtup Area Readireckoner Rate</th>
                                        <th>Depreciation Rate</th>
                                        <th>Usage Rate</th>
                                        <th>Tax Rate</th>
                                        <th>Health Tax Rate</th>
                                        <th>Lamp Tax Rate</th>
                                        <th>Water Tax Rate</th>

                                         <th>Open Plot Readireckoner Rate</th>
                                        <th>Builtup Area Readireckoner Rate</th>
                                        <th>Depreciation Rate</th>
                                        <th>Usage Rate</th>
                                        <th>Tax Rate</th>
                                        <th>Health Tax Rate</th>
                                        <th>Lamp Tax Rate</th>
                                        <th>Water Tax Rate</th>

                                        <th>Open Plot Readireckoner Rate</th>
                                        <th>Builtup Area Readireckoner Rate</th>
                                        <th>Depreciation Rate</th>
                                        <th>Usage Rate</th>
                                        <th>Tax Rate</th>
                                        <th>Health Tax Rate</th>
                                        <th>Lamp Tax Rate</th>
                                        <th>Water Tax Rate</th>

                                         <th>Open Plot Readireckoner Rate</th>
                                        <th>Builtup Area Readireckoner Rate</th>
                                        <th>Depreciation Rate</th>
                                        <th>Usage Rate</th>
                                        <th>Tax Rate</th>
                                        <th>Health Tax Rate</th>
                                        <th>Lamp Tax Rate</th>
                                        <th>Water Tax Rate</th>

                                        <th>Spacial Tax Name</th>
                                        <th>Spacial Tax Name In Marathi</th>
                                        <th>Spacial Tax Rate</th>
                                        
                                      </tr>
                                </thead>
                                <tbody>
                                    @foreach ($panchayatTaxes as $key=> $panchayatTax)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $panchayatTax->panchayat_name ?? '-' }}</td>
                                            <td>{{ $panchayatTax->panchayat_id ?? '-' }}</td>
                                            <td>{{ $panchayatTax->rcc_open_plot_readireckoner_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->rcc_builtup_area_readireckoner_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->rcc_depreciation_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->rcc_usage_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->rcc_tax_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->rcc_health_tax ?? '-' }}</td>
                                            <td>{{ $panchayatTax->rcc_lamp_tax ?? '-' }}</td>
                                            <td>{{ $panchayatTax->rcc_water_tax ?? '-' }}</td>

                                            <td>{{ $panchayatTax->flat_open_plot_readireckoner_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->flat_builtup_area_readireckoner_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->flat_depreciation_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->flat_usage_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->flat_tax_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->flat_health_tax ?? '-' }}</td>
                                            <td>{{ $panchayatTax->flat_lamp_tax ?? '-' }}</td>
                                            <td>{{ $panchayatTax->flat_water_tax ?? '-' }}</td>

                                            <td>{{ $panchayatTax->mud_brick_open_plot_readireckoner_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->mud_brick_builtup_area_readireckoner_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->mud_brick_depreciation_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->mud_brick_usage_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->mud_brick_tax_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->mud_brick_health_tax ?? '-' }}</td>
                                            <td>{{ $panchayatTax->mud_brick_lamp_tax ?? '-' }}</td>
                                            <td>{{ $panchayatTax->mud_brick_water_tax ?? '-' }}</td>

                                            <td>{{ $panchayatTax->sticks_open_plot_readireckoner_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->sticks_builtup_area_readireckoner_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->sticks_depreciation_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->sticks_usage_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->sticks_tax_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->sticks_health_tax ?? '-' }}</td>
                                            <td>{{ $panchayatTax->sticks_lamp_tax ?? '-' }}</td>
                                            <td>{{ $panchayatTax->sticks_water_tax ?? '-' }}</td>

                                            <td>{{ $panchayatTax->commercial_open_plot_readireckoner_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->commercial_builtup_area_readireckoner_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->commercial_depreciation_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->commercial_usage_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->commercial_tax_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->commercial_health_tax ?? '-' }}</td>
                                            <td>{{ $panchayatTax->commercial_lamp_tax ?? '-' }}</td>
                                            <td>{{ $panchayatTax->commercial_water_tax ?? '-' }}</td>

                                            <td>{{ $panchayatTax->midc_open_plot_readireckoner_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->midc_builtup_area_readireckoner_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->midc_depreciation_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->midc_usage_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->midc_tax_rate ?? '-' }}</td>
                                            <td>{{ $panchayatTax->midc_health_tax ?? '-' }}</td>
                                            <td>{{ $panchayatTax->midc_lamp_tax ?? '-' }}</td>
                                            <td>{{ $panchayatTax->midc_water_tax ?? '-' }}</td>

                                            <td>{{ $panchayatTax->special_tax ?? '-' }}</td>
                                            <td>{{ $panchayatTax->special_tax_mr ?? '-' }}</td>
                                            <td>{{ $panchayatTax->special_tax_rate ?? '-' }}</td>
                                            
                                            <td>
                                                <a href="{{route('admin.panchayat.tax.edit',$panchayatTax->id)}}"><i
                                                        class='bx bx-edit'></i>Edit</a>

                                                       
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection
    {{-- @push('js')
    @endpush --}}

@extends('panchayat.layouts.main')
@section('title', 'Home Tax Details')
@section('content')

    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Home Tax</div>
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Home Tax Details</li>
                        </ol>
                    </nav>
                </div>

            </div>
            
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <h2 class="mb-4 text-center">Home Tax Calculation Details</h2>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <!-- <th scope="row">Property Owner Name</th> -->
                                            <th scope="row">{{ GoogleTranslate::trans('Property Owner Name', 'mr') }}</th>
                                            <td>{{$details->property->owner_name_mr}}</td>
                                        </tr>
                                        <!-- <tr>
                                            <th scope="row">Property Name</th>
                                            <td>{{$details->property->property_name}}</td>
                                        </tr> -->
                                        <tr>
                                            <!-- <th scope="row">Property User Name</th> -->
                                            <th scope="row">{{ GoogleTranslate::trans('Property User Name', 'mr') }}</th>
                                            <td>{{$details->property->property_user_name_mr}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ GoogleTranslate::trans('Property No', 'mr') }}</th>
                                            <td>{{ $details->property->property_no }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ GoogleTranslate::trans('Total Square Meter / Feet', 'mr') }}</th>
                                            <td>"{{$details->property->area_in_sqmt}}" /  "{{$details->property->area_in_sqft}}"</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ GoogleTranslate::trans('Year', 'mr') }}</th>
                                            <td>{{$details->year}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ GoogleTranslate::trans('Property Depreciation', 'mr') }}</th>
                                            <td>{{$details->property->description_mr}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ GoogleTranslate::trans('Property Type', 'mr') }}</th>
                                            <td>{{$details->property->house_type_mr ?? ''}}</td>
                                        </tr>
                                       
                                        <tr>
                                            <th scope="row">{{ GoogleTranslate::trans('Street Name', 'mr') }}</th>
                                            <td>{{ $details->property->street_name_mr }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ GoogleTranslate::trans('CT Survey No', 'mr') }}</th>
                                            <td>{{$details->property->ct_survey_no}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ GoogleTranslate::trans('Year of Income Construction', 'mr') }}</th>
                                            <td>{{$details->property->year_of_income_construction}}</td>
                                        </tr>
                                       
                                       {{-- Panchat Taxes --}}
                                       <tr>
                                            <th scope="row">{{ GoogleTranslate::trans('Open Plot Readireckoner Rate', 'mr') }}</th>
                                            <td>{{ $open_plot_readireckoner_rate ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ GoogleTranslate::trans('Build Up Area Readireckoner Rate', 'mr') }}</th>
                                            <td>{{ $builtup_area_readireckoner_rate ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ GoogleTranslate::trans('Depreciation Rate', 'mr') }}</th>
                                            <td>{{ $depreciation ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ GoogleTranslate::trans('Usage Rate', 'mr') }}</th>
                                            <td>{{ $usage_rate ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ GoogleTranslate::trans('Home Tax Rate', 'mr') }}</th>
                                            <td>{{ $home_tax_rate ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ GoogleTranslate::trans('Health Tax Rate', 'mr') }}</th>
                                            <td>{{$health_tax_rate}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">{{ GoogleTranslate::trans('Lamp Tax Rate', 'mr') }}</th>
                                            <td>{{$lamp_tax_rate}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ GoogleTranslate::trans('Water Tax Rate', 'mr') }}</th>
                                            <td>{{$water_tax_rate}}</td>
                                        </tr>
                                        @if(!empty($details->special_tax) && !empty($details->special_tax_rate))
                                        <tr>
                                            <th scope="row">{{$details->special_tax_mr}}</th>
                                            <td>{{$details->special_tax_rate}}</td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <th scope="row">{{ GoogleTranslate::trans('Discount Home Tax', 'mr') }}</th>
                                            <td>{{$details->tax_discount ?? 0.00 }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ GoogleTranslate::trans('Penalty Home Tax', 'mr') }}</th>
                                            <td>{{$details->tax_penalty ?? 0.00 }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ GoogleTranslate::trans('Capital Value', 'mr') }}</th>
                                            <td>{{ number_format($capitalValue, 0) ?? 0.00 }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ GoogleTranslate::trans('Home Tax Amount', 'mr') }}</th>
                                            <td>{{number_format($homeTax, 2 ) ?? 0.00 }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ GoogleTranslate::trans('Total Tax Amount', 'mr') }}</th>
                                            <td>{{ number_format($getTotalTax, 2 )?? 0.00 }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center mt-4">
                                <a href="{{ route('panchayat.hometaxes.payment.create',$id) }}" class="btn btn-info"> Home Tax Payment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

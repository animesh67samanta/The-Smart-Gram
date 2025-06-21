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
                        <ol class="breadcrumb mb-0 p-2">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Home Tax Details</li>
                        </ol>
                    </nav>
                </div>

            </div>
            
            <div class="row">
                <div class="col-md-10 mx-auto offset-4">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <h2 class="mb-4 text-center">Home Tax Calculation Details</h2>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <!-- <th scope="row">Property Owner Name</th> -->
                                            <th scope="row">मिळकत धारकाचे नाव </th>
                                            <td>{{$details->property->owner_name_mr ?? '-' }}</td>
                                        </tr>
                                      
                                        <tr>
                                            {{-- <th scope="row">{{ GoogleTranslate::trans('Property User Name', 'mr') }}</th> --}}
                                           <th scope="row">मिळकत वापरकर्त्याचे नाव</th> 
                                            <td>{{$details->property->property_user_name_mr ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">मिळकत नं.</th>
                                            <td>{{ $details->property->property_no ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">एकूण चौरस मीटर / पाय</th>
                                            <td>"{{$details->property->area_in_sqmt ?? '-' }}" /  "{{$details->property->area_in_sqft ?? '-' }}"</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">वर्ष</th>
                                            <td>{{$details->year ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">मिळकत घसारा</th>
                                            <td>{{$details->property->description_mr ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">मिळकत प्रकार</th>
                                            <td>{{$details->property->house_type_mr ?? ''}}</td>
                                        </tr>
                                       
                                        <tr>
                                            <th scope="row">रस्त्याचे नाव</th>
                                            <td>{{ $details->property->street_name_mr ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">सीटी सर्वेक्षण क्र</th>
                                            <td>{{$details->property->ct_survey_no ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">उत्पन्नाचे वर्ष</th>
                                            <td>{{$details->property->year_of_income_construction ?? '-'}}</td>
                                        </tr>
                                       
                                       {{-- Panchat Taxes --}}
                                       <tr>
                                            <th scope="row">ओपन प्लॉट रीडरेकॉनर दर</th>
                                            <td>{{ $open_plot_readireckoner_rate ?? 0.00 }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">बिल्ट अप एरिया रीडायरेसीओनर रेट</th>
                                            <td>{{ $builtup_area_readireckoner_rate ?? 0.00 }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">घसारा दर</th>
                                            <td>{{ $depreciation ?? 0.00 }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">वापर दर</th>
                                            <td>{{ $usage_rate ?? 0.00 }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">घरपट्टी कर दर</th>
                                            <td>{{ $home_tax_rate ?? 0.00 }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">आरोग्य कर दर</th>
                                            <td>@if($details->property->description != "Open plot") {{$health_tax_rate ?? 0.00}} @endif</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">दिवाबत्ती कर दर</th>
                                            <td>@if($details->property->description != "Open plot") {{$lamp_tax_rate ?? 0.00}} @endif</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">पाणी कर दर</th>
                                            <td>@if($details->property->description != "Open plot") {{$water_tax_rate ?? 0.00}} @endif</td>
                                        </tr>
                                        @if(!empty($details->special_tax) && !empty($details->special_tax_rate) && ($details->property->description != "Open plot"))
                                        <tr>
                                            <th scope="row">{{$details->special_tax_mr}}</th>
                                            <td>{{$details->special_tax_rate ?? 0.00}}</td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <th scope="row">सूट गृह कर</th>
                                            <td>{{$details->tax_discount ?? 0.00 }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">पेनल्टी होम टॅक्स</th>
                                            <td>{{$details->tax_penalty ?? 0.00 }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">भांडवली मूल्य</th>
                                            <td>{{ number_format($capitalValue, 0) ?? 0.00 }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">गृह कर रक्कम</th>
                                            <td>{{number_format($homeTax, 2 ) ?? 0.00 }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">एकूण कर रक्कम</th>
                                            <td>{{ number_format($getTotalTax, 2 )?? 0.00 }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center mt-4">
                                 <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
                                <a href="{{ route('panchayat.hometaxes.due.create', $id) }}"  onclick="return confirmPayment();" class="btn btn-warning">Pay Now</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

<script>
    function confirmPayment() {
        return confirm("Are you sure you want to proceed with the payment?");
    }
</script>
    
@endsection

@extends('panchayat.layouts.main')
@section('title', 'Hometax List')
@section('content')


<div class="wrapper">
    <div class="page-wrapper">
        <div class="page-content">

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">HomeTax Calculation</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">List</li>
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
                                    <th>ID</th>
                                    <th>Year</th>
                                    <th style="padding: 0 36px;">Owner Name</th>
                                    <th>Property No</th>
                                    <th style="padding: 0 28px;">Property User Name</th>
                                    <th>Total Square Meter</th>
                                    <th>Property Depreciation</th>
                                    <th>Property Type</th>
                                    <th>Open Plot Rate</th>
                                    <th style="padding: 0 28px;">Built-up Area Rate</th>
                                    <th>Depreciation Rate</th>
                                    <th>Usage Rate</th>
                                    <th>Tax Rate</th>
                                    <th>Health Tax Rate</th>
                                    <th>Lamp Tax Rate</th>
                                    <th>Water Tax Rate</th>
                                    <th style="padding: 0 28px;">Calculated Home Tax</th> <!-- Removed the extra <th> -->
                                    <th>Discount Tax</th>
                                    <th>Penalty Tax</th>
                                    <th style="padding: 0 28px;">Home Pay Tax</th>
                                    <th style="padding: 0 28px;">Home Due Tax</th>
                                    <th>Payment Status</th> <!-- Make sure "Action" has its own column -->
                                    <th>Action</th>
                                    <th>Download</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach ($homeTaxes as $key => $homeTax)
                                <?php //dd($homeTax);?>
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $homeTax->year ?? '-' }}</td>
                                    <td >{{ $homeTax->property->owner_name ?? '-' }} </td>
                                    <td>{{ $homeTax->property->property_no ?? '-' }}</td>
                                    <td>{{ $homeTax->property->property_user_name ?? '-' }} </td>
                                    <td>{{ $homeTax->property->area_in_sqmt ?? '-' }}</td>
                                    <td>{{ $homeTax->property->description ?? '-' }}</td>
                                    <td>{{ $homeTax->property->house_type ?? '-' }} </td>
                                    <td>{{ $homeTax->open_plot_readireckoner_rate ?? '0.00' }}</td>
                                    <td>{{ $homeTax->builtup_area_readireckoner_rate ?? '0.00' }}</td>
                                    <td>{{ $homeTax->depreciation ?? '0.00' }}</td>
                                    <td>{{ $homeTax->usage_rate ?? '0.00' }}</td>
                                    <td>{{ $homeTax->home_tax_rate ?? '0.00' }}</td>
                                    <td>{{ $homeTax->health_tax_rate ?? '0.00' }}</td>
                                    <td>{{ $homeTax->lamp_tax_rate ?? '0.00' }}</td>
                                    <td>{{ $homeTax->water_tax_rate ?? '0.00' }}</td>
                                    <td>{{ $homeTax->calculated_home_tax ?? '0.00' }}</td>
                                    <td>{{ $homeTax->tax_discount ?? '0.00' }}</td>
                                    <td>{{ $homeTax->tax_penalty ?? '0.00' }}</td>
                                    <td>{{ $homeTax->home_pay_tax_amount ?? '0.00' }}</td>
                                    <td>
                                    @if($homeTax->home_due_tax_amount <=0)
                                    <p>0.00</p>
                                    @else
                                    {{ $homeTax->home_due_tax_amount ?? '0.00' }}
                                    @endif
                                    </td>

                                    <td class="text-center">
                                        @if(($homeTax->calculated_home_tax - $homeTax->home_pay_tax_amount) <= 0)
                                        <p class="text-success"><b> Paid </b></p>
                                        @else
                                        <a class="btn btn-warning btn-sm " href="{{ route('panchayat.hometaxes.due.create', $homeTax->id) }}">Due</a>
                                        @endif
                                    </td>
                                    
                                    <td  class="text-center">
                                        <a href="{{ route('panchayat.hometaxes.edit', $homeTax->id) }}">
                                            <i class='bx bx-edit'></i>Edit
                                        </a>
                                    </td>
                                    <td  class="text-center">
                                        @if(($homeTax->calculated_home_tax - $homeTax->home_pay_tax_amount) <= 0)
                                        <a class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Payment Recipt Download" href="{{ route('panchayat.hometaxes.payment.recipt', $homeTax->id) }}" > <i class="bx bx-download"></i></a>
                                        @else
                                        <a class="btn btn-warning btn-sm" href="{{ route('panchayat.hometaxes.demand.bill', $homeTax->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Demand Bill Download"><i class="bx bx-download" ></i></a>
                                        @endif
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

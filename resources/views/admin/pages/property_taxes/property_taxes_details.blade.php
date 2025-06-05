@extends('admin.layouts.main')
@section('title', 'Property Tax Details')
@section('content')

    <div class="wrapper">
        <div class="page-wrapper">
            <div class="page-content">

                <!-- Breadcrumbs -->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Property Tax</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <!-- Property Tax Details Table -->
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5>Property Tax Details</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="bg-blue">
                                    <th>Field</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><p class="font-weight-bold m-0">Property Name:</p></td>
                                    <td>{{ $propertyTax->property->property_name }}</td>
                                </tr>
                                <tr>
                                    <td><p class="font-weight-bold m-0">Owner Name:</p></td>
                                    <td>{{ $propertyTax->property->owner_name }}</td>
                                </tr>
                                <tr>
                                    <td><p class="font-weight-bold m-0">Property No:</p></td>
                                    <td>{{ $propertyTax->property->property_no }}</td>
                                </tr>
                                <tr>
                                    <td><p class="font-weight-bold m-0">Description:</p></td>
                                    <td>{{ $propertyTax->property->description }}</td>
                                </tr>
                                <tr>
                                    <td><p class="font-weight-bold m-0">Street Name:</p></td>
                                    <td>{{ $propertyTax->street_name }}</td>
                                </tr>
                                <tr>
                                    <td><p class="font-weight-bold m-0">Year Of Income Construction:</p></td>
                                    <td>{{ $propertyTax->year_of_income_construction }}</td>
                                </tr>
                                <tr>
                                    <td><p class="font-weight-bold m-0">Area in Sqft:</p></td>
                                    <td>{{ $propertyTax->area_in_sqft }}</td>
                                </tr>
                                <tr>
                                    <td><p class="font-weight-bold m-0">Area in Sqmt:</p></td>
                                    <td>{{ $propertyTax->area_in_sq_mt }}</td>
                                </tr>
                                <tr>
                                    <td><p class="font-weight-bold m-0">Open Plot:</p></td>
                                    <td>{{ $propertyTax->open_plot }}</td>
                                </tr>
                                <tr>
                                    <td><p class="font-weight-bold m-0">Residence:</p></td>
                                    <td>{{ $propertyTax->residence }}</td>
                                </tr>
                                <tr>
                                    <td><p class="font-weight-bold m-0">Builders:</p></td>
                                    <td>{{ $propertyTax->builders }}</td>
                                </tr>
                                <tr>
                                    <td><p class="font-weight-bold m-0">Depriciation Rate:</p></td>
                                    <td>{{ $propertyTax->depriciation_rate }}</td>
                                </tr>
                                <tr>
                                    <td><p class="font-weight-bold m-0">Weight Use of Builders:</p></td>
                                    <td>{{ $propertyTax->weight_use_of_builders }}</td>
                                </tr>
                                <tr>
                                    <td><p class="font-weight-bold m-0">Capital Value:</p></td>
                                    <td>{{ $propertyTax->capital_value }}</td>
                                </tr>
                                <tr>
                                    <td><p class="font-weight-bold m-0">Tax Rate:</p></td>
                                    <td>{{ $propertyTax->tax_rate }}</td>
                                </tr>
                                <tr>
                                    <td><p class="font-weight-bold m-0">Home Tax:</p></td>
                                    <td>{{ $propertyTax->home_tax }}</td>
                                </tr>
                                <tr>
                                    <td><p class="font-weight-bold m-0">Lamp Tax:</p></td>
                                    <td>{{ $propertyTax->lamp_tax }}</td>
                                </tr>
                                <tr>
                                    <td><p class="font-weight-bold m-0">Health Tax:</p></td>
                                    <td>{{ $propertyTax->health_tax }}</td>
                                </tr>
                                <tr>
                                    <td><p class="font-weight-bold m-0">Water Tax:</p></td>
                                    <td>{{ $propertyTax->water_tax }}</td>
                                </tr>
                                <tr>
                                    <td><p class="font-weight-bold m-0">Total:</p></td>
                                    <td>{{ $propertyTax->total }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


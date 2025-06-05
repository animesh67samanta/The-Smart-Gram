@extends('admin.layouts.main')
@section('title', 'Property Tax Calculation')
@section('content')



    <div class="wrapper">
        <div class="page-wrapper">
            <div class="page-content">

                {{-- <h6 class="mb-0 text-uppercase">Property Tax List</h6>
                <hr /> --}}
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Property Tax</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
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
                                        <th>Sr No</th>
                                        <th>Property Name</th>
                                        <th>Street Name</th>
                                        <th>Year Of Income Construction</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($propertyTaxes as $key=> $propertyTax)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $propertyTax->property->property_name ?? 'null' }}</td>
                                            <td>{{ $propertyTax->street_name ?? 'null' }}</td>
                                            <td>{{ $propertyTax->year_of_income_construction ?? 'null' }}</td>
                                            <td>
                                                <a href="{{ route('admin.propertyTax.details', $propertyTax->id) }}"><i
                                                    class='bx bx-edit'></i>Details</a>
                                                <a href="{{ route('admin.propertyTax.edit', $propertyTax->id) }}"><i
                                                        class='bx bx-radio-circle'></i>Edit</a>
                                                <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this property tax details?')) { document.getElementById('delete-property-{{ $propertyTax->id }}').submit(); }">
                                                    <i class='bx bx-trash'></i> Delete
                                                </a>
                                                  <!-- Hidden form for delete request -->
                                                <form id="delete-property-{{ $propertyTax->id }}" action="{{ route('admin.propertyTax.delete', $propertyTax->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>

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


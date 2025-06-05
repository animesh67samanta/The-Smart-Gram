@extends('panchayat.layouts.main')
@section('title', 'Property List')
@section('content')



    <div class="wrapper">
        <div class="page-wrapper">
            <div class="page-content">

                {{-- <h6 class="mb-0 text-uppercase">Panchayat List</h6>
                <hr /> --}}
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Property</div>
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
                                        <th>Sl No</th>
                                        <!-- <th>{{ GoogleTranslate::trans('Panchayat Name', 'mr') }}/Panchayat Name</th> -->
                                        <!-- <th>Owner Name</th> -->
                                        <!-- <th>Property No</th> -->
                                        <!-- <th>Property Name</th> -->
                                        <!-- <th>Property User Name</th>
                                        <th>Property Type</th>
                                        <th>House Type</th>
                                        <th>Area in Square Feet</th>
                                        <th>Area in Square Meter</th> -->
                                        <th>{{ GoogleTranslate::trans('Panchayat Name', 'mr') }}</th>
                                        <th>{{ GoogleTranslate::trans('Owner Name', 'mr') }}</th>
                                        <th>{{ GoogleTranslate::trans('Property No', 'mr') }}</th>

                                        <th>{{ GoogleTranslate::trans('Property Property User Name', 'mr') }}</th>
                                        <th>{{ GoogleTranslate::trans('Property Type', 'mr') }}</th>
                                        <th>{{ GoogleTranslate::trans('House Type', 'mr') }}</th>
                                        <th>{{ GoogleTranslate::trans('Area in Square Feet', 'mr') }}</th>
                                        <th>{{ GoogleTranslate::trans('Area in Square Meter', 'mr') }}</th>



                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($properties as $key=> $property)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $property->panchayat->name_mr ?? 'null' }}</td>
                                            <td>{{ $property->owner_name_mr ?? 'null' }}</td>
                                            <td>{{ $property->property_no ?? 'null' }}</td>
                                            <!-- <td>{{ $property->property_name ?? 'null' }}</td> -->
                                            <td>{{ $property->property_user_name_mr ?? 'null' }}</td>
                                            <td>{{ $property->description_mr ?? 'null' }}</td>
                                            <td>{{ $property->house_type_mr ?? 'null' }}</td>
                                            <td>{{ $property->area_in_sqft ?? 'null' }}</td>
                                            <td>{{ $property->area_in_sqmt ?? 'null' }}</td>

                                            <td>

                                                <a href="{{ route('panchayat.property.edit', $property->id) }}"><i
                                                    class='bx bx-edit'></i>Edit</a>

                                                    <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this property?')) { document.getElementById('delete-property-{{ $property->id }}').submit(); }">
                                                        <i class='bx bx-trash'></i> Delete
                                                    </a>

                                                    <!-- Hidden form for delete request -->
                                                    <form id="delete-property-{{ $property->id }}" action="{{ route('panchayat.property.delete', $property->id) }}" method="POST" style="display: none;">
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

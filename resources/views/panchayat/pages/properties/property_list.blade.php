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
                            <ol class="breadcrumb mb-0 p-2">
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
                                        <th>पंचायत नाव</th>
                                        <th>मालकाचे नाव</th>
                                        <th>मालमत्ता क्र</th>
                                        <th>Sequence</th>

                                        <th>लमत्ता मालमत्ता वापरकर्त्याचे नाव</th>
                                        <th>मालमत्ता प्रकार</th>
                                        <th>घराचा प्रकार</th>
                                        <th>चौरस फूट क्षेत्र</th>
                                        <th>चौरस मीटर क्षेत्र</th>



                                        
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
                                            <td>{{ $property->sequence ?? ''  }}</td>
                                           
                                            <td>{{ $property->property_user_name_mr ?? 'null' }}</td>
                                            <td>{{ $property->description_mr ?? 'null' }}</td>
                                            <td>{{ $property->house_type_mr ?? 'null' }}</td>
                                            <td>{{ $property->area_in_sqft ?? 'null' }}</td>
                                            <td>{{ $property->area_in_sqmt ?? 'null' }}</td>

                                            <td>

                                                <a href="{{ route('panchayat.property.edit', $property->id) }}" class="text-info"><i
                                                    class='bx bx-edit'></i>Edit</a>
                                                    <br>
                                                    <a href="#" class="text-danger" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this property?')) { document.getElementById('delete-property-{{ $property->id }}').submit(); }">
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

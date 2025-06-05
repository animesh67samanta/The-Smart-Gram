@extends('panchayat.layouts.main')
@section('title', 'Lamptax List')
@section('content')

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="wrapper">
    <div class="page-wrapper">
        <div class="page-content">

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">LampTax Calculation</div>
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
                                    <th>Property Name</th>
                                    <th>Year</th>
                                    <th>Total Tax</th>
                                    <th> Lamp Pay Tax</th>
                                    <th>Lamp Due Tax</th>
                                    <th style="width: 150px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lampTaxes as $key => $lampTax)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $lampTax->property->property_name }}</td>
                                        <td>{{ $lampTax->year }}</td>
                                        <td>{{ $lampTax->total_lamp_tax }}</td>
                                        <td>{{ $lampTax->pay_tax_amount }}</td>
                                        <td>
                                            @if($lampTax->due_tax_amount <=0)
                                            <p>0</p>
                                            @else
                                            {{ $lampTax->due_tax_amount ?? 'N/A' }}
                                            @endif
                                            </td>

                                        <td>
                                            <a href="{{ route('panchayat.lamptaxes.due.create', $lampTax->id) }}">
                                                <i class='bx bx-edit'></i>Due
                                            </a>

                                            {{-- <a href="{{ route('panchayat.hometaxes.edit', $homeTax->id) }}">
                                                <i class='bx bx-edit'></i>Edit
                                            </a>

                                            <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this home tax record?')) { document.getElementById('delete-hometax-{{ $homeTax->id }}').submit(); }">
                                                <i class='bx bx-trash'></i>Delete
                                            </a> --}}

                                            <!-- Hidden form for delete request -->
                                            {{-- <form id="delete-hometax-{{ $homeTax->id }}" action="{{ route('panchayat.hometaxes.destroy', $homeTax->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE') <!-- Use this method to trigger deletion -->
                                            </form> --}}
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

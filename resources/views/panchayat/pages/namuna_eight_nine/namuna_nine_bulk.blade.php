@extends('panchayat.layouts.main')
@section('title', 'Property Select For Namuna 9')
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .data-count {
    font-size: 14px;
    color: #6c757d;
    padding: 8px 0;
}
    .property-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    .property-table th, .property-table td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }
    .property-table th {
        background-color: #78838f;
        font-weight: 600;
    }
    .property-table tr:hover {
        background-color: #0c047f;
    }
    .select-all-container {
        margin-top: 20px;
    }
    .action-buttons {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }
    .checkbox-cell {
        width: 40px;
        text-align: center;
    }
    .property-info {
        display: flex;
        align-items: center;
    }
    .property-id {
        font-weight: bold;
        margin-right: 10px;
        min-width: 80px;
    }
    .property-name {
        flex-grow: 1;
    }
</style>
@endpush
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Namuna No.</div>
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-2">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">9 Bulk</li>
                    </ol>
                </nav>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h2>Select Property for Namuna Nine Bulk</h2>

                        <form action="{{ route('panchayat.namuna.nine.bulk.download') }}" method="POST" id="propertyForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="year">Year</label>
                                        <select name="year" class="form-control" required>
                                            <option value="">Select Year</option>
                                            <option value="2025" {{ old('year') == '2025' ? 'selected' : '' }}>2025 - 2026</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="select-all-container ">
                                        <button type="button" class="btn btn-sm btn-outline-warning select-all">
                                            <i class="fas fa-check-square"></i> Select All
                                        </button>
                                  
                                        <button type="button" class="btn btn-sm btn-outline-danger deselect-all">
                                            <i class="far fa-square"></i> Deselect All
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="action-buttons mb-3">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-eye"></i> Download Selected as PDF
                                        </button>
                                    
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="table-responsive">
                                <table class="property-table">
                                    <thead>
                                        <tr>
                                            <th class="checkbox-cell">
                                                <input type="checkbox" id="selectAll">
                                            </th>
                                            <th>Property No</th>
                                            <th>Owner Name (Marathi)</th>
                                            <th>Owner Name (English)</th>
                                        </tr>
                                    </thead>
                                    {{-- <tbody>
                                        @foreach($properties as $property)
                                        <tr>
                                            <td class="checkbox-cell">
                                                <input type="checkbox" name="property_id[]" value="{{ $property->id }}" class="property-checkbox">
                                            </td>
                                            <td>{{ $property->property_no }}</td>
                                            <td>{{ $property->owner_name_mr }}</td>
                                            <td>{{ $property->owner_name }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody> --}}
                                    <tbody id="property-table-body">
                                        @include('panchayat.pages.namuna_eight_nine.namuna_nine_property_table')
                                    </tbody>

                                </table>
                                <div id="pagination-links">
                                    {{ $properties->links('pagination::bootstrap-4') }}
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="data-count">
                                            Showing {{ $properties->firstItem() }} to {{ $properties->lastItem() }} 
                                            of {{ $properties->total() }} entries
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
   $(document).ready(function() {
    // Select all functionality
    $('#selectAll').click(function() {
        $('.property-checkbox').prop('checked', this.checked);
    });
    
    $('.select-all').click(function() {
        $('.property-checkbox').prop('checked', true);
        $('#selectAll').prop('checked', true);
    });

    $('.deselect-all').click(function() {
        $('.property-checkbox').prop('checked', false);
        $('#selectAll').prop('checked', false);
    });
    
    // If any checkbox is unchecked, uncheck the "select all" checkbox
    $(document).on('change', '.property-checkbox', function(){
        if(!this.checked){
            $('#selectAll').prop('checked', false);
        }
    });

    // AJAX pagination
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        const url = $(this).attr('href');
        fetchProperties(url);
    });

    function fetchProperties(url) {
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            beforeSend: function() {
                $('#property-table-body').html('<tr><td colspan="4" class="text-center">Loading...</td></tr>');
            },
            success: function(response) {
            console.log(response.table);
            
                $('#property-table-body').html(response.table);
                $('#pagination-links').html(response.pagination);
                
                // Update the data count display
                $('.data-count').html(
                    'Showing ' + response.first_item + ' to ' + response.last_item + 
                    ' of ' + response.total + ' entries'
                );
            },
            error: function(xhr) {
                console.error('AJAX error:', xhr);
                $('#property-table-body').html('<tr><td colspan="4" class="text-center text-danger">Error loading data. Please try again.</td></tr>');
            }
        });
    }
});
</script>

@endpush
@endsection
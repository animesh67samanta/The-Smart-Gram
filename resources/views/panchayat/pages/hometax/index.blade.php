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
                        <ol class="breadcrumb mb-0 p-2">
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
                                    <th>Payment Slip</th>
                                    <th>Download</th>
                                    <th>Delete</th>
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
                                        <a class="btn btn-success btn-sm ">Paid</a>
                                        @else
                                        <a class="btn btn-warning btn-sm " href="{{ route('panchayat.hometaxes.due.create', $homeTax->id) }}">Pay Now</a>
                                        @endif
                                    </td>
                                    <td  class="text-center">
                                        {{-- <a href="{{ route('panchayat.hometaxes.edit', $homeTax->id) }}">
                                            <i class='bx bx-edit'></i>Edit
                                        </a> --}}
                                        @if(($homeTax->home_pay_tax_amount > 0) && ($homeTax->calculated_home_tax - $homeTax->home_pay_tax_amount) != 0)
                                        <a class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Payment Recipt Download" href="{{ route('panchayat.hometaxes.payment.recipt', $homeTax->id) }}" > <i class="bx bx-download"></i></a>
                                        @else
                                        <a href="#"><i class="bx bx-right-arrow-alt" style="font-size: 20px;"></i></a>
                                        
                                        @endif
                                    </td>
                                   
                                    <td  class="text-center">
                                        @if(($homeTax->calculated_home_tax - $homeTax->home_pay_tax_amount) <= 0)
                                        <a class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Payment Recipt Download" href="{{ route('panchayat.hometaxes.payment.recipt', $homeTax->id) }}" > <i class="bx bx-download"></i></a>
                                        @else
                                        <a class="btn btn-warning btn-sm" href="{{ route('panchayat.hometaxes.demand.bill', $homeTax->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Demand Bill Download"><i class="bx bx-download" ></i></a>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm delete-tax-btn" data-tax-id="{{ $homeTax->id }}">
                                            <i class="bx bx-trash-alt"></i>
                                        </button>
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
{{-- delete modal --}}

<!-- Add this modal at the bottom of your view -->
<div class="modal fade" id="deleteTaxModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="deleteModalMessage">Are you sure you want to delete this tax record?</p>
                <div id="previousYearCheckbox" class="form-check mt-3" style="display: none;">
                    <input class="form-check-input" type="checkbox" id="deletePreviousCheck">
                    <label class="form-check-label" for="deletePreviousCheck">
                        Also delete <span id="previousYearText"></span> tax record
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id="confirmDeleteBtn" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- Add this script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-tax-btn');
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteTaxModal'));
    let currentTaxId = null;

    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            currentTaxId = this.getAttribute('data-tax-id');
            
            // Show loading state
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Checking...';
            
            // Check for previous year data
            fetch(`{{ route('panchayat.hometaxes.check-previous', '') }}/${currentTaxId}`)
                .then(response => response.json())
                .then(data => {
                    // Reset button
                    this.innerHTML = originalText;
                    
                    // Update modal content based on response
                    const checkboxDiv = document.getElementById('previousYearCheckbox');
                    const previousYearText = document.getElementById('previousYearText');
                    
                    if (data.has_previous) {
                        document.getElementById('deleteModalMessage').textContent = 
                            `Are you sure you want to delete ${data.current_year} tax record?`;
                        checkboxDiv.style.display = 'block';
                        previousYearText.textContent = data.previous_year;
                    } else {
                        document.getElementById('deleteModalMessage').textContent = 
                            `Are you sure you want to delete this tax record?`;
                        checkboxDiv.style.display = 'none';
                    }
                    
                    // Show modal
                    deleteModal.show();
                })
                .catch(error => {
                    console.error('Error:', error);
                    this.innerHTML = originalText;
                    alert('Failed to check tax records. Please try again.');
                });
        });
    });

    // Handle delete confirmation
    document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
        const deletePrevious = document.getElementById('deletePreviousCheck').checked;
        
        // Show loading in modal
        this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Deleting...';
        this.disabled = true;
        
        // Send delete request
        fetch(`{{ route('panchayat.hometaxes.homeTax.delete', '') }}/${currentTaxId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                delete_previous: deletePrevious
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Show success message and reload
                deleteModal.hide();
                alert(data.message);
                window.location.reload();
            } else {
                throw new Error(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to delete: ' + error.message);
            this.innerHTML = 'Delete';
            this.disabled = false;
        });
    });
});
</script>
@endsection

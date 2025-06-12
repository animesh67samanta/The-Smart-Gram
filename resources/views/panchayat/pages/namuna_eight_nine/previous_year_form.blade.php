@extends('panchayat.layouts.main')
@section('title', 'Previous Year Tax Form For Namuna 9')
@section('content')

<div class="page-wrapper">
  <div class="page-content">
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Namuna No.</div>
          <div>
              <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-2">
                      <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">9</li>
                  </ol>
              </nav>
          </div>

      </div>
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-8">
                  <div class="card">
                      <div class="card-header"><b>Enter Previous Year ({{ $previous_year }}) Tax Data </b></div>

                      <div class="card-body">
                          <form method="POST" action="{{ route('panchayat.storePreviousYearData') }}">
                              @csrf
                              <input type="hidden" name="property_id" value="{{ $property_id }}">
                              <input type="hidden" name="year" value="{{ $year }}">

                              <div class="form-group row mb-3">
                                  <label for="calculated_home_tax" class="col-md-4 col-form-label text-md-right">Calculated Home Tax</label>
                                  <div class="col-md-6">
                                      <input id="calculated_home_tax" type="number" step="0.01" class="form-control" name="calculated_home_tax" required>
                                  </div>
                              </div>
                              <div class="form-group row mb-3">
                                  <label for="calculated_health_tax" class="col-md-4 col-form-label text-md-right">Calculated Health Tax</label>
                                  <div class="col-md-6">
                                      <input id="calculated_health_tax" type="number" step="0.01" class="form-control" name="calculated_health_tax" required>
                                  </div>
                              </div>
                              <div class="form-group row mb-3">
                                  <label for="calculated_lamp_tax" class="col-md-4 col-form-label text-md-right">Calculated Lamp Tax</label>
                                  <div class="col-md-6">
                                      <input id="calculated_lamp_tax" type="number" step="0.01" class="form-control" name="calculated_lamp_tax" required>
                                  </div>
                              </div>
                              <div class="form-group row mb-3">
                                  <label for="total_tax" class="col-md-4 col-form-label text-md-right"><b>Total Tax</b></label>
                                  <div class="col-md-6">
                                      <input id="total_tax" readonly type="number" step="0.01" class="form-control" name="total_tax">
                                  </div>
                              </div>
                              {{-- <div class="form-group row mb-3">
                                  <label for="home_pay_tax_amount" class="col-md-4 col-form-label text-md-right">Paid Tax Amount</label>
                                  <div class="col-md-6">
                                      <input id="home_pay_tax_amount" type="number" step="0.01" class="form-control" name="home_pay_tax_amount" >
                                  </div>
                              </div>

                              <div class="form-group row mb-3">
                                  <label for="home_due_tax_amount" class="col-md-4 col-form-label text-md-right">Due Tax Amount</label>
                                  <div class="col-md-6">
                                      <input id="home_due_tax_amount" type="number" step="0.01" class="form-control" name="home_due_tax_amount" required>
                                  </div>
                              </div> --}}

                             
                              <div class="form-group row mb-0">
                                  <div class="col-md-6 offset-md-4">
                                      <button type="submit" class="btn btn-success">
                                          Submit and Continue
                                      </button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<script>
  function calculateTotalTax() {
    // Get all the input values
    const homeTax = parseFloat(document.getElementById('calculated_home_tax').value) || 0;
    const healthTax = parseFloat(document.getElementById('calculated_health_tax').value) || 0;
    const lampTax = parseFloat(document.getElementById('calculated_lamp_tax').value) || 0;
    
    // Calculate total
    const totalTax = homeTax + healthTax + lampTax;
    
    // Display the total
    document.getElementById('total_tax').value = totalTax.toFixed(2);
    
    // If due amount field exists, update it as well
    if(document.getElementById('home_due_tax_amount')) {
        const paidAmount = parseFloat(document.getElementById('home_pay_tax_amount').value) || 0;
        document.getElementById('home_due_tax_amount').value = (totalTax - paidAmount).toFixed(2);
    }
  }
// Function to calculate due amount when payment is entered
function calculateDueAmount() {
    const totalTax = parseFloat(document.getElementById('total_tax').value) || 0;
    const paidAmount = parseFloat(document.getElementById('home_pay_tax_amount').value) || 0;
    
    // Calculate due amount
    const dueAmount = totalTax - paidAmount;
    
    // Update due amount field
    document.getElementById('home_due_tax_amount').value = dueAmount.toFixed(2);
}

// Add event listeners when the page loads
document.addEventListener('DOMContentLoaded', function() {
    // Add listeners to tax input fields
    document.getElementById('calculated_home_tax').addEventListener('input', calculateTotalTax);
    document.getElementById('calculated_health_tax').addEventListener('input', calculateTotalTax);
    document.getElementById('calculated_lamp_tax').addEventListener('input', calculateTotalTax);
    
    // Add listener to payment field
    document.getElementById('home_pay_tax_amount').addEventListener('input', calculateDueAmount);
    
    // Calculate initial total if any fields are pre-filled
    calculateTotalTax();
});

</script>

@endsection
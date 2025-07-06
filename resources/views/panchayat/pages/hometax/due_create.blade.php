{{-- @extends('panchayat.layouts.main')
@section('title', 'Hometax Due Payment Create')
@section('content')

    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Hometax</div>
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-2">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Payment Due Create</li>
                        </ol>
                    </nav>
                </div>
            </div>

         
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h2>Due Home Tax Payment</h2>
                                @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                           
                            <form action="{{ route('panchayat.hometaxes.due.store', $hometax->id) }}" method='Post' id="paymentForm"> 
                                @csrf
                               
                                 <!-- Property Owner Info -->
                                <div class="form-group mb-3">
                                    <label for="property_name">Name Of the Property Owner</label>
                                    <input type="text" name="property_name" value="{{ $hometax->property->owner_name_mr }}"
                                        class="form-control" disabled>
                                </div>

                                <!-- Previous Year Section -->
                                <div class="card mb-3">
                                    <div class="card-header bg-light">
                                        <h6 class="mb-0">Previous Year ({{ $previousYearTax->year ?? 0.00 }})</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group mb-2">
                                            <label>Calculated Home Tax</label>
                                            <input type="text" value="₹{{ number_format($previousYearTax->calculated_home_tax ?? 0.00, 2) }}"
                                                class="form-control" disabled>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Pending Amount</label>
                                            <input type="text" 
                                                value="₹{{ number_format($previousYearTax->calculated_home_tax ?? 0.00 - ($previousYearTax->home_pay_tax_amount ?? 0.00), 2) }}"
                                                class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>

                               <!-- Current Year Section -->
                                <div class="card mb-3">
                                    <div class="card-header bg-light">
                                        <h6 class="mb-0">Current Year ({{ $hometax->year }})</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group mb-2">
                                            <label>Calculated Home Tax</label>
                                            <input type="text" value="₹{{ number_format($hometax->calculated_home_tax, 2) }}"
                                                class="form-control" disabled>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Pending Amount</label>
                                            <input type="text" 
                                                value="₹{{ number_format($hometax->calculated_home_tax - ($hometax->home_pay_tax_amount ?? 0), 2) }}"
                                                class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>

                                 <!-- Total Pending Calculation -->
                                @php
                                    $previousPending = $previousYearTax->calculated_home_tax ?? 0.00 - ($previousYearTax->home_pay_tax_amount ?? 0.00 );
                                    $currentPending = $hometax->calculated_home_tax - ($hometax->home_pay_tax_amount ?? 0);
                                    $totalPending = $previousPending + $currentPending;
                                    $minimumPayment = $totalPending * 0.5; // 50% of total
                                @endphp
                                <div class="alert alert-warning mb-3">
                                    <strong>Total Pending Amount:</strong> ₹{{ number_format($totalPending, 2) }}<br>
                                    <strong>Minimum Required Payment (50%):</strong> ₹{{ number_format($minimumPayment, 2) }}
                                </div>

                                <!-- Payment Section -->
                                <div class="form-group mb-3">
                                    <label for="payment_amount">Payment Amount (₹)</label>
                                    <input type="number" step="0.01" name="payment_amount" id="payment_amount"
                                        class="form-control" 
                                        min="{{ number_format($minimumPayment, 2, '.', '') }}"
                                        max="{{ number_format($totalPending, 2, '.', '') }}"
                                        required>
                                    <small class="text-warning">Minimum payment: ₹{{ number_format($minimumPayment, 2) }}</small>
                                </div>

                                <!-- Payment Options -->
                                <div class="form-group mb-3">
                                    <label for="option">Select An Option</label>
                                    <select name="option" id="option-select" class="form-control">
                                        <option value="" disabled selected>Choose One</option>
                                        <option value="discount">Apply 5% Discount</option>
                                        <option value="penalty">Apply 5% Penalty</option>
                                        <option value="none">No Discount/Penalty</option>
                                    </select>
                                </div>

                                <!-- Final Amount Display -->
                                <div class="form-group mb-3">
                                    <label>Final Amount After Adjustment</label>
                                    <input type="text" id="final_amount" class="form-control" disabled>
                                </div>

                                <!-- Hidden Fields -->
                                <input type="hidden" name="tax_discount" id="tax_discount" value="0">
                                <input type="hidden" name="tax_penalty" id="tax_penalty" value="0">
                                <input type="hidden" name="total_pending" value="{{ $totalPending }}">

                                <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn btn-warning">
                                        Pay Bill
                                    </button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const optionSelect = document.getElementById('option-select');
            const paymentAmount = document.getElementById('payment_amount');
            const finalAmount = document.getElementById('final_amount');
            const taxDiscount = document.getElementById('tax_discount');
            const taxPenalty = document.getElementById('tax_penalty');
            const totalPending = parseFloat("{{ $totalPending }}");
            const minimumPayment = parseFloat("{{ $minimumPayment }}");

            // Initialize with minimum payment value
            paymentAmount.value = minimumPayment.toFixed(2);
            updateFinalAmount();

            // Update final amount when payment amount changes
            paymentAmount.addEventListener('input', function() {
                updateFinalAmount();
            });

            // Update final amount when option changes
            optionSelect.addEventListener('change', function () {
                updateFinalAmount();
            });

            // Form validation
            document.getElementById('paymentForm').addEventListener('submit', function(e) {
                const enteredAmount = parseFloat(paymentAmount.value);
                
                if (isNaN(enteredAmount) || enteredAmount < minimumPayment) {
                    alert(`Payment amount must be at least ₹${minimumPayment.toFixed(2)}`);
                    e.preventDefault();
                }
                
                if (enteredAmount > totalPending) {
                    alert(`Payment amount cannot exceed total pending amount of ₹${totalPending.toFixed(2)}`);
                    e.preventDefault();
                }
            });

            function updateFinalAmount() {
                const paymentValue = parseFloat(paymentAmount.value) || 0;
                const optionValue = optionSelect.value;
                
                let discount = 0;
                let penalty = 0;
                let final = paymentValue;

                if (optionValue === 'discount') {
                    discount = paymentValue * 0.05;
                    final = paymentValue - discount;
                } else if (optionValue === 'penalty') {
                    penalty = paymentValue * 0.05;
                    final = paymentValue + penalty;
                }

                // Update values
                taxDiscount.value = discount.toFixed(2);
                taxPenalty.value = penalty.toFixed(2);
                finalAmount.value = '₹' + final.toFixed(2);
            }
        });
    </script>

@endsection
 --}}



@extends('panchayat.layouts.main')
@section('title', 'Hometax Due Payment Create')
@section('content')

    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Hometax</div>
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-2">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Payment Due Create</li>
                        </ol>
                    </nav>
                </div>
            </div>
<?php 
if(!empty($previousYearTax))
$prevDue = $previousYearTax->calculated_home_tax - $previousYearTax->home_pay_tax_amount; ?>
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h2>Due Home Tax Payment</h2>
                                @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                           
                            <form action="{{ route('panchayat.hometaxes.due.store', $hometax->id) }}" method='Post' id="paymentForm"> 
                                @csrf
                               
                                 <!-- Property Owner Info -->
                                <div class="form-group mb-3">
                                    <label for="property_name">Name Of the Property Owner</label>
                                    <input type="text" name="property_name" value="{{ $hometax->property->owner_name_mr }}"
                                        class="form-control" disabled>
                                </div>
                                @if(!empty($previousYearTax) && ($prevDue > 1))
                                <!-- Previous Year Section -->
                                <div class="card mb-3">
                                    <div class="card-header bg-light">
                                        <h6 class="mb-0">Previous Year ({{ $previousYearTax->year ?? 'N/A' }})</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group mb-2">
                                            <label>Calculated Home Tax</label>
                                            <input type="text" value="₹{{ number_format($previousYearTax->calculated_home_tax ?? 0.00, 2) }}"
                                                class="form-control" disabled>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Pending Amount</label>
                                            <input type="text" 
                                                value="₹{{ number_format(($previousYearTax->calculated_home_tax ?? 0.00) - ($previousYearTax->home_pay_tax_amount ?? 0.00), 2) }}"
                                                class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                @endif
                               <!-- Current Year Section -->
                                <div class="card mb-3">
                                    <div class="card-header bg-light">
                                        <h6 class="mb-0">Current Year ({{ $hometax->year }})</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group mb-2">
                                            <label>Calculated Home Tax</label>
                                            <input type="text" value="₹{{ number_format($hometax->calculated_home_tax, 2) }}"
                                                class="form-control" disabled>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Pending Amount</label>
                                            <input type="text" 
                                                value="₹{{ number_format($hometax->calculated_home_tax - ($hometax->home_pay_tax_amount ?? 0), 2) }}"
                                                class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>

                                 <!-- Total Pending Calculation -->
                                 @php
                                    $previousPending = ($previousYearTax->calculated_home_tax ?? 0.00) - ($previousYearTax->home_pay_tax_amount ?? 0.00);
                                    $currentPending = $hometax->calculated_home_tax - ($hometax->home_pay_tax_amount ?? 0);
                                    $totalPending = $previousPending + $currentPending;
                                    $minimumPayment = $previousPending > 0 ? max($previousPending * 0.1, 0) : max($currentPending * 0.1, 0);
                                @endphp
                                <div class="alert alert-warning mb-3">
                                    <strong>Total Pending Amount:</strong> ₹{{ number_format($totalPending, 2) }}<br>
                                    @if($previousPending > 0)
                                        <small class="text-warning">You must first pay the 10% previous year due of ₹{{ number_format(max($previousPending * 0.1, 0), 2) }}</small>
                                    @else
                                        <small class="text-warning">Minimum payment: 10% of current due (₹{{ number_format($minimumPayment, 2) }})</small>
                                    @endif
                                </div>

                                <!-- Payment Section -->
                                <div class="form-group mb-3">
                                    <label for="payment_amount">Payment Amount (₹)</label>
                                    <input type="number" step="0.01" name="payment_amount" id="payment_amount"
                                        class="form-control" 
                                        min="{{ number_format($minimumPayment, 2, '.', '') }}"
                                        max="{{ number_format($totalPending, 2, '.', '') }}"
                                        required>
                                    @if($previousPending > 0)
                                        <small class="text-warning">You must first pay the 10% previous year due of ₹{{ number_format(max($previousPending * 0.1, 0), 2) }}</small>
                                    @else
                                        <small class="text-warning">Minimum payment: 10% of current due (₹{{ number_format($minimumPayment * 0.1, 2) }})</small>
                                    @endif
                                </div>

                                <!-- Payment Options -->
                                <div class="form-group mb-3">
                                    <label for="option">Select An Option</label>
                                    <select name="option" id="option-select" class="form-control">
                                        <option value="" disabled selected>Choose One</option>
                                        <option value="discount">Apply 5% Discount</option>
                                        <option value="penalty">Apply 5% Penalty</option>
                                        <option value="none">No Discount/Penalty</option>
                                    </select>
                                </div>

                                <!-- Final Amount Display -->
                                <div class="form-group mb-3">
                                    <label>Final Amount After Adjustment</label>
                                    <input type="text" id="final_amount" class="form-control" disabled>
                                </div>

                                <!-- Hidden Fields -->
                                <input type="hidden" name="tax_discount" id="tax_discount" value="0">
                                <input type="hidden" name="tax_penalty" id="tax_penalty" value="0">
                                <input type="hidden" name="total_pending" value="{{ $totalPending }}">

                                <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn btn-warning">
                                        Pay Bill
                                    </button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const optionSelect = document.getElementById('option-select');
            const paymentAmount = document.getElementById('payment_amount');
            const finalAmount = document.getElementById('final_amount');
            const taxDiscount = document.getElementById('tax_discount');
            const taxPenalty = document.getElementById('tax_penalty');
            const totalPending = parseFloat("{{ $totalPending }}");
            const minimumPayment = parseFloat("{{ $minimumPayment }}");
            const previousPending = parseFloat("{{ $previousPending }}");

            // Initialize with minimum payment value
            paymentAmount.value = minimumPayment.toFixed(2);
            updateFinalAmount();

            // Update final amount when payment amount changes
            paymentAmount.addEventListener('input', function() {
                updateFinalAmount();
            });

            // Update final amount when option changes
            optionSelect.addEventListener('change', function () {
                updateFinalAmount();
            });

            // Form validation
            document.getElementById('paymentForm').addEventListener('submit', function(e) {
                const enteredAmount = parseFloat(paymentAmount.value);
                
                if (isNaN(enteredAmount)) {
                    alert('Please enter a valid payment amount');
                    e.preventDefault();
                    return;
                }
                
                // if (previousPending > 0 && enteredAmount < (previousPending * 0.1)) {
                //     alert(`You must first pay the 10% previous year due of ₹${(previousPending * 0.1).toFixed(2)}`);
                //     e.preventDefault();
                //     return;
                // }
                
                // if (previousPending === 0 && enteredAmount < minimumPayment) {
                //     alert(`Minimum payment must be at least 10% of current due (₹${minimumPayment.toFixed(2)})`);
                //     e.preventDefault();
                //     return;
                // }
                
                // if (enteredAmount > totalPending) {
                //     alert(`Payment amount cannot exceed total pending amount of ₹${totalPending.toFixed(2)}`);
                //     e.preventDefault();
                // }
            });

            function updateFinalAmount() {
                const paymentValue = parseFloat(paymentAmount.value) || 0;
                const optionValue = optionSelect.value;
                
                let discount = 0;
                let penalty = 0;
                let final = paymentValue;

                if (optionValue === 'discount') {
                    discount = paymentValue * 0.05;
                    final = paymentValue - discount;
                } else if (optionValue === 'penalty') {
                    penalty = paymentValue * 0.05;
                    final = paymentValue + penalty;
                }

                // Update values
                taxDiscount.value = discount.toFixed(2);
                taxPenalty.value = penalty.toFixed(2);
                finalAmount.value = '₹' + final.toFixed(2);
            }
        });
    </script>

@endsection
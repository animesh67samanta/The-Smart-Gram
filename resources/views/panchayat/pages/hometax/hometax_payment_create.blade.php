@extends('panchayat.layouts.main')
@section('title', 'Home Tax Payment Create')
@section('content')

    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3"> Home Tax</div>
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0 ">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"> Payment Create</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h2> Home Tax Payment</h2>

                            <form action="{{ route('panchayat.hometaxes.payment.store',$homeTax->id) }}" method="POST">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="given_tax_amount">year</label>
                                    <input type="text"  name=""
                                           value="{{ $homeTax->year?? '' }}"
                                           class="form-control" disabled>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="given_tax_amount">Pay Tax Amount</label>
                                    <input type="number" step="0.01" name="home_pay_tax_amount"
                                        value="{{ old('home_pay_tax_amount') }}{{ $homeTax->calculated_home_tax ?? '' }}" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="option">Select An Option</label>
                                    <select name="option" id="option-select" class="form-control">
                                        <option value="" disabled selected>Choose One</option>
                                        <option value="discount">Apply 5% Discount</option>
                                        <option value="penalty">Apply 5% Penalty</option>
                                    </select>
                                </div>
                                
                                {{-- Input field to appear dynamically --}}
                                <!-- <div id="discount-input" class="form-group  mb-3" style="display: none;">
                                    <label for="discount">Enter Discount Amount</label>
                                    <input type="number" step="0.01" name="tax_discount" class="form-control" placeholder="Enter discount">
                                </div>
                                
                                <div id="penalty-input" class="form-group mb-3" style="display: none;">
                                    <label for="penalty">Enter Penalty Amount</label>
                                    <input type="number" step="0.01" name="tax_penalty" class="form-control" placeholder="Enter penalty">
                                </div> -->


                                 <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn btn-success">
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
        const taxAmountField = document.querySelector('input[name="home_pay_tax_amount"]');
        
        const discountField = document.createElement('input');
        discountField.type = 'hidden';
        discountField.name = 'tax_discount';

        const penaltyField = document.createElement('input');
        penaltyField.type = 'hidden';
        penaltyField.name = 'tax_penalty';

        taxAmountField.parentNode.appendChild(discountField);
        taxAmountField.parentNode.appendChild(penaltyField);

        const baseTax = parseFloat("{{ $homeTax->calculated_home_tax ?? 0 }}");

        optionSelect.addEventListener('change', function () {
            const value = this.value;

            let discount = 0;
            let penalty = 0;

            if (value === 'discount') {
                discount = baseTax * 0.05;
                discountField.value = discount.toFixed(2);
                penaltyField.value = 0;
                taxAmountField.value = (baseTax - discount).toFixed(2);
            } else if (value === 'penalty') {
                penalty = baseTax * 0.05;
                penaltyField.value = penalty.toFixed(2);
                discountField.value = 0;
                taxAmountField.value = (baseTax + penalty).toFixed(2);
            } else {
                discountField.value = 0;
                penaltyField.value = 0;
                taxAmountField.value = baseTax.toFixed(2);
            }
        });
    });
</script>
@endsection


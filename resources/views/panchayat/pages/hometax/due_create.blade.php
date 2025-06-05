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
                        <ol class="breadcrumb mb-0 p-0">
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

                            <form action="{{ route('panchayat.hometaxes.due.store', $hometax->id) }}" method='Post'>
                                @csrf
                               
                                <div class="form-group">
                                    <label for="year">Name Of the Property Owner</label>
                                    <input type="text"  name="property_name" value="{{$hometax->property->owner_name_mr}}"
                                    class="form-control" disabled>
                                <div class="form-group">
                                    <label for="year">Payment Year</label>
                                    <input type="text"  name="year" value="{{$hometax->year}}"
                                    class="form-control" disabled>
                                
                                </div>

                                <div class="form-group mb-2">
                                    <label for="given_tax_amount">Home Tax Amount</label>
                                    <input type="number" step="0.01" name="home_pay_tax_amount" 
                                        value="{{ number_format(($hometax->calculated_home_tax - $hometax->home_pay_tax_amount) ?? old('home_pay_tax_amount'), 2, '.', '') }}"
                                        class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="option">Select An Option</label>
                                    <select name="option" id="option-select" class="form-control">
                                        <option value="" disabled selected>Choose One</option>
                                        <option value="discount">Apply 5% Discount</option>
                                        <option value="penalty">Apply 5% Penalty</option>
                                    </select>
                                </div>
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
        const taxAmountField = document.querySelector('input[name="home_pay_tax_amount"]');

        // Create hidden fields
        const discountField = document.createElement('input');
        discountField.type = 'hidden';
        discountField.name = 'tax_discount';

        const penaltyField = document.createElement('input');
        penaltyField.type = 'hidden';
        penaltyField.name = 'tax_penalty';

        taxAmountField.parentNode.appendChild(discountField);
        taxAmountField.parentNode.appendChild(penaltyField);

        // Base due tax (remaining amount)
        const baseDueTax = parseFloat("{{ $hometax->calculated_home_tax - $hometax->home_pay_tax_amount }}");

        optionSelect.addEventListener('change', function () {
            const value = this.value;

            let updatedAmount = baseDueTax;
            let discount = 0;
            let penalty = 0;

            if (value === 'discount') {
                discount = baseDueTax * 0.05;
                updatedAmount = baseDueTax - discount;
            } else if (value === 'penalty') {
                penalty = baseDueTax * 0.05;
                updatedAmount = baseDueTax + penalty;
            }

            // Update values in form fields
            discountField.value = discount.toFixed(2);
            penaltyField.value = penalty.toFixed(2);
            taxAmountField.value = updatedAmount.toFixed(2);
        });
    });
</script>

@endsection


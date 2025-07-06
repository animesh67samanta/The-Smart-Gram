<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax Payment Recipt</title>
    <link href="/admin/assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    *{
    margin:0;
    padding:0;
    box-sizing: border-box;
    }
    p,h1,h2,h3,h4,h5,h6,span,img,ul,li,a,body,nav,section,div{
        margin: 0;
        padding: 0;
    }

    .namuna_headings h5{
        font-size:18px;
        text-align:center;
        font-weight:800;
        margin-bottom:15px;
    }
    .namuna_headings h4{
        text-align:center;
        font-weight:800;
    }
    .gram_bio p{
        font-size:15px;
        color:#000;
        letter-spacing:.5px;
        /* text-align:center; */
        /* line-height:38px; */
    }
    .gram_bio p span{
        border-bottom:1px dotted;
    }
    #printButton {
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        @media print {
            body {
                margin: 0; /* Remove margins for print */
                padding: 0; /* Remove padding for print */
            }

            .container {
                max-height: none; /* Remove height limit */
                overflow: visible; /* Allow content to overflow if necessary */
            }

            table {
                width: 100%; /* Full width for printing */
                page-break-inside: avoid;
                
                font-size: 10px;
            }
           
            #printButton {
                display: none; /* Hide print button when printing */
            }

            /* Ensure that the rotated headers do not take too much space */
            th.rotate {
                height: 30px; /* Adjust height if necessary */
                font-size: 3px; /* Adjust font size if necessary */
            }
        }
</style>

<?php 
    $add = explode(',', Auth::guard('panchayat')->user()->address_mr);  

    $prevTotal = $previousYearTax['calculated_home_tax'] ?? 0 - ($previousYearTax['tax_discount'] ?? 0 + $previousYearTax['tax_penalty'] ?? 0); 
    $currTotal =  $tax['calculated_home_tax']- ($tax['tax_discount'] + $tax['tax_penalty']);
    // dd($currTotal);
    $finalTotal = ($prevTotal + $currTotal); 
    $finalDiscount = ($previousYearTax['tax_discount'] ?? 0 - $previousYearTax['tax_penalty'] ?? 0) + ($tax['tax_discount'] ?? 0 - $tax['tax_penalty'] ?? 0);
    $finalEtc = $tax['special_tax_rate'] ?? 0.00;
    $finalHomeTax = $previousYearTax['calculated_home_tax'] + $tax['total_home_tax'];
    $finalSubTotal = $previousYearTax['calculated_home_tax'] + $tax['calculated_home_tax'];
    $Taxdue = $previousYearTax['home_due_tax_amount'] + $tax['home_due_tax_amount'];
    $totalPay = $previousYearTax['home_pay_tax_amount'] + $tax['home_pay_tax_amount'];
    $taxDuxTotal = $finalSubTotal - $totalPay;
    // dd($taxDuxTotal);

?>
<body>
 
    <section>
        <div class="container">
            <div class="row mx-auto  pt-3 pb-1">
                <div class="namuna_headings">
                    <h5>Namuna Number 10</h5>
                    <h5>Receipt Regarding taxes & fees</h5>
                    <p class="text-center">ग्रामपंचायत : {{ Auth::guard('panchayat')->user()->name_mr }}, <span>{{ $add[0]}}, {{ $add[1]}}</span></p>
                </div>
            </div>

            <div class="col-12">
                <div class="gram_bio">
                    
                    <p style="text-align:right">
                        Receipt No. : <span>{{$tax['recipt_id']}}</span> 
                    </p>
                         <p class="mt-4" style="text-align:justify">Received from mrs/miss/mr. <span>{{$tax['owner_name_mr']}}</span> Property Number <span>{{$tax['property_no']}}</span> Year <span>{{$tax['year']}}</span> The following amounts were received as tax for.
                    </p>
                </div>
            </div>
           
            <div class="col-12 mt-2">
                {{-- <div class="table-responsive"> --}}
                <table class="table table-bordered text-center table-hover">
                    <thead class="table-light">
                        <tr>
                            <th rowspan="2" class="text-center">Tax Name</th>
                            <th colspan="3">Amount Recovered</th>
                        
                        </tr>
                        <tr>
                            <th>Previous Balance</th>
                            <th>Current Tax</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>Home Tax</td>
                        <td>₹{{ $previousYearTax['calculated_home_tax'] ?? 0.00 }}</td>
                        <td>₹{{ number_format($tax['total_home_tax'] ?? 0.00, 2) }}</td>
                        <td>₹{{ number_format($finalHomeTax ?? 0.00, 2) }}</td>
                        </tr>
                        <tr>
                        <td>Light Tax</td>
                        <td></td>
                        <td>₹{{$tax['lamp_tax_rate'] ?? 0.00}}</td>
                        <td>₹{{$tax['lamp_tax_rate'] ?? 0.00}}</td>
                        </tr>
                        <tr>
                        <td>Health Tax</td>
                        <td></td>
                        <td>₹{{$tax['health_tax_rate'] ?? 0.00}}</td>
                        <td>₹{{$tax['health_tax_rate'] ?? 0.00}}</td>
                        </tr>
                        <tr>
                        <td>Water Tax</td>
                        <td></td>
                        <td>₹{{$tax['water_tax_rate'] ?? 0.00}}</td>
                        <td>₹{{$tax['water_tax_rate'] ?? 0.00}}</td>
                        </tr>
                        <tr>
                        <td>Notice Fee</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        </tr>
                        <tr>
                        <td>Warrant Fee</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        </tr>
                        <tr>
                        <td>ETC</td>
                        <td></td>
                        <td>₹{{$tax['special_tax_rate'] ?? 0.00}}</td>
                        <td>₹{{ $finalEtc }}</td>
                        </tr>
                        <tr>
                        <th>Total</th>
                        <td>₹<b>{{ $previousYearTax['calculated_home_tax'] ?? 0.00 }}</b></td>
                        <td>₹<b> {{ $tax['calculated_home_tax'] ?? 0.00 }} </b></td>
                        <td>₹<b>{{ number_format($finalSubTotal, 2) }}</b></td>
                        </tr>
                        <tr>
                        <td>-5% Discount +5% Fine</td>
                        <td></td>
                        <td>
                            @if(!empty($tax['tax_penalty']))    
                                ₹{{$tax['tax_penalty'] ?? 0.00}}
                            @elseif(!empty($tax['tax_discount']))
                                ₹{{$tax['tax_discount'] ?? 0.00}}

                            @endif
                    
                        </td>
                        <td>{{ number_format($finalDiscount, 2) }}</td>
                        </tr>
                        <tr>
                        <th>Total</th>
                        <td>₹<b>{{ number_format($prevTotal, 2) }}</b></td>
                        <td>₹<b> {{ number_format($currTotal, 2) }} </b></td>
                       
                        <td> ₹<b>{{ number_format($finalTotal, 2) }}</b></td>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <p>
                        Amount inword : <span style="border-bottom:1px dotted"><b>{{ $recInWord  }}</b></span> Received.
                    </p>
                    <p>Amount: ₹{{$recivedAmount->amount }}</p>
                    @if (!empty($previousYearTax) && ($previousYearTax['calculated_home_tax'] > $previousYearTax['home_pay_tax_amount']))
                        @php $totalTaxDue = $previousYearTax['calculated_home_tax'] +  $tax['home_due_tax_amount']; @endphp
                        <p><b>Due : ₹{{ number_format($taxDuxTotal, 2) ?? 0.00 }}</b></p>
                        
                    @elseif ($tax['calculated_home_tax'] > $tax['home_pay_tax_amount'] )
                           
                        <p><b>Due : ₹{{ number_format($taxDuxTotal, 2)?? 0.00 }}</b></p>
                        
                    @endif
                </div>
                
                <div class="d-flex justify-content-between" style="margin-top: 100px;">
                    <p>Date <span style="border-bottom:1px dotted;"> {{ date('d-m-Y H:i:s') }} </span></p>
                    <div class="mt-4">
                        <img src="" alt="">
                        <p style="border-top:1px dotted;display:inline-block">Sinature and Name of the Collector</p>
                    </div>
                </div>
                </div>
            {{-- </div> --}}
        </div>
        <button id="printButton" onclick="window.print()">Print</button>
    </section>
</body>
</html>
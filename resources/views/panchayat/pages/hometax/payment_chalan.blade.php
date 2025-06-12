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
        font-size:18px;
        color:#000;
        letter-spacing:.5px;
        text-align:center;
        line-height:38px;
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
                page-break-inside: avoid; /* Prevent table from breaking inside pages */
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


<body>
 
    <section>
        <div class="container">
            <div class="col-sm-6 mx-auto  pt-3 pb-1">
                <div class="namuna_headings">
                    <h5>Namuna Number 10</h5>
                    <h4>Receipt Regarding taxes & fees</h4>
                </div>
            </div>
            <div class="col-12">
                <div class="gram_bio mt-4">
                    <p class="mb-4">Grampanchayat <span>{{$taxData['panchayat_address_mr']}}</span></p>
                    <p style="text-align:right">
                        Receipt Number by : <span>{{$taxData['recipt_id']}}</span> 
                    </p>
                         <p style="text-align:justify">Received from mrs/miss/mr. <span>{{$taxData['owner_name_mr']}}</span> Property Number <span>{{$taxData['property_no']}}</span> Year <span>{{$taxData['year']}}</span> The following amounts were received as tax for.
                    </p>
                </div>
            </div>
           
            <div class="col-12 mt-4">
                <div class="table-responsive">
                    <table class="table table-bordered text-center table-hover">
                        <thead class="table-light">
                            <tr>
                                <th rowspan="2">Tax Name</th>
                                <th colspan="3">Amount Recovered</th>
                            </tr>
                            <tr>
                                <th>Previous Balance</th>
                                <th>Current Tax</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                // Calculate totals
                                $previousHomeTax = floatval(str_replace([',', '₹'], '', $taxData['previous_calculated_home_tax'] ?? '0')) ?? 0;
                                $currentHomeTax = floatval(str_replace([',', '₹'], '', $taxData['total_home_tax'] ?? '0')) ?? 0;
                                $totalHomeTax = $previousHomeTax + $currentHomeTax;
                                
                                $lampTax = floatval(str_replace([',', '₹'], '', $taxData['lamp_tax_rate'] ?? '0')) ?? 0;
                                $healthTax = floatval(str_replace([',', '₹'], '', $taxData['health_tax_rate'] ?? '0')) ?? 0;
                                $waterTax = floatval(str_replace([',', '₹'], '', $taxData['water_tax_rate'] ?? '0')) ?? 0;
                                $specialTax = floatval(str_replace([',', '₹'], '', $taxData['special_tax_rate'] ?? '0')) ?? 0;
                                
                                $currentTotalTax = floatval(str_replace([',', '₹'], '', $taxData['calculated_home_tax'] ?? '0')) ?? 0;
                                $adjustment = !empty($taxData['tax_penalty']) 
                                    ? floatval(str_replace([',', '₹'], '', $taxData['tax_penalty'] ?? '0')) 
                                    : -floatval(str_replace([',', '₹'], '', $taxData['tax_discount'] ?? '0'));
                                
                                $finalAmount = floatval(str_replace([',', '₹'], '', $taxData['home_pay_tax_amount'] ?? '0')) ?? 0;
                            @endphp

                            <tr>
                                <td>Home Tax</td>
                                <td>₹{{ $taxData['previous_calculated_home_tax'] ?? '0.00' }}</td>
                                <td>₹{{ $taxData['total_home_tax'] ?? '0.00' }}</td>
                                <td>₹{{ number_format($totalHomeTax, 2) }}</td>
                            </tr>
                            <tr>
                                <td>Light Tax</td>
                                <td>-</td>
                                <td>₹{{ $taxData['lamp_tax_rate'] ?? '0.00' }}</td>
                                <td>₹{{ $taxData['lamp_tax_rate'] ?? '0.00' }}</td>
                            </tr>
                            <tr>
                                <td>Health Tax</td>
                                <td>-</td>
                                <td>₹{{ $taxData['health_tax_rate'] ?? '0.00' }}</td>
                                <td>₹{{ $taxData['health_tax_rate'] ?? '0.00' }}</td>
                            </tr>
                            <tr>
                                <td>Water Tax</td>
                                <td>-</td>
                                <td>₹{{ $taxData['water_tax_rate'] ?? '0.00' }}</td>
                                <td>₹{{ $taxData['water_tax_rate'] ?? '0.00' }}</td>
                            </tr>
                            <tr>
                                <td>Notice Fee</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>Warrant Fee</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>ETC</td>
                                <td>-</td>
                                <td>₹{{ $taxData['special_tax_rate'] ?? '0.00' }}</td>
                                <td>₹{{ $taxData['special_tax_rate'] ?? '0.00' }}</td>
                            </tr>
                            <tr>
                                <th>Subtotal</th>
                                <td>₹{{ number_format($previousHomeTax, 2) }}</td>
                                <td><b>₹{{ number_format($currentTotalTax, 2) }}</b></td>
                                <td><b>₹{{ number_format($totalHomeTax + $lampTax + $healthTax + $waterTax + $specialTax, 2) }}</b></td>
                            </tr>
                            <tr>
                                <td>-5% Discount / +5% Fine</td>
                                <td>-</td>
                                <td>
                                    @if(!empty($taxData['tax_penalty']))    
                                        +₹{{ $taxData['tax_penalty'] ?? '0.00' }}
                                    @else
                                        -₹{{ $taxData['tax_discount'] ?? '0.00' }}
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($taxData['tax_penalty']))    
                                        +₹{{ $taxData['tax_penalty'] ?? '0.00' }}
                                    @else
                                        -₹{{ $taxData['tax_discount'] ?? '0.00' }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Total Payable</th>
                                <td>-</td>
                                <td><b>₹{{ $taxData['home_pay_tax_amount'] ?? '0.00' }}</b></td>
                                <td><b>₹{{ $taxData['home_pay_tax_amount'] ?? '0.00' }}</b></td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <p>
                        Amount in words: <span style="border-bottom:1px dotted"><b>{{ $taxData['home_pay_tax_amount_in_word'] }}</b> rupees only</span> Received.
                    </p>
                    
                    <div class="mt-4 d-flex justify-content-between">
                        <p>Date: <span style="border-bottom:1px dotted;">{{ $taxData['created_at'] }}</span></p>
                        <div class="mt-4">
                            <img src="" alt="">
                            <p style="border-top:1px dotted;display:inline-block">Signature and Name of the Collector</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button id="printButton" onclick="window.print()">Print</button>
    </section>
</body>
</html>
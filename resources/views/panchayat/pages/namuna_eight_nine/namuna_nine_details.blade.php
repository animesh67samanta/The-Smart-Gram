
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Demand Register 2025–2026</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
 {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/fontawesome.min.css" /> --}}
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"  />

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .container {
            max-width: 100%; /* Ensure the container takes the full width */
            overflow: auto;  /* Allow scrolling if content overflows */
        }

        table {
            width: 100%; /* Set table width to 100% for printing */
            border-collapse: collapse;
        }

        td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
            vertical-align: middle;
            font-size: 10px;
        }

        th {
            font-size: 12px;
            border: 1px solid black;
            text-align: center;
            vertical-align: middle;
        }

        .rotate {
            transform: rotate(-90deg);
            transform-origin: center;
            white-space: nowrap;
            padding-top: 5px;
            padding-bottom: 5px;
            height: 100px; /* Set height based on your needs */
            text-align: center;
            vertical-align: middle;
        }


        /* Styling for the print button */
       #printButton {
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            
        }

        /* Print styles */
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
</head>
<body>
       
     <div class="container-fluid">
        <div class="row">
            <h5 class="text-center">{{ Auth::guard('admin')->user()->name_mr }}, {{ Auth::guard('admin')->user()->address_mr }}</h5>
            <h5 class="text-center">नमुना नं. ९ मागणी रजिस्टर २०२५ - २०२६ </h5> 
        </div>

        <table>
            {{-- <thead>
                <tr style="height: 40px;">
                    <th rowspan="3" class="rotate" style="font-size: 10px;">मिळकत नं.</th>
                    <th rowspan="3"  style="font-weight: 800; padding: 10px;">मिळकत धारकाचे नाव</th>
                    <th colspan="15" style="font-weight: 800;">मागणी / Demand</th>
                   
                    <th colspan="16" style="font-weight: 800;">वसूली / Recovery</th>
                    <th rowspan="3" class="rotate" style="font-weight: 800; font-size: 12px;">अजून येणे बाकी आहे </th>
                </tr>
                <tr>
                    <th colspan="3" style="font-weight: 800;"> घरपट्टी कर </th>
                    <th colspan="3" style="font-weight: 800;">आरोग्य कर </th>
                    <th colspan="3" style="font-weight: 800;">दिवाबत्ती कर </th>
                    <th colspan="1" style="font-weight: 800;">विशेष कर </th>
                    <th colspan="3" style="font-weight: 800;">5% दंड / सवलत</th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px;">30 सप्टेंबर पूर्वी </th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px;">30 सप्टेंबर नंतर </th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px;">पावती क्र.<br>Reciept no.</th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px;">पावती तारीख <br> Reciept date</th>
                    <th colspan="3" style="font-weight: 800;"> घरपट्टी कर </th>
                    <th colspan="3" style="font-weight: 800;">आरोग्य कर </th>
                    <th colspan="3" style="font-weight: 800;">दिवाबत्ती कर </th>
                    <th colspan="1" style="font-weight: 800;">विशेष कर </th>
                    
                    <th colspan="3" style="font-weight: 800;">5% दंड / सवलत </th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px;">एकूण</th>
                </tr>
              
                <tr style="height: 160px;">
                    <th class="rotate" style="font-size: 12px; font-weight: normal;">मागील </th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal;">चालू </th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal;">एकूण </th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal;">मागील </th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal;">चालू </th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal;">एकूण </th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal;">मागील </th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal;">चालू </th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal;">एकूण </th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal;">@if($responseData['description'] != 'Open plot'){{ $responseData['special_tax_mr'] }}@endif</th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal;">मागील </th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal;">चालू </th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal;">एकूण </th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal;">मागील</th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal;">चालू</th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal;">एकूण</th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal;">मागील</th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal;">चालू</th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal;">एकूण</th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal;">मागील</th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal;">चालू</th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal;">एकूण</th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal;">@if($responseData['description'] != 'Open plot'){{ $responseData['special_tax_mr'] }}@endif</th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal;">मागील</th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal;">चालू</th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal;">एकूण</th>
                </tr>
            </thead> --}}
            <thead>
                <tr style="height: 30px;">
                    <th rowspan="3" class="rotate" style="font-size: 10px;">मिळकत नं.</th>
                    <th rowspan="3" style="font-weight: 800; padding: 40px;">मिळकत धारकाचे नाव </th>
                    <th colspan="15" style="font-weight: 800;">मागणी </th>
                    <th colspan="16" style="font-weight: 800;">वसूली </th>
                    <th rowspan="3" class="rotate" style="font-weight: 800; font-size: 12px;">अजून येणे <br>बाकी आहे </th>
                </tr>
                <tr style="height: 30px;">
                    <th colspan="3" style="font-weight: 800;">घरपट्टी कर </th>
                    <th colspan="3" style="font-weight: 800;">आरोग्य कर </th>
                    <th colspan="3" style="font-weight: 800;">दिवाबत्ती कर </th>
                    <th colspan="1" style="font-weight: 800; padding: 5px;">विशेष कर </th>
                    <th colspan="3" style="font-weight: 800;">५% दंड / सवलत</th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px; padding: 0px 5px;">३० सप्टेंबर<br> पूर्वी </th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px; padding: 0px 5px;">३० सप्टेंबर<br> नंतर </th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px; padding: 0px 10px;">पावती <br>क्र.</th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px; padding: 0px 10px;">पावती <br>तारीख </th>
                    <th colspan="3" style="font-weight: 800;">घरपट्टी कर </th>
                    <th colspan="3" style="font-weight: 800;">आरोग्य कर </th>
                    <th colspan="3" style="font-weight: 800;">दिवाबत्ती कर </th>
                    <th colspan="1" style="font-weight: 800; padding: 0px 5px;">विशेष कर </th>
                    <th colspan="3" style="font-weight: 800;">५% दंड / सवलत </th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px; padding: 0px 5px;">एकूण</th>
                </tr>
                <tr style="height: 80px;">
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">मागील </th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">चालू </th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">एकूण </th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">मागील </th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">चालू </th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">एकूण </th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">मागील </th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">चालू </th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">एकूण </th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">@if($responseData['description'] != 'Open plot'){{ $responseData['special_tax_mr'] }}@endif</th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">मागील </th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">चालू </th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">एकूण </th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">मागील</th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">चालू</th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">एकूण</th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">मागील</th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">चालू</th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">एकूण</th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">मागील</th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">चालू</th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">एकूण</th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;"> @if($responseData['description'] != 'Open plot'){{ $responseData['special_tax_mr'] }}@endif</th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">मागील</th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">चालू</th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">एकूण</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    $totalHomeTax = $responseData['previous_home_tax_amount'] + $responseData['home_tax'];
                    $totalHealthTax = $responseData['previous_health_tax_amount'] + $responseData['health_tax_rate'];
                    $totalLampTax = $responseData['previous_lamp_tax_amount'] + $responseData['lamp_tax_rate'];
                    
                    $totalTax = $totalHomeTax + $totalHealthTax + $totalLampTax + $responseData['special_tax_rate'] + $responseData['water_tax_rate'];

                    $allTaxes = $responseData['home_tax'] + $responseData['health_tax_rate'] + $responseData['lamp_tax_rate'] + $responseData['special_tax_rate'] + $responseData['water_tax_rate'] + $responseData['tax_penalty'] - $responseData['tax_discount'];
                    // $totalPlus5 = $totalTax + ($totalTax * 0.05);   // +5%
                    // $totalMinus5 = $totalTax - ($totalTax * 0.05);  // -5%
                ?>

                <tr style="height: 200px;">
                    <td class="rotate" style="font-size: 12px; font-weight: normal;">{{ $responseData['property_no'] }}</td>
                    <td style="font-weight: normal; font-size: 12px;">{{ $responseData['owner_name_mr'] }}</td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;">₹{{ number_format($responseData['previous_home_tax_amount'], 2) }}</td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;">₹{{ number_format($responseData['home_tax'] + $responseData['water_tax_rate'], 2) }}</td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;">₹{{ number_format($totalHomeTax, 2) }}</td>

                    <td class="rotate" style="font-size: 12px; font-weight: normal;">₹{{ number_format($responseData['previous_health_tax_amount'], 2) }}</td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;">₹{{ number_format($responseData['health_tax_rate'], 2) }}</td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;">₹{{ number_format($totalHealthTax, 2) }}</td>

                    <td class="rotate" style="font-size: 12px; font-weight: normal;">₹{{ number_format($responseData['previous_lamp_tax_amount'], 2) }}</td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;">₹{{ number_format($responseData['lamp_tax_rate'], 2) }}</td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;">₹{{ number_format($totalLampTax, 2) }}</td>

                    <td class="rotate" style="font-size: 12px; font-weight: normal;">@if($responseData['description'] != 'Open plot')₹{{ number_format($responseData['special_tax_rate'], 2) }}@endif</td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;">₹{{ number_format($responseData['tax_penalty'], 2) }}</td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;">₹{{ number_format($responseData['tax_discount'], 2) }}</td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;">₹{{ number_format($allTaxes, 2) }}</td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;">₹{{ number_format($totalTax, 2) }}</td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;">₹{{ number_format($totalTax, 2) }}</td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;"> </td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;"> </td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;"> </td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;"> </td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;"> </td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;"> </td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;"> </td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;"> </td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;"> </td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;"> </td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;"> </td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;">@if($responseData['description'] != 'Open plot')  @endif</td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;"> </td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;"> </td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;"> </td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;"> </td>
                    <td class="rotate" style="font-size: 12px; font-weight: 800;">{{ number_format($totalTax, 2) }}</td>

                </tr>

               
            </tbody>
        </table>
        <button id="printButton" onclick="window.print()"><i class="fa-solid fa-print" style="font-size: 20px"></i> Print</button>

    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demand Register Bulk 2025–2026</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/fontawesome.min.css" />
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
            max-width: 100%;
            overflow: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
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
            height: 100px;
            text-align: center;
            vertical-align: middle;
        }

        .page-break {
            page-break-after: always;
        }

        #printButton {
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            position: fixed;
            bottom: 20%;
        }

        .print-header {
            display: none;
        }

        /* Footer with signature and page number */
        .print-footer {
            display: none;
            text-align: center;
            padding: 10px;
            font-size: 12px;
            /* border-top: 1px solid #000; */
            margin-top: 10px;
        }

        .signature-line {
            margin-top: 0px;
            text-align: left;
            font-size: 12px;
            padding-right: 50px;
            font-weight: normal;
        }


        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            .container {
                max-height: none;
                overflow: visible;
            }

            table {
                width: 100%;
                page-break-inside: avoid;
            }

            #printButton {
                display: none;
            }

            /* th.rotate {
                height: 30px;
                font-size: 3px;
            } */

            .print-header {
                display: block;
                text-align: center;
                margin-bottom: 15px;
                page-break-after: avoid;
            }

            /* Show footer on each printed page */
            .print-footer {
                display: block;
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                width: 100%;
            }


            /* Add page breaks */
            tbody {
                page-break-inside: avoid;
            }

            /* Reset padding for printed pages */
            @page {
                size: legal landscape;
                margin-top: 10mm;
                counter-increment: page;
                @bottom-right {
                    content: "पान नंबर : " counter(page);
                    font-size: 10px;
                }
            }

            /* Page counter */
            /* .page-number:after {
                content: counter(page);
            } */
            .container-fluid {
                counter-increment: page;
            }

        }
    </style>
</head>
 <?php
        $add = explode(',', Auth::guard('admin')->user()->address_mr); 
    ?>
<body>
    <div class="container-fluid">
        <div class="row">
            {{-- <h5 class="text-center">{{ Auth::guard('admin')->user()->name_mr }}, {{ Auth::guard('admin')->user()->address_mr }}</h5> --}}
            <h5 class="text-center">नमुना नं. ९ मागणी रजिस्टर २०२५ - २०२६ </h5> 
        </div>
         <div class="row mt-3 mb-2">  
            <div class="col-4" style="text-align: left;">ग्रामपंचायत : {{ Auth::guard('admin')->user()->name_mr }}</div>
            <div class="col-4" style="text-align: center;">तालुका : {{ $add[0]}}</div>
            <div class="col-4" style="text-align: right;">जिल्हा : {{ $add[1] }}</div>
        </div>

        <table>
            <thead>
                <tr style="height: 30px;">
                    <th rowspan="3" class="rotate" style="font-size: 10px;">मिळकत नं.</th>
                    <th rowspan="3" style="font-weight: 800; padding: 0px 40px;">मिळकत धारकाचे नाव </th>
                    {{-- <th colspan="15" style="font-weight: 800;">मागणी / Demand</th> --}}
                    {{-- <th colspan="16" style="font-weight: 800;">वसूली / Recovery</th> --}}
                    <th colspan="15" style="font-weight: 800;">मागणी </th>
                    <th colspan="16" style="font-weight: 800;">वसूली </th>
                    <th rowspan="3" class="rotate" style="font-weight: 800; font-size: 12px;">अजून येणे<br> बाकी आहे </th>
                </tr>
                <tr style="height: 50px;">
                    <th colspan="3" style="font-weight: 800;">घरपट्टी कर </th>
                    <th colspan="3" style="font-weight: 800;">आरोग्य कर </th>
                    <th colspan="3" style="font-weight: 800;">दिवाबत्ती कर </th>
                    <th colspan="1" style="font-weight: 800; padding: 5px;">विशेष कर </th>
                    <th colspan="3" style="font-weight: 800;">५% दंड / सवलत</th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px; padding: 0px 5px;">३० सप्टेंबर<br>  पूर्वी </th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px; padding: 0px 5px;">३० सप्टेंबर<br>  नंतर </th>
                    {{-- <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px;">पावती क्र.<br>Reciept no.</th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px;">पावती तारीख <br> Reciept date</th> --}}

                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px; padding: 0px 10px;">पावती<br> क्र.</th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px; padding: 0px 10px;">पावती<br> तारीख </th>
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
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">{{ $specialTax ?? '' }}</th>
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
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;"> {{ $specialTax ?? ''}}</th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">मागील</th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">चालू</th>
                    <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">एकूण</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allResponsiveData as $index => $responseData)
                <?php
                    $totalHomeTax = $responseData['previous_home_tax_amount'] + $responseData['home_tax'];
                    $totalHealthTax = ($responseData['previous_health_tax_amount'] ?? 0) + ($responseData['health_tax_rate'] ?? 0);
                    $totalLampTax = ($responseData['previous_lamp_tax_amount'] ?? 0) + ($responseData['lamp_tax_rate'] ?? 0);
                    
                    $totalTax = $totalHomeTax + $totalHealthTax + $totalLampTax + 
                                ($responseData['special_tax_rate'] ?? 0) + 
                                ($responseData['water_tax_rate'] ?? 0);

                    $allTaxes = $responseData['home_tax'] + 
                            ($responseData['health_tax_rate'] ?? 0) + 
                            ($responseData['lamp_tax_rate'] ?? 0) + 
                            ($responseData['special_tax_rate'] ?? 0) + 
                            ($responseData['water_tax_rate'] ?? 0) + 
                            ($responseData['tax_penalty'] ?? 0) - 
                            ($responseData['tax_discount'] ?? 0);
                ?>
                <tr style="height: 135px;">
                    <td class="rotate" style="font-size: 12px; font-weight: normal;">{{ $responseData['property_no'] }}</td>
                    <td style="font-weight: normal; font-size: 12px;">{{ $responseData['owner_name_mr'] }}</td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;">{{ number_format($responseData['previous_home_tax_amount'], 2) }}</td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;">{{ number_format($responseData['home_tax'] + ($responseData['water_tax_rate'] ?? 0), 2) }}</td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;">{{ number_format($totalHomeTax, 2) }}</td>

                    <td class="rotate" style="font-size: 12px; font-weight: normal;">{{ number_format($responseData['previous_health_tax_amount'] ?? 0, 2) }}</td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;">{{ number_format($responseData['health_tax_rate'] ?? 0, 2) }}</td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;">{{ number_format($totalHealthTax, 2) }}</td>

                    <td class="rotate" style="font-size: 12px; font-weight: normal;">{{ number_format($responseData['previous_lamp_tax_amount'] ?? 0, 2) }}</td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;">{{ number_format($responseData['lamp_tax_rate'] ?? 0, 2) }}</td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;">{{ number_format($totalLampTax, 2) }}</td>

                    <td class="rotate" style="font-size: 12px; font-weight: normal;">@if($responseData['description'] != 'Open plot'){{ number_format($responseData['special_tax_rate'] ?? 0, 2) }}@endif</td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;">{{ number_format($responseData['tax_penalty'] ?? 0, 2) }}</td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;">{{ number_format($responseData['tax_discount'] ?? 0, 2) }}</td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;">{{ number_format($allTaxes, 2) }}</td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;">{{ number_format($totalTax, 2) }}</td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;">{{ number_format($totalTax, 2) }}</td>
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
                    <td class="rotate" style="font-size: 12px; font-weight: normal;"> </td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;"> </td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;"> </td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;"> </td>
                    <td class="rotate" style="font-size: 12px; font-weight: normal;"> </td>
                    <td class="rotate" style="font-size: 12px; font-weight: 800;">{{ number_format($totalTax, 2) }}</td>
                
                @if(($index + 1) % 5 === 0 && !$loop->last)
              
                    </tbody>
                    </table>
                    
                   
                    
                    <!-- Page break -->
                    <div style="page-break-after: always;"></div>
                    <!-- Start new table on next page with header -->
                    <div class="print-header">
                        {{-- <h4>{{ Auth::guard('admin')->user()->name_mr }}, {{ Auth::guard('admin')->user()->address_mr }}</h4> --}}
                        {{-- <h3>ग्रामपंचायत: </h3>   --}}
                        <h5>नमुना नं. ९ मागणी रजिस्टर २०२५ - २०२६ </h5> 

                        {{-- <div style="display: flex; justify-content: space-between; margin-top: 10px; font-weight: bold; font-family: 'Mangal', 'Noto Sans Devanagari', sans-serif;">
                            <div> </div>
                            <div>पान नंबर : <span class="page-number"></span></div>
                        </div> --}}
                    </div>
                     <div class="row mt-3 mb-2">  
                        <div class="col-4" style="text-align: left;">ग्रामपंचायत : {{ Auth::guard('admin')->user()->name_mr }}</div>
                        <div class="col-4" style="text-align: center;">तालुका : {{ $add[0]}}</div>
                        <div class="col-4" style="text-align: right;">जिल्हा : {{ $add[1] }}</div>
                    </div>
                    <table>
                        <thead>
                            <!-- Repeat table header -->
                            <tr style="height: 30px;">
                                <th rowspan="3" class="rotate" style="font-size: 10px;">मिळकत नं.</th>
                                <th rowspan="3" style="font-weight: 800; padding: 0px 40px;">मिळकत धारकाचे नाव </th>
                                 {{-- <th colspan="15" style="font-weight: 800;">मागणी / Demand</th> --}}
                                {{-- <th colspan="16" style="font-weight: 800;">वसूली / Recovery</th> --}}
                                <th colspan="15" style="font-weight: 800;">मागणी </th>
                                <th colspan="16" style="font-weight: 800;">वसूली </th>
                                <th rowspan="3" class="rotate" style="font-weight: 800; font-size: 12px;">अजून येणे बाकी आहे </th>
                            </tr>
                            <tr style="height: 50px;">
                                <th colspan="3" style="font-weight: 800;">घरपट्टी कर </th>
                                <th colspan="3" style="font-weight: 800;">आरोग्य कर </th>
                                <th colspan="3" style="font-weight: 800;">दिवाबत्ती कर </th>
                                <th colspan="1" style="font-weight: 800; padding: 5px;">विशेष कर </th>
                                <th colspan="3" style="font-weight: 800;">५% दंड / सवलत</th>
                                <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px; padding: 0px 5px;">३० सप्टेंबर पूर्वी </th>
                                <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px; padding: 0px 5px;">३० सप्टेंबर नंतर </th>
                                <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px; padding: 0px 5px;">पावती क्र.</th>
                                <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px; padding: 0px 5px;">पावती तारीख</th>
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
                                <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">{{ $specialTax ?? '' }}</th>
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
                                <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;"> {{ $specialTax ?? ''}}</th>
                                <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">मागील</th>
                                <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">चालू</th>
                                <th class="rotate" style="font-size: 12px; font-weight: normal; padding: 0px 5px;">एकूण</th>
                            </tr>
                        </thead>
                        <tbody>
                    @endif
                @endforeach
            </tbody>
        </table>

        <!-- Footer for each page -->
       <div class="print-footer">
                    <div class="signature-line" style="font-weight: normal;">
                        शेरे व दुरुस्ती यांजवर खरेपणाबद्दल सरपंचाने सही केली पाहिजे
                    </div>
                    
                </div>

        <button id="printButton" onclick="window.print()"><i class="fa-solid fa-print" style="font-size: 20px"></i> Print</button>
    </div>

    <script>
        // Add page numbers when printing
        document.addEventListener('DOMContentLoaded', function() {
           
            
        });
    </script>
</body>
</html>
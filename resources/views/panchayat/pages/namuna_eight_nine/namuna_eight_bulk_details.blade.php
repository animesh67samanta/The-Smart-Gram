<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Namuna No. 8 Form</title>
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
            /* margin-top: 30px; */
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
        .print-header {
            display: none;
             font-family: 'Mangal', 'Noto Sans Devanagari', sans-serif;
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
        .row {
            text-align: center;
        }

        /* Print styles */
        @media print {
            body {
                margin: 0;
                padding: 0;
            }
            .container-fluid {
                counter-increment: page;
            }
            .container {
                max-height: none;
                overflow: visible;
            }

            table {
                width: 100%;
                page-break-inside: avoid;
                border: 1px solid black !important;
                margin-top: 0px;
            }

            #printButton {
                display: none;
            }

            /* th.rotate {
                height: 30px;
                font-size: 10px;
                padding: 20px 0;
            } */
            
           
            /* Header that repeats on each printed page */
            .print-header {
                display: block;
                text-align: center;
                margin-bottom: 15px;
                page-break-after: avoid;
                font-family: 'Mangal', 'Noto Sans Devanagari', sans-serif;
            }
           
            /* Footer with signature and page number */
            .print-footer {
                display: block;
                position: fixed;
                bottom: 0;
                width: 100%;
                text-align: center;
                font-size: 10px;
            }
            
            body {
                counter-reset: page;
            }
            tbody {
                page-break-inside: avoid;
                
            }
            td {
                /* border: 1px solid black !important; */
                border-bottom: none !important;
                border-top: none !important;

            }
            @page {
                size: legal landscape;
                margin-top: 10mm;
                counter-increment: page;
                @bottom-right {
                    content: "पान नंबर : " counter(page);
                    font-size: 10px;
                }
                
            }
        }
        
        /* Screen-only elements */
        .screen-header {
            display: block;
        }
        
       
        
        .print-footer {
            display: none;
        }
    </style>
</head>
<body>
    <?php 
        $add = explode(',', Auth::guard('admin')->user()->address_mr);  
    ?>
    <div class="container-fluid">
        <!-- Screen header (only shows on screen) -->
        <div class="row">
            <h4>नमुना ८ नियम ३२(१)</h4>
            <h4>सन. {{ $taxYear['start_year_before'] }}-{{ $taxYear['end_year_before']}} ते {{ $taxYear['start_year_after'] }}-{{ $taxYear['end_year_after'] }} साठी कर आकारणी नोंदवही</h4>
            
        </div>
        <div class="row mt-3 mb-2">  
            <div class="col-4" style="text-align: left;">ग्रामपंचायत : {{ Auth::guard('admin')->user()->name_mr }}</div>
            <div class="col-4">तालुका : {{ $add[0]}}</div>
            <div class="col-4" style="text-align: right;">जिल्हा : {{ $add[1] }}</div>
        </div>
        

        <table>
            <thead>
                
                <tr>
                    <th rowspan="4" style="font-size: 12px;">अ. क्र.</th>
                    <th rowspan="4" style="font-size: 12px; padding: 0px 10px;">रस्त्याचे नाव / गल्लीचे नाव</th>
                    <th rowspan="4" class="rotate" style="font-size: 12px; font-weight: 900;">सी. टि. सर्वे नं. / भूमापन क्र. / गट क्र.</th>
                    <th rowspan="4" class="rotate" style="font-size: 12px; font-weight: 900;">मालमत्ता क्र.</th>
                </tr>
                <tr style="height: 90px;">
                    <th rowspan="3" style="font-weight: 900; font-size: 12px; padding: 10px;">मालमत्ता धारकाचे नाव</th>
                    <th rowspan="3" style="font-weight: 900; font-size: 12px; padding: 10px;">भोगवटा धारकाचे नाव</th>
                    <th rowspan="3" style="font-weight: 900; font-size: 12px; padding: 10px;">मालमत्तेचे वर्णन</th>
                    <th rowspan="3" class="rotate" style="font-size: 12px; font-weight: 900;">मिळकत बांधकामाचे वर्</th>
                    <th rowspan="3" class="rotate" style="font-size: 12px; font-weight: 900;">क्षेत्रफळ चौ. फु.</th>
                    <th rowspan="3" class="rotate" style="font-size: 12px; font-weight: 900;">क्षेत्रफळ चौ. मी.</th>
                    <th colspan="3" style="font-weight: 900; font-size: 12px;">रेडीरेकनर दर प्रति चौ. मी.</th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px !important;">घसारा दर</th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px !important;">इ. वापरा नुसार भारांक</th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px !important;">भांडवली मूल्य</th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px !important;">कराचा दर</th>
                    <th colspan="6" style="font-size: 12px; font-weight: 900;">वार्षिक कराची रक्कम (रुपयात)</th>
                    <th colspan="5" style="font-weight: 900; font-size: 12px;">अपिलाचे निकाल व त्यावर केलेले फेरफार</th>
                    <th colspan="4" rowspan="3" style="font-weight: 900; font-size: 12px; padding: 0px 15px;">नंतर वाढ किंवा घट झालेल्या बाबतीत आदेशाच्या संदर्भात शेरा</th>
                </tr>
                <tr></tr>
                <tr>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">जमीन</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">बांधकाम</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">इमारत</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">घरपट्टी कर</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">दिवाबत्ती कर</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">आरोग्य कर</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">पाणीपट्टी कर</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">{{ $specialTax }}</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">एकूण</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">घरपट्टी कर</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">दिवाबत्ती कर</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">आरोग्य कर</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">पाणीपट्टी कर</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important; padding:0 10px">एकूण</th>
                </tr>
                <tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                    <th>9</th>
                    <th>10</th>
                    <th>11</th>
                    <th>12</th>
                    <th>13</th>
                    <th>14</th>
                    <th>15</th>
                    <th>16</th>
                    <th>17</th>
                    <th>18</th>
                    <th>19</th>
                    <th>20</th>
                    <th>21</th>
                    <th>22</th>
                    <th>23</th>
                    <th>24</th>
                    <th>25</th>
                    <th>26</th>
                    <th>27</th>
                    <th>28</th>
                    <th colspan="4">29</th>
                </tr>
            </thead>
            <tbody>
                

                @foreach($allResponsiveData as $index => $responseData)
                <?php
                    $totalTax = $responseData['home_tax'] + 
                               ($responseData['health_tax_rate'] ?? 0) + 
                               ($responseData['lamp_tax_rate'] ?? 0) + 
                               ($responseData['water_tax_rate'] ?? 0) + 
                               ($responseData['special_tax_rate'] ?? 0);
                ?>
                
                <tr style="border: none !important;">
                    <td>{{ $responseData['sl_no'] }}</td>
                    <td style="font-weight: normal;">{{ $responseData['street_name'] ?? ' ' }}</td>
                    <td>{{ $responseData['ct_survey_no'] ?? ' ' }}</td>
                    <td class="rotate" style="font-weight: normal;">{{ $responseData['property_no'] ?? ' ' }}</td>
                    <td>{{ $responseData['owner_name_mr'] ?? ' ' }}</td>
                    <td>{{ $responseData['property_user_name'] ?? ' ' }}</td>

                    @if($responseData['description'] == 'House')
                        <td>{{ $responseData['house_type_mr'] ?? ' ' }}</td>
                    @else
                        <td>{{ $responseData['description_mr'] ?? ' ' }}</td>
                    @endif

                    <td class="rotate" style="font-weight: normal;">{{ $responseData['year_of_income_construction'] ?? ' ' }}</td>
                    <td class="rotate" style="font-weight: normal;">{{ $responseData['area_in_sqft'] ?? ' ' }}</td>
                    <td class="rotate" style="font-weight: normal;">{{ $responseData['area_in_sqmt'] ?? ' ' }}</td>

                    <td class="rotate" style="font-weight: normal;">{{ $responseData['open_plot_readireckoner_rate'] ?? ' ' }}</td>
                    @if($responseData['description'] == 'MIDC')
                        <td class="rotate" style="font-weight: normal;">0.00</td>
                        <td class="rotate" style="font-weight: normal;">{{ $responseData['builtup_area_readireckoner_rate'] ?? ' ' }}</td>
                    @else
                        <td class="rotate" style="font-weight: normal;">{{ $responseData['builtup_area_readireckoner_rate'] ?? ' ' }}</td>
                        <td class="rotate" style="font-weight: normal;">0.00</td>
                    @endif

                    <td class="rotate" style="font-weight: normal;">{{ $responseData['depreciation'] ?? ' ' }}</td>
                    <td class="rotate" style="font-weight: normal;">{{ $responseData['usage_rate'] ?? ' ' }}</td>
                    <td class="rotate" style="font-weight: normal;">{{ number_format($responseData['capital_value'], 2) ?? ' ' }}</td>
                    <td class="rotate" style="font-weight: normal;">{{ $responseData['home_tax_rate'] ?? ' ' }}</td>
                    <td class="rotate" style="font-weight: normal;">{{ number_format($responseData['home_tax'], 2) ?? ' ' }}</td>
                    <td class="rotate" style="font-weight: normal;">{{ $responseData['lamp_tax_rate'] ?? ' ' }}</td>
                    <td class="rotate" style="font-weight: normal;">@if($responseData['description'] != 'Open plot'){{ $responseData['health_tax_rate'] ?? ' ' }} @endif</td>
                    <td class="rotate" style="font-weight: normal;">@if($responseData['description'] != 'Open plot'){{ $responseData['water_tax_rate'] ?? ' ' }} @endif</td>
                    <td class="rotate" style="font-weight: normal;">@if($responseData['description'] != 'Open plot'){{ $responseData['special_tax_rate'] ?? ' ' }} @endif</td>
                    <td class="rotate" style="font-weight: normal;">{{ number_format($totalTax, 2) ?? ' ' }}</td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td colspan="4" class="rotate" style="font-weight: normal;"></td>
                    
                    @if(($index + 1) % 6 === 0 && !$loop->last)
                  
                </tr>
                    </tbody>
                    </table>
                    
                   
                    
                    <!-- Page break -->
                    <div style="page-break-after: always;"></div>
                    
                    <!-- Start new table on next page with header -->
                    <div class="print-header">
                    
                       <div class="row">
                        <h4>नमुना ८ नियम ३२(१)</h4>
                        <h4>सन. {{ $taxYear['start_year_before'] }}-{{ $taxYear['end_year_before']}} ते {{ $taxYear['start_year_after'] }}-{{ $taxYear['end_year_after'] }} साठी कर आकारणी नोंदवही</h4>
                        
                    </div>
                    <div class="row mt-3">  
                        <div class="col-4" style="text-align: left;">ग्रामपंचायत : {{ Auth::guard('admin')->user()->name_mr }}</div>
                        <div class="col-4">तालुका : {{ $add[0]}}</div>
                        <div class="col-4" style="text-align: right;">जिल्हा : {{ $add[1] }}</div>
                    </div>
                    </div>
                   
                    <table style="margin-top: 10px;">
                        <thead>
                            <!-- Repeat table header -->
                            <tr>
                    <th rowspan="4" style="font-size: 12px;">अ. क्र.</th>
                    <th rowspan="4" style="font-size: 12px; padding: 0px 10px;">रस्त्याचे नाव / गल्लीचे नाव</th>
                    <th rowspan="4" class="rotate" style="font-size: 12px; font-weight: 900;">सी. टि. सर्वे नं. / भूमापन क्र. / गट क्र.</th>
                    <th rowspan="4" class="rotate" style="font-size: 12px; font-weight: 900;">मालमत्ता क्र.</th>
                </tr>
                <tr style="height: 90px;">
                    <th rowspan="3" style="font-weight: 900; font-size: 12px; padding: 10px;">मालमत्ता धारकाचे नाव</th>
                    <th rowspan="3" style="font-weight: 900; font-size: 12px; padding: 10px;">भोगवटा धारकाचे नाव</th>
                    <th rowspan="3" style="font-weight: 900; font-size: 12px; padding: 10px;">मालमत्तेचे वर्णन</th>
                    <th rowspan="3" class="rotate" style="font-size: 12px; font-weight: 900;">मिळकत बांधकामाचे वर्</th>
                    <th rowspan="3" class="rotate" style="font-size: 12px; font-weight: 900;">क्षेत्रफळ चौ. फु.</th>
                    <th rowspan="3" class="rotate" style="font-size: 12px; font-weight: 900;">क्षेत्रफळ चौ. मी.</th>
                    <th colspan="3" style="font-weight: 900; font-size: 12px;">रेडीरेकनर दर प्रति चौ. मी.</th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px !important;">घसारा दर</th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px !important;">इ. वापरा नुसार भारांक</th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px !important;">भांडवली मूल्य</th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px !important;">कराचा दर</th>
                    <th colspan="6" style="font-size: 12px; font-weight: 900;">वार्षिक कराची रक्कम (रुपयात)</th>
                    <th colspan="5" style="font-weight: 900; font-size: 12px;">अपिलाचे निकाल व त्यावर केलेले फेरफार</th>
                    <th colspan="4" rowspan="3" style="font-weight: 900; font-size: 12px; padding: 0px 15px;">नंतर वाढ किंवा घट झालेल्या बाबतीत आदेशाच्या संदर्भात शेरा</th>
                </tr>
                <tr></tr>
                <tr >
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">जमीन</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">बांधकाम</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">इमारत</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">घरपट्टी कर</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">दिवाबत्ती कर</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">आरोग्य कर</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">पाणीपट्टी कर</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">{{ $specialTax }}</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">एकूण</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">घरपट्टी कर</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">दिवाबत्ती कर</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">आरोग्य कर</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">पाणीपट्टी कर</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important; padding:0 10px">एकूण</th>
                </tr>
                <tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                    <th>9</th>
                    <th>10</th>
                    <th>11</th>
                    <th>12</th>
                    <th>13</th>
                    <th>14</th>
                    <th>15</th>
                    <th>16</th>
                    <th>17</th>
                    <th>18</th>
                    <th>19</th>
                    <th>20</th>
                    <th>21</th>
                    <th>22</th>
                    <th>23</th>
                    <th>24</th>
                    <th>25</th>
                    <th>26</th>
                    <th>27</th>
                    <th>28</th>
                    <th colspan="4">29</th>
                </tr>
                            
                        </thead>
                        <tbody>
                    @endif
                @endforeach
            </tbody>
        </table>

        

            <button id="printButton" onclick="window.print()"><i class="fa-solid fa-print" style="font-size: 20px"></i> Print</button>

    </div>
</body>
</html>
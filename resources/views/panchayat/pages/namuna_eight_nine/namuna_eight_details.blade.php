<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Namuna No. 8 Form </title>
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
        .row {
            text-align: center;
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
        .print-header {
            display: none;
             font-family: 'Mangal', 'Noto Sans Devanagari', sans-serif;
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
        .print-footer {
            /* display: none; */
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
            .print-footer {
                /* display: block; */
                position: relative;
                bottom: 0;
                left: 0;
                right: 0;
                width: 100%;
            }
            #printButton {
                display: none; /* Hide print button when printing */
            }

            /* Ensure that the rotated headers do not take too much space */
            th.rotate {
                height: 30px; /* Adjust height if necessary */
                font-size: 3px; /* Adjust font size if necessary */
            }
            @page {
                size: landscape;
            }
        }
    </style>
</head>
<body>
    <?php
        $add = explode(',', Auth::guard('admin')->user()->address_mr); 
    ?>
    <div class="container-fluid">
        
        <div class="row">
            <h5>नमुना ८ नियम ३२(१)</h5>
            <h5>सन. {{ $taxYear['start_year_before'] }}-{{ $taxYear['end_year_before']}} ते {{ $taxYear['start_year_after'] }}-{{ $taxYear['end_year_after'] }} साठी कर आकारणी नोंदवही</h5>
            
        </div>
        <div class="row mt-3 mb-2">  
            <div class="col-4" style="text-align: left;">ग्रामपंचायत : {{ Auth::guard('admin')->user()->name_mr }}</div>
            <div class="col-4">तालुका : {{ $add[0]}}</div>
            <div class="col-4" style="text-align: right;">जिल्हा : {{ $add[1] }}</div>
        </div>
        <table>
            <thead>
                {{-- <tr>
                    <th rowspan="4" style="font-size: 8px;">Sr no. <br>अ. क्र.</th>
                    <th rowspan="4" style="font-size: 8px;">Street no. <br> रस्त्याचे नाव / गल्लीचे नाव </th>
                    <th rowspan="4" class="rotate" style="font-size: 8px; font-weight: 800;">C.T survey no. <br> सी. टि. सर्वे नं. / भूमापन क्र.</th>
                    <th rowspan="4" class="rotate" style="font-size: 8px; font-weight: 800;">Property no. <br>मालमत्ता क्र.</th>
                  
                </tr> --}}
                <tr>
                    <th rowspan="4" style="padding: 0px 15px; font-size: 12px;">अ. क्र.</th>
                    <th rowspan="4" style="font-size: 12px; padding: 0px 40px;">रस्त्याचे नाव / गल्लीचे नाव</th>
                    <th rowspan="4" style="font-size: 12px; padding: 8px; font-weight: 900;">सी. टि. सर्वे नं. <br>/ भूमापन क्र. / गट क्र.</th>
                    <th rowspan="4" style="font-size: 12px; padding: 5px; font-weight: 900;">मालमत्ता क्र.</th>
                </tr>
                {{-- <tr>
                    <th rowspan="3" style="font-weight: 900; font-size: 8px;">Owner's name<br>मालमत्ता धारकाचे नाव</th>
                    <th rowspan="3" style="font-weight: 900; font-size: 8px;">property username <br> भोगवटा धारकाचे नाव</th>
                    <th rowspan="3" style="font-weight: 900; font-size: 8px;">property description<br>मालमत्तेचे वर्णन</th>
                    <th rowspan="4" class="rotate" style="font-size: 8px; font-weight: 900;">Year of Income<br>construction <br> मिळकत बांधकामाचे वर्</th>
                    <th rowspan="4" class="rotate" style="font-size: 8px; font-weight: 900;">Area in square feet <br>क्षेत्रफळ चौ. फु.</th>
                    <th rowspan="4" class="rotate" style="font-size: 8px; font-weight: 900;">Area in square meter<br>क्षेत्रफळ चौ. मी.</th>
                    <th colspan="3" style="font-weight: 900; font-size: 8px;">RediRekor rate
                        <br> Square meter <br>रेडीरेकोर दर वाचा
                        <br>प्रति चौरस मीटर
                    </th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size:8px !important;">Depreciation rate <br>घसारा दर</th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size:8px !important;">weighted according to <br>the use of building<br>इमा. वापरानुसार भारांक<br> केले जाते</th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size:8px !important;">Capital value<br>भांडवली मूल्य</th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size:8px !important;">Tax rate<br>कराचा दर </th>
                    @if(!empty($homeTaxes->special_tax))
                        <th colspan="6" style="font-size:8px; font-weight: 900;">Tax amount<br>कर रक्कम</th>
                    @else
                        <th colspan="5" style="font-weight: 900; font-size:8px;">Tax amount<br>कर रक्कम</th>
                    @endif
                    <th colspan="5" style="font-weight: 900; font-size:8px;">Appeal decision and modification thereof<br>अपील निर्णय आणि त्यात सुधारणा</th>
                    <th colspan="4" rowspan="4" style="font-weight: 900; font-size:8px; padding: 0px 15px;">Later remarks regas Is the order in case of increase or decrease<br> नंतरचे शेरे regas वाढ किंवा कमी बाबतीत क्रम आहे</th>

                </tr> --}}
                <tr style="height: 70px;">
                    <th rowspan="3" style="font-weight: 900; font-size: 12px; padding: 0px 55px;">मालमत्ता धारकाचे नाव</th>
                    <th rowspan="3" style="font-weight: 900; font-size: 12px; padding: 35px;">भोगवटा धारकाचे नाव</th>
                    <th rowspan="3" style="font-weight: 900; font-size: 12px; padding: 10px;">मालमत्तेचे वर्णन</th>
                    <th rowspan="3" class="rotate" style="font-size: 12px; font-weight: 900;">मिळकत <br>बांधकामाचे वर्ष</th>
                    <th rowspan="3" class="rotate" style="font-size: 12px; font-weight: 900; padding: 5px;">क्षेत्रफळ <br>चौ. फु.</th>
                    <th rowspan="3" class="rotate" style="font-size: 12px; font-weight: 900; padding: 5px;">क्षेत्रफळ <br>चौ. मी.</th>
                    <th colspan="3" style="font-weight: 900; font-size: 12px; padding: 10px">रेडीरेकनर दर <br>प्रति चौ. मी.</th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px !important;">घसारा दर</th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px !important;">इ. वापरा <br>नुसार भारांक</th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px !important;">भांडवली<br> मूल्य</th>
                    <th rowspan="3" class="rotate" style="font-weight: normal; font-size: 12px !important; padding: 5px;">कराचा <br>दर</th>
                    @if(!empty($homeTaxes->special_tax))
                        <th colspan="6" style="font-size: 12px; font-weight: 900;">वार्षिक कराची रक्कम (रुपयात)</th>
                    @else
                        <th colspan="5" style="font-size: 12px; font-weight: 900;">वार्षिक कराची रक्कम (रुपयात)</th>
                    @endif
                    
                    <th colspan="5" style="font-weight: 900; font-size: 12px;">अपिलाचे निकाल व त्यावर केलेले फेरफार</th>
                    <th colspan="4" rowspan="3" style="font-weight: 900; font-size: 12px; padding: 0px 5px;">नंतर वाढ किंवा घट झालेल्या बाबतीत आदेशाच्या संदर्भात शेरा</th>
                </tr>
                <tr></tr>
                {{-- <tr>
                    <th class="rotate" style="font-weight: normal;padding:15px 0; font-size:8px !important;">Open plot <br> जमीन</th>
                    <th class="rotate" style="font-weight: normal;padding:15px 0; font-size:8px !important;">Residence <br> बांधकाम</th>
                    <th class="rotate" style="font-weight: normal;padding:15px 0; font-size:8px !important;">Building <br> इमारत</th>
                    <th class="rotate" style="font-weight: normal;padding:15px 0; font-size:8px !important;">Home tax <br>गृहकर</th>
                    <th class="rotate" style="font-weight: normal;padding:15px 0; font-size:8px !important;">Lamp tax <br>दिवा कर</th>
                    <th class="rotate" style="font-weight: normal;padding:15px 0; font-size:8px !important;">Health tax <br>आरोग्य कर</th>
                    <th class="rotate" style="font-weight: normal;padding:15px 0; font-size:8px !important;">Water tax <br>पाणी कर</th>
                    @if(!empty($homeTaxes->special_tax))
                    <th class="rotate" style="font-weight: normal;padding:15px 0; font-size:8px !important;">{{ $homeTaxes->special_tax }} <br>{{ $homeTaxes->special_tax_mr }}</th>
                    @endif
                    <th class="rotate" style="font-weight: normal;padding:15px 0; font-size:8px !important;">Total <br>एकूण</th>


                    <th class="rotate" style="font-weight: normal;padding:15px 0; font-size:8px !important;">Home tax <br>घरपट्टी</th>
                    <th class="rotate" style="font-weight: normal;padding:15px 0; font-size:8px !important;">Lamp tax <br>दिवा कर</th>
                    <th class="rotate" style="font-weight: normal;padding:15px 0; font-size:8px !important;">Health tax <br>आरोग्य कर</th>
                    <th class="rotate" style="font-weight: normal;padding:15px 0; font-size:8px !important;">Water tax <br>पाणी कर</th>
                    <th class="rotate" style="font-weight: normal;padding:15px 0; font-size:8px !important; padding:0 10px ">Total <br>एकूण</th>
                </tr> --}}
                <tr>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">जमीन</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">बांधकाम</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">इमारत</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">घरपट्टी कर</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">दिवाबत्ती कर</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">आरोग्य कर</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">पाणीपट्टी कर</th>
                    @if(!empty($homeTaxes->special_tax))
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">{{ $homeTaxes->special_tax_mr }}</th>
                    @endif
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">एकूण</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">घरपट्टी कर</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">दिवाबत्ती कर</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">आरोग्य कर</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important;">पाणीपट्टी कर</th>
                    <th class="rotate" style="font-weight: normal;padding: 20px 0; font-size: 12px !important; padding:0 10px">एकूण</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                    <td>7</td>
                    <td>8</td>
                    <td>9</td>
                    <td>10</td>
                    <td>11</td>
                    <td>12</td>
                    <td>13</td>
                    <td>14</td>
                    <td>15</td>
                    <td>16</td>
                    <td>17</td>
                    <td>18</td>
                    <td>19</td>
                    <td>20</td>
                    <td>21</td>
                    @if(!empty($homeTaxes->special_tax))
                    <td>22</td>
                    <td>23</td>
                    <td>24</td>
                    <td>25</td>
                    <td>26</td>
                    <td>27</td>
                    <td>28</td>
                    <td colspan="4">29</td>
                    @else
                    <td>22</td>
                    <td>23</td>
                    <td>24</td>
                    <td>25</td>
                    <td>26</td>
                    <td>27</td>
                    <td colspan="4">28</td>
                    @endif
                </tr>

                <tr>
                    <td>{{$homeTaxes->id}}</td>
                    <td style="font-weight: normal;">{{ $homeTaxes->property->street_name_mr ?? ' ' }}</td>
                    <td>{{$homeTaxes->property->ct_survey_no ?? ' '}}</td>
                    <td style="font-weight: normal;">{{$homeTaxes->property->property_no ?? ' '}}</td>
                    <td >{{ $homeTaxes->property->owner_name_mr ?? ' '}}</td>
                    <td>{{ $homeTaxes->property->property_user_name_mr ?? ' '}}</td>

                    @if($homeTaxes->property->description == 'House')
                        <td>{{ $homeTaxes->property->house_type_mr ?? ' ' }}</td>
                    @else
                        <td>{{ $homeTaxes->property->description_mr ?? ' ' }}</td>
                    @endif

                    <td class="rotate" style="font-weight: normal;">{{$homeTaxes->property->year_of_income_construction ?? ' '}}</td>
                    <td class="rotate" style="font-weight: normal;">{{$homeTaxes->property->area_in_sqft ?? ' '}}</td>
                    <td class="rotate" style="font-weight: normal;">{{$homeTaxes->property->area_in_sqmt ?? ' '}}</td>

                    <td class="rotate" style="font-weight: normal;">{{$homeTaxes->open_plot_readireckoner_rate?? ' '}}</td>
                     @if($homeTaxes->property->description == 'MIDC')
                        <td class="rotate" style="font-weight: normal;">0.00</td>
                        <td class="rotate" style="font-weight: normal;">{{$homeTaxes->builtup_area_readireckoner_rate ?? ' '}}</td>
                     @else
                        <td class="rotate" style="font-weight: normal;">{{$homeTaxes->builtup_area_readireckoner_rate ?? ' '}}</td>
                        <td class="rotate" style="font-weight: normal;">0.00</td>
                     @endif

                    
                    <td class="rotate" style="font-weight: normal;">{{$homeTaxes->depreciation ?? ' '}}</td>
                    <td class="rotate" style="font-weight: normal;">{{$homeTaxes->usage_rate ?? ' '}}</td>
                    <td class="rotate" style="font-weight: normal;">{{number_format($homeTaxes->capital_value, 2) ?? ' '}}</td>
                    <td class="rotate" style="font-weight: normal;">{{ $homeTaxes->home_tax_rate ?? ' ' }}</td>
                    <td class="rotate" style="font-weight: normal;">{{number_format($homeTaxes->total_home_tax, 2) ?? ' '}}</td>
                    <td class="rotate" style="font-weight: normal;">{{$homeTaxes->lamp_tax_rate ?? ' '}}</td>
                    <td class="rotate" style="font-weight: normal;">@if($homeTaxes->property->description != 'Open plot'){{$homeTaxes->health_tax_rate ?? ' '}} @endif</td>
                    <td class="rotate" style="font-weight: normal;">@if($homeTaxes->property->description != 'Open plot'){{$homeTaxes->water_tax_rate ?? ' '}} @endif</td>
                    @if(!empty($homeTaxes->special_tax))
                    <td class="rotate" style="font-weight: normal;">@if($homeTaxes->property->description != 'Open plot'){{$homeTaxes->special_tax_rate ?? ' '}} @endif</td>
                    @endif
                    <td class="rotate" style="font-weight: normal;">{{ number_format($homeTaxes->total_tax_amount, 2) ?? ' '}}</td>
                    <td class="rotate" style="font-weight: normal;">0</td>
                    <td class="rotate" style="font-weight: normal;">0</td>
                    <td class="rotate" style="font-weight: normal;">0</td>
                    <td class="rotate" style="font-weight: normal;">0</td>
                    <td class="rotate" style="font-weight: normal;">0</td>
                    <td colspan="4" class="rotate" style="font-weight: normal;">0</td>
                </tr>
                <!-- Additional rows can be added similarly -->
            </tbody>
        </table>
         <!-- Footer for each page -->
       <div class="print-footer">
                    <div class="signature-line" style="font-weight: normal;">
                        सदर उतारा हा मालकी हक्काचा नसून कर आकारणीचा आहे. सदरच्या उताऱ्यावरून खरेदी विक्रीचा व्यवहार झाल्यास त्यास ग्रामपंचायत जबाबदार राहणार नाही. शासन परिपत्रक क्र. VTM२६०३ / प्र. क्र. २०६८/ पं. रा. ४ दि.२० नोव्हेंबर २००३ नुसार ग्रामीण भागातील घरांची नोंदणी पती-पत्नी यांच्या संयुक्त नावे करण्याबाबत निर्देशित करण्यात आलेले आहे.
                    </div>
                    <div style="font-weight: normal; text-align: right;">
                        येणे प्रमाणे उतारा दिला असे दिनांक - {{ date('d-m-Y') }}
                    </div>
                </div>
        <button id="printButton" onclick="window.print()"><i class="fa-solid fa-print" style="font-size: 20px"></i> Print</button>
    </div>
</body>
</html>


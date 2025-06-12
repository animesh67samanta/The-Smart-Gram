<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Namuna No. 8 Form </title>
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
            @page {
                size: landscape;
            }
        }
    </style>
</head>
<body>
    <?php
   // dd($homeTaxes);
    ?>
    <div class="container">
        <div style="display: flex; justify-content: center;">
            <h3>ग्रामपंचायत : {{ $homeTaxes->panchayat_name_mr }}, {{ $homeTaxes->panchayat_address_mr }}</h3>
        </div>
        <div >
            <div style="display: flex; flex-wrap: wrap; margin-right: -15px; margin-left: -15px;">
                <div style="flex: 0 0 50%; max-width: 20%; padding-right: 15px; padding-left: 15px;  text-align: center; padding: 20px; margin-bottom: 15px;">
                    <h5>ward no :</h5>
                </div>
                <div style="flex: 0 0 50%; max-width: 70%; padding-right: 15px; padding-left: 15px; text-align: center; padding: 20px; margin-bottom: 15px; margin-left: 65px;">
                    <h4>Namuna no. 8 (Rule 32(1))</h4>
                    list of Taxable buildings and land for the year 2023-24 to 2026-27
                </div>
            </div>


        </div>

        <table>
            <thead>
                <tr>
                    <th rowspan="4" style="font-size: 8px;">Sr no. <br>अ. क्र.</th>
                    <th rowspan="4" style="font-size: 8px;">Street no. <br> रस्त्याचे नाव / गल्लीचे नाव </th>
                    <th rowspan="4" class="rotate" style="font-size: 8px; font-weight: 800;">C.T survey no. <br> सी. टि. सर्वे नं. / भूमापन क्र.</th>
                    <th rowspan="4" class="rotate" style="font-size: 8px; font-weight: 800;">Property no. <br>मालमत्ता क्र.</th>
                  
                </tr>
                <tr>
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

                </tr>
                <tr></tr>
                <tr>
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
<?php //dd($homeTaxes); ?>
                <tr>
                    <td>{{$homeTaxes->id}}</td>
                    <td style="font-weight: normal;">{{ $homeTaxes->property->street_name_mr ?? ' ' }}<br>{{$homeTaxes->property->street_name ?? ' '}}</td>
                    <td>{{$homeTaxes->property->ct_survey_no ?? ' '}}</td>
                    <td class="rotate" style="font-weight: normal;">{{$homeTaxes->property->property_no ?? ' '}}</td>
                    <td >{{ $homeTaxes->property->owner_name_mr ?? ' '}}/{{$homeTaxes->property->owner_name ?? ' '}}</td>
                    <td>{{ $homeTaxes->property->property_user_name_mr ?? ' '}}/{{$homeTaxes->property->property_user_name ?? ' '}}</td>

                    @if($homeTaxes->property->description == 'House')
                        <td>{{ $homeTaxes->property->house_type_mr ?? ' ' }}/{{$homeTaxes->property->house_type ?? ' '}}</td>
                    @else
                        <td>{{ $homeTaxes->property->description_mr ?? ' ' }}/{{$homeTaxes->property->description ?? ' '}}</td>
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
        <button id="printButton" onclick="window.print()">Print</button>
    </div>
</body>
</html>


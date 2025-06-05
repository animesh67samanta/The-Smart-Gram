<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Demand Register 2025–2026</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


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
            <h4 class="text-center">ग्रामपंचायत पूर्णी, तालुका: भिवंडी, जिल्हा: ठाणे</h4>
        
            <h3 class="text-center">ग्रामपंचायत: {{ $homeTaxes->panchayat_name_mr }}, {{ $homeTaxes->panchayat_address_mr }}</h3>
            <h5 class="text-center">नमुना नं. १ मागणी रजिस्टर / Namuna no.9 Demand Resister.</h5>
        </div>

        <table>
            <thead>
                <tr>
                    <th rowspan="4" class="rotate" style="font-size: 10px;">मिळकत नं. / Income No</th>
                    <th rowspan="4" style="vertical-align: top; font-weight: 800;">उत्पन्न धारकाचे नाव / Name of Income holder</th>
                    <th colspan="9" style="font-weight: 800;">मागणी / Demand</th>
                    <th colspan="5"></th>
                    <th colspan="15" style="font-weight: 800;">वसूली / Recovery</th>
                    <th rowspan="4" class="rotate" style="font-weight: normal;">अजून येणे बाकी आहे <br> Yet to come</th>
                </tr>
                <tr>
                    <th colspan="3" style="font-weight: 800;">गृहकर / Home tax</th>
                    <th colspan="3" style="font-weight: 800;">आरोग्य कर / Health tax</th>
                    <th colspan="3" style="font-weight: 800;">दिवा कर / Lamp tax</th>
                    <th colspan="3" style="font-weight: 800;">5% दंड / सवलत , 5% penality / Discount</th>
                    <th rowspan="3" class="rotate" style="font-weight: normal;">30 सप्टेंबर पूर्वी /before</th>
                    <th rowspan="3" class="rotate" style="font-weight: normal;">30 सप्टेंबर नंतर /after</th>
                    <th rowspan="3" class="rotate" style="font-weight: normal;">पावती क्र.<br>Reciept no.</th>
                    <th rowspan="3" class="rotate" style="font-weight: normal;">पावती तारीख <br> Reciept date</th>
                    <th colspan="3" style="font-weight: 800;">गृहकर / Home tax</th>
                    <th colspan="3" style="font-weight: 800;">आरोग्य कर / Health tax</th>
                    <th colspan="3" style="font-weight: 800;">दिवा कर / Lamp tax</th>
                    <th colspan="3" style="font-weight: 800;">5% दंड / सवलत , 5% penality / Discount</th>
                    <th rowspan="3" class="rotate" style="font-weight: normal;">एकूण Total</th>
                </tr>
                <tr></tr>
                <tr>
                    <th class="rotate" style="font-weight: normal;">मागील / previous</th>
                    <th class="rotate" style="font-weight: normal;">चालू / Current</th>
                    <th class="rotate" style="font-weight: normal;">एकूण / Total</th>
                    <th class="rotate" style="font-weight: normal;">मागील / previous</th>
                    <th class="rotate" style="font-weight: normal;">चालू / Current</th>
                    <th class="rotate" style="font-weight: normal;">एकूण / Total</th>
                    <th class="rotate" style="font-weight: normal;">मागील / previous</th>
                    <th class="rotate" style="font-weight: normal;">चालू / Current</th>
                    <th class="rotate" style="font-weight: normal;">एकूण / Total</th>
                    <th class="rotate" style="font-weight: normal;">मागील / penality</th>
                    <th class="rotate" style="font-weight: normal;">चालू / discount</th>
                    <th class="rotate" style="font-weight: normal;">एकूण / Total</th>
                    <th class="rotate" style="font-weight: normal;">मागील / previous</th>
                    <th class="rotate" style="font-weight: normal;">चालू / Current</th>
                    <th class="rotate" style="font-weight: normal;">एकूण / Total</th>
                    <th class="rotate" style="font-weight: normal;">मागील / previous</th>
                    <th class="rotate" style="font-weight: normal;">चालू / Current</th>
                    <th class="rotate" style="font-weight: normal;">एकूण / Total</th>
                    <th class="rotate" style="font-weight: normal;">मागील / previous</th>
                    <th class="rotate" style="font-weight: normal;">चालू / Current</th>
                    <th class="rotate" style="font-weight: normal;">एकूण / Total</th>
                    <th class="rotate" style="font-weight: normal;">Penality</th>
                    <th class="rotate" style="font-weight: normal;">Discount</th>
                    <th class="rotate" style="font-weight: normal;">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="rotate">1 / ब / 101<br>1 / ब / 101</td>
                    <td style="vertical-align: top;">{{ $homeTaxes->property->owner_name_mr }} / {{$homeTaxes->property->owner_name}}</td>
                    <td class="rotate" style="font-weight: normal;">{{ $homeTaxes->home_due_tax_amount}}</td>
                    <td class="rotate" style="font-weight: normal;">{{ $homeTaxes->home_pay_tax_amount}}</td>
                    <td class="rotate" style="font-weight: normal;">{{ $homeTaxes->calculated_home_tax}}</td>
                    <td class="rotate" style="font-weight: normal;">0</td>
                    <td class="rotate" style="font-weight: normal;">0</td>
                    <td class="rotate" style="font-weight: normal;">0</td>
                    <td class="rotate" style="font-weight: normal;">0</td>
                    <td class="rotate" style="font-weight: normal;">0</td>
                    <td class="rotate" style="font-weight: normal;">0</td>
                    <td class="rotate" style="font-weight: normal;">0</td>
                    <td class="rotate" style="font-weight: normal;">0</td>
                    <td class="rotate" style="font-weight: normal;">0</td>
                    <td class="rotate" style="font-weight: normal;">0</td>
                    <td class="rotate" style="font-weight: normal;">0</td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;">0</td>

                </tr>

                {{-- <tr>
                    <td class="rotate">1 / ब / 102<br>1 / ब / 102</td>
                    <td style="vertical-align: top;">वैशाली अजय भगत / Vaishali Ajay Bhagat</td>
                    <td class="rotate" style="font-weight: normal;">3890</td>
                    <td class="rotate" style="font-weight: normal;">1986</td>
                    <td class="rotate" style="font-weight: normal;">5076</td>
                    <td class="rotate" style="font-weight: normal;">940</td>
                    <td class="rotate" style="font-weight: normal;">960</td>
                    <td class="rotate" style="font-weight: normal;">40</td>
                    <td class="rotate" style="font-weight: normal;">20</td>
                    <td class="rotate" style="font-weight: normal;">20</td>
                    <td class="rotate" style="font-weight: normal;">960</td>
                    <td class="rotate" style="font-weight: normal;">0</td>
                    <td class="rotate" style="font-weight: normal;">0</td>
                    <td class="rotate" style="font-weight: normal;">0</td>
                    <td class="rotate" style="font-weight: normal;">5396</td>
                    <td class="rotate" style="font-weight: normal;">5396</td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;"></td>
                    <td class="rotate" style="font-weight: normal;">5396</td>
                </tr> --}}
                <!-- Additional rows can be added similarly -->
            </tbody>
        </table>
        <button id="printButton" onclick="window.print()">Print</button>
    </div>
</body>
</html>

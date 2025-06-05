<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Demand Register 2025–2026</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    th, td {
      font-size: 0.85rem;
      vertical-align: middle;
    }
    .rotate {
      transform: rotate(-90deg);
      writing-mode: vertical-lr;
    }
    .table>:not(caption)>*>*{
        background-color:white;
        color:#000;
    }
    .container{
        max-width: 100%;
        overflow: auto;
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
  <div class="container mt-4">
    <h4 class="text-center">ग्रामपंचायत पूर्णी, तालुका: भिवंडी, जिल्हा: ठाणे</h4>
    <h5 class="text-center">नमुना क्र. ९ मागणी रजिस्टर / Namuna No. 9 Demand Register 2025–2026</h5>
    <table class="table table-bordered table-striped mt-4">
      <thead class="table-dark text-center">
        <tr>
          <th rowspan="3">धारकाचे नाव / Name of Income Holder</th>
          <th colspan="14">मागणी / Demand</th>
          <th colspan="8">सूगम / Recovery</th>
          <th rowspan="3">एकूण वसुल / Total Recovery</th>
        </tr>
        <tr>
          <th colspan="3">घरपट्टी / Home Tax</th>
          <th colspan="3">आरोग्य कर / Health Tax</th>
          <th colspan="3">दिवा मणी / Lamp Tax</th>
          <th colspan="3">5% Penulty / Discount</th>
          <th colspan="0">Before 30 Sep.</th>
          <th colspan="0">After 30 Sep.</th>
          <th colspan="3">घरपट्टी / Home Tax</th>
          <th colspan="3">आरोग्य कर / Health Tax</th>
          <th colspan="2">दिवा मणी / Lamp Tax</th>
        </tr>
        <tr>
          <th>पूर्वीची / Previous</th>
          <th>चालू / Current</th>
          <th>एकूण / Total</th>
          <th>पूर्वीची</th>
          <th>चालू</th>
          <th>एकूण</th>
          <th>पूर्वीची</th>
          <th>चालू</th>
          <th>एकूण</th>

          
          <th>मागील / penality</th>
          <th>चालू / discount</th>
          <th>एकूण / Total</th>

          <th></th>
          <th></th>
          <th>पूर्वीची</th>
          <th>चालू</th>
          <th>एकूण</th>
          <th>पूर्वीची</th>
          <th>चालू</th>
          <th>एकूण</th>
          <th>पूर्वीची</th>
          <th>चालू</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>@if(isset($homeTaxes->property->owner_name) && $homeTaxes->property->owner_name!=''){{$homeTaxes->property->owner_name}}@endif @if(isset($homeTaxes->property->owner_name_mr) && $homeTaxes->property->owner_name_mr!='') - {{$homeTaxes->property->owner_name_mr}}@endif</td>
          <td>
            @if(isset($homeTaxes->home_due_tax_amount) && $homeTaxes->home_due_tax_amount!=''){{$homeTaxes->home_due_tax_amount}}@else 0 @endif
          </td>
          <td>            
            @if(isset($homeTaxes->calculated_home_tax) && $homeTaxes->calculated_home_tax!=''){{$homeTaxes->calculated_home_tax}}@else 0 @endif
          </td>
          <td>
            @if(isset($homeTaxes->calculated_home_tax) && $homeTaxes->calculated_home_tax!=''){{$homeTaxes->calculated_home_tax}}@else 0 @endif
          </td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>
            @if(isset($homeTaxes->tax_discount) && $homeTaxes->tax_discount!=''){{$homeTaxes->tax_discount}}@else 0 @endif
          </td>
          <td>
            @if(isset($homeTaxes->tax_penalty) && $homeTaxes->tax_penalty!=''){{$homeTaxes->tax_penalty}}@else 0 @endif
          </td>
          <td>
            @if(isset($homeTaxes->calculated_home_tax) && $homeTaxes->calculated_home_tax!=''){{$homeTaxes->calculated_home_tax}}@endif
          </td>
          <td>
            0
            <!-- before -->
            </td>
            
          <td>
            0
            <!-- after -->
            </td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>@if(isset($homeTaxes->calculated_home_tax) && $homeTaxes->calculated_home_tax!=''){{$homeTaxes->calculated_home_tax}}@else 0 @endif</td>
        </tr>
      </tbody>
    </table>
    <button id="printButton" onclick="window.print()" fdprocessedid="p9rp">Print</button>
  </div>
</body>
</html>

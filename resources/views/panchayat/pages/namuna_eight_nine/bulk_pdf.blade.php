<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <style>
    body {
        font-family: "mangal", Devanagari, sans-serif;
    }
</style>

    <style>
        /* Your existing table styles */
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 5px; text-align: center; }
        .page-break { page-break-after: always; }
    </style>
</head>
<body>
    @foreach($properties as $index => $property)
        <div class="property-details">
            <!-- Your existing table structure for each property -->
            <table>
                <thead>
                    <tr>
                        <th>Property No</th>
                        <th>Owner Name</th>
                        <!-- Other headers -->
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $property['property_no'] }}</td>
                        <td>{{ $property['owner_name_mr'] }} / {{ $property['owner_name'] }}</td>
                        <!-- Other data cells -->
                    </tr>
                </tbody>
            </table>
        </div>
        
        @if(!$loop->last)
            <div class="page-break"></div>
        @endif
    @endforeach
</body>
</html>
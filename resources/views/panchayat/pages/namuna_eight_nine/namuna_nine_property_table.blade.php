
@foreach($properties as $property)
<tr>
    <td class="checkbox-cell">
        <input type="checkbox" name="property_id[]" value="{{ $property->id }}" class="property-checkbox">
    </td>
    <td style="text-align: center; font-size: 12px;">{{ $property->property_no }}</td>
    <td style="text-align: center; font-size: 12px;">{{ $property->owner_name_mr }}</td>
    <td style="text-align: center; font-size: 12px;">{{ $property->owner_name }}</td>
</tr>
@endforeach
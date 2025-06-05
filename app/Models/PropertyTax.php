<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyTax extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_id',
         'street_name',
         'year_of_income_construction',
          'area_in_sqft',
          'area_in_sq_mt',
          'open_plot',
           'residence',
           'builders',
           'depriciation_rate',
            'weight_use_of_builders',
            'capital_value',
             'tax_rate',
             'home_tax',
             'lamp_tax',
             'health_tax',
             'water_tax',
             'total'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}

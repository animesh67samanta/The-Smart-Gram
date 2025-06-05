<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeTax extends Model
{
    use HasFactory;
    protected $fillable = [
        'square_meter',
        'year',
        // 'open_plot_readireckoner_rate',
        // 'builtup_area_readireckoner_rate',
        // 'depreciation',
        // 'usage_rate',
        // 'home_tax_rate',
        // 'capital_value',
        // 'residence',
        // 'building',
        'calculated_home_tax',
        'home_due_tax_amount',
        'home_pay_tax_amount',
        'tax_discount',
        'tax_penalty',
        'property_id',
        'panchayat_id',
        'created_at',
        'updated_at'

    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

}

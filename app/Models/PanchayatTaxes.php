<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanchayatTaxes extends Model
{
    use HasFactory;
    protected $table = 'panchayat_taxes';
    protected $fillable = [
        'panchayat_id',
        'rcc_open_plot_readireckoner_rate',
        'rcc_builtup_area_readireckoner_rate',
        'rcc_depreciation_rate',
        'rcc_usage_rate',
        'rcc_tax_rate',
        'flat_open_plot_readireckoner_rate',
        'flat_builtup_area_readireckoner_rate',
        'flat_depreciation_rate',
        'flat_usage_rate',
        'flat_tax_rate',
        'mud_brick_open_plot_readireckoner_rate',
        'mud_brick_builtup_area_readireckoner_rate',
        'mud_brick_depreciation_rate',
        'mud_brick_usage_rate',
        'mud_brick_tax_rate',
        'sticks_open_plot_readireckoner_rate',
        'sticks_builtup_area_readireckoner_rate',
        'sticks_depreciation_rate',
        'sticks_usage_rate',
        'sticks_tax_rate',
        'commercial_open_plot_readireckoner_rate',
        'commercial_builtup_area_readireckoner_rate',
        'commercial_depreciation_rate',
        'commercial_usage_rate',
        'commercial_tax_rate',
        'midc_open_plot_readireckoner_rate',
        'midc_builtup_area_readireckoner_rate',
        'midc_depreciation_rate',
        'midc_usage_rate',
        'midc_tax_rate',
        'health_tax',
        'lamp_tax',
        'water_tax',
        'special_tax',
        'special_tax_mr',
        'special_tax_rate',
    ];

    

}

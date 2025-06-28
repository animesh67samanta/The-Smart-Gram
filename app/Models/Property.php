<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'panchayat_id', 'street_name', 'street_name_mr', 'ct_survey_no',
        'year_of_income_construction', 'area_in_sqft', 'area_in_sqmt',
        'open_plot_readireckoner_rate', 'residence', 'builders',
        'owner_name', 'owner_name_mr', 'property_name', 'property_user_name',
        'property_user_name_mr', 'property_no', 'description', 'description_mr',
        'house_type', 'house_type_mr', 'weighted_according_to_the_use_of_builders',
        'use_of_builders', 'status', 'sequence', 'created_at', 'updated_at'
    ];
    

    public function propertyTaxes()
    {
        return $this->hasMany(PropertyTax::class);
    }

    public function panchayat()
    {
        return $this->belongsTo(Admin::class);
    }
    public function hometax()
    {
        return $this->belongsTo(HomeTax::class,'id','property_id');
    }
}

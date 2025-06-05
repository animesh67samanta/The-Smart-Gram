<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthTax extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_id',
        'panchayat_id',
        'year',
        'total_health_tax',
        'pay_tax_amount',
        'due_tax_amount'

    ];
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}

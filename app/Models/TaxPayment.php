<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxPayment extends Model
{
    use HasFactory;
    protected $table = 'tax_payments';
    protected $fillable = [
        'id',

        'panchayat_id',
        'property_id',
        'year',
        'total_home_tax_amount',
        'home_pay_tax_amount',
        'home_due_tax_amount',
        'total_health_tax_amount',
        'health_pay_tax_amount',
        'health_due_tax_amount',
        'total_lamp_tax_amount',
        'lamp_pay_tax_amount',
        'lamp_due_tax_amount',
        'penalty',
        'penalty_discount',
        'penalty_total'

    ];
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
    public function panchayat()
    {
        return $this->belongsTo(Admin::class);
    }
}

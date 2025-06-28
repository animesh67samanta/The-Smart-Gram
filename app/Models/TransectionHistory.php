<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransectionHistory extends Model
{
    use HasFactory;

    protected $table = 'transection_history';
    protected $fillable = [
        'home_taxes_id',
        'property_id',
        'panchayat_id',
        'amount',
        'status',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penalty extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_id',
        'panchayat_id',
        'year',
        'penalty',
        'penalty_discount',
        'total_penalty'

    ];
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}

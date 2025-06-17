<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeathCertificate extends Model
{
    use HasFactory;
    

    protected $fillable = [
    'panchayat_id',
    'name',
    'name_mr',
    'dob',
    'dob_mr',
    'gender',
    'gender_mr',
    'father_or_husband_name',
    'father_or_husband_name_mr',
    'mother_name',
    'mother_name_mr',
    'death_place',
    'death_place_mr',
    'permanent_address',
    'permanent_address_mr',
    'registration_number',
    'registration_number_mr',
    'registration_date',
    'registration_date_mr',
    'remarks',
    'remarks_mr',
    'issue_date',
    'issue_date_mr',
    'nationality',
    'nationality_mr',
    'adhar_card_no_deceased',
    'adhar_card_no_deceased_mr',
    'approve_status',
    'approve_time',
    
];

    public function panchayat()
    {
        return $this->belongsTo(Admin::class);
    }

}


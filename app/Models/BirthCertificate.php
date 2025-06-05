<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BirthCertificate extends Model
{
    use HasFactory;
    protected $fillable = [
        'panchayat_id',
        'childname',
        'childname_mr',
        'dob',
        'gender',
        'gender_mr',
        'father_name',
        'father_name_mr',
        'mother_name',
        'mother_name_mr',
        'birth_place',
        'birth_place_mr',
        'permanent_address',
        'permanent_address_mr',
        'registration_number',
        'registration_number_mr',
        'registration_date',
        'remarks',
        'remarks_mr',
        'issue_date',
        'number',
        'parent_address',
        'parent_address_mr',
        'parent_nationality',
        'parent_nationality_mr',
        'adhar_card_no_father',
        'adhar_card_no_mother',
        'approve_status',
        'approve_time',
    ];
    public function panchayat()
    {
        return $this->belongsTo(Admin::class);
    }

}

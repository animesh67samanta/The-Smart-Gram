<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarriageCertificate extends Model
{
    use HasFactory;
    protected $guarded = [];
   
    public function panchayat()
    {
        return $this->belongsTo(Admin::class);
    }
}

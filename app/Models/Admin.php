<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name', 'name_mr', 'email', 'password','user_type','phone','address', 'address_mr','panchayat_id','digital_signature'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function panchayatName()
    {
        return $this->hasOne(Admin::class, 'id', 'panchayat_id');
    }

    public function panchayatTaxes()
    {
        return $this->hasOne(PanchayatTaxes::class, 'panchayat_id');
    }
}

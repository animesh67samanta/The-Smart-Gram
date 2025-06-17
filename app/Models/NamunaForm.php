<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamunaForm extends Model
{
    use HasFactory;
    protected $table = 'namuna_forms';

    protected $fillable = [
        'start_year_before',
        'end_year_before',
        'start_year_after',
        'end_year_after',
    ];
}

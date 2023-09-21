<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'city_id',
        'district_id',
        'address',
        'special_notes',
        'status',
        'phone'
    ];
}

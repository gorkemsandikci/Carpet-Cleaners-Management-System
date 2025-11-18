<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'company_id',
        'first_name',
        'last_name',
        'gender',
        'city_id',
        'district_id',
        'address',
        'special_notes',
        'status',
        'phone',
        'email'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}

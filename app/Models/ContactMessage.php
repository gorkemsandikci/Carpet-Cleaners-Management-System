<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'email',
        'subject',
        'message',
        'status',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}

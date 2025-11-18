<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'title',
        'image',
        'video_url',
        'type',
        'order',
        'status',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}

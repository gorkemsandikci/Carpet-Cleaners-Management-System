<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'section_key',
        'title',
        'content',
        'image',
        'button_text',
        'button_link',
        'order',
        'status',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}

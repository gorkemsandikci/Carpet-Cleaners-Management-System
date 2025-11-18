<?php

namespace App\Models;

use App\Models\Company;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use Sluggable, HasFactory;
    protected $fillable = [
        'company_id',
        'name',
        'content',
        'slug',
        'image',
        'short_text',
        'status',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}

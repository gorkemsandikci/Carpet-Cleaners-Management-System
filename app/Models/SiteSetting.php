<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'type',
        'group',
        'data'
    ];

    protected $casts = [
        'data' => 'array',
    ];

    /**
     * Get the data attribute with proper handling
     */
    public function getDataAttribute($value)
    {
        if (is_null($value)) {
            return null;
        }
        
        // If it's already an array, return it
        if (is_array($value)) {
            return $value;
        }
        
        // Try to decode JSON
        $decoded = json_decode($value, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            return $decoded;
        }
        
        // Return as string if not JSON
        return $value;
    }

    /**
     * Get the company that owns the site setting.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}

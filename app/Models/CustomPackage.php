<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'guider_id',
        'guider_name',
        'guider_email',
        'title',
        'description',
        'start_location',
        'duration',
        'num_people',
        'travel_date',
        'destinations',
        'vehicles',
        'accommodations',
        'image',
        'status',
        'price'
    ];

    protected $casts = [
        'destinations' => 'array',
        'vehicles' => 'array',
        'accommodations' => 'array',
        'price' => 'decimal:2',
        'duration' => 'integer',
        'num_people' => 'integer',
        'travel_date' => 'date'
    ];

    // Default attribute values
    protected $attributes = [
        'status' => 'pending',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function guider(): BelongsTo
    {
        return $this->belongsTo(Guider::class);
    }
}
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
        'title',
        'description',
        'start_location',
        'duration',
        'num_people',
        'travel_date',
        'destinations',
        'vehicles',
        'accommodations',
        'image'
        // Removed 'status' and 'price' as they should be null initially
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
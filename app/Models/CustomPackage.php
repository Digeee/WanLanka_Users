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
        'num_people' => 'integer'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
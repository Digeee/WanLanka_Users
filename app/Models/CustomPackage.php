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
        'province_type',
        'selected_province',
        'num_people',
        'duration',
        'start_date',
        'destinations',
        'vehicles',
        'accommodations',
        'image',
        'status',
        'price',
        'admin_notes'
    ];

    protected $casts = [
        'start_date' => 'date',
        'destinations' => 'array',
        'vehicles' => 'array',
        'accommodations' => 'array',
        'price' => 'decimal:2'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
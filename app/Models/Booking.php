<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'place_id',
        'pickup_district',
        'pickup_location',
        'latitude',
        'longitude',
        'full_name',
        'email',
        'people_count',
        'date',
        'time',
        'vehicle_id',
        'total_price',
        'guider',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Guider extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'phone',
        'address',
        'province',
        'district',
        'languages',
        'specializations',
        'experience_years',
        'hourly_rate',
        'availability',
        'description',
        'image',
        'city',
        'nic_number',
        'driving_license_photo',
        'vehicle_types',
        'status',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
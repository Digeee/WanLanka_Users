<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        // Basic
        'name', 'email', 'phone', 'password',

        // Address fields
        'province', 'district', 'address',

        // Optional profile fields
        'city', 'country', 'dob', 'preferred_language',
        'id_type', 'id_number', 'id_image',
        'profile_photo', 'emergency_name', 'emergency_phone',
        'accept_terms', 'marketing_opt_in',

        // Verification / Admin approval
        'is_verified',

        // OTP for reset
        'otp', 'otp_expires_at', 'otp_attempts',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'otp',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'dob'               => 'date',
        'accept_terms'      => 'boolean',
        'marketing_opt_in'  => 'boolean',
        'is_verified'       => 'boolean',
        'otp_expires_at'    => 'datetime',
        'otp_attempts'      => 'integer',
    ];

    // ✅ Profile Photo Accessor
    public function getProfilePhotoUrlAttribute(): string
    {
        $path = $this->profile_photo;
        return ($path && Storage::disk('public')->exists($path))
            ? Storage::url($path)
            : asset('images/avatar-default.png');
    }

    // ✅ Relation: User has many bookings
    public function bookings()
    {
        // Your bookings table uses email (not user_id)
        return $this->hasMany(Booking::class, 'email', 'email');
    }

    // ✅ Relation: User has many custom packages
    public function customPackages()
    {
        // Same logic — using email as foreign key
        return $this->hasMany(CustomPackage::class, 'email', 'email');
    }

    // Relationship with Travel Documents
    public function travelDocuments()
    {
        return $this->hasMany(\App\Models\TravelDocument::class);
    }

    // Relationship with Fixed Bookings
    public function fixedBookings()
    {
        return $this->hasMany(\App\Models\FixedBooking::class, 'user_id');
    }

}

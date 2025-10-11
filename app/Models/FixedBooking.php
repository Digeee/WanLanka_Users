<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixedBooking extends Model
{
    use HasFactory;

    protected $fillable = [
    'package_id', 'package_name', 'first_name', 'last_name', 'email', 'phone',
    'pickup_location', 'payment_method', 'receipt',
    'participants', 'total_price', // ✅ new
    'user_id', 'status',
];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
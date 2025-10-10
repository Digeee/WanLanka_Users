<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixedBooking extends Model
{
    use HasFactory;

   protected $fillable = [
    'package_id',
    'first_name',
    'last_name',
    'email',
    'phone',
    'pickup_location',
    'payment_method',
    'receipt',
    'user_id',
    'status', // include this!
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewPlaceUser extends Model
{
    protected $table = 'new_place_user'; // explicitly set table name

  protected $fillable = [
    'user_id',
    'user_name',
    'user_email',
    'place_name',
    'image',
    'google_map_link',
    'province',
    'district',
    'location',
    'nearest_city',
    'description',
    'best_suited_for',
    'activities_offered',
    'rating',
    'status',
];

}

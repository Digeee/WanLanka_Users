<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TravelDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'category',
        'file_path',
        'file_name',
        'file_size',
        'file_type',
        'is_encrypted',
        'expiry_date',
        'is_public',
    ];

    protected $casts = [
        'expiry_date' => 'date',
        'is_encrypted' => 'boolean',
        'is_public' => 'boolean',
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Get file URL
    public function getFileUrlAttribute()
    {
        return Storage::disk('private')->url($this->file_path);
    }

    // Get file size in human readable format
    public function getFileSizeHumanAttribute()
    {
        $bytes = $this->file_size;
        $units = ['B', 'KB', 'MB', 'GB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, 2) . ' ' . $units[$i];
    }

    // Check if document is expired
    public function getIsExpiredAttribute()
    {
        return $this->expiry_date && $this->expiry_date->isPast();
    }

    // Document categories
    public static function getCategories()
    {
        return [
            'passport' => 'Passport/ID',
            'visa' => 'Visa & Travel Insurance',
            'booking' => 'Flight & Hotel Bookings',
            'medical' => 'Medical Records',
            'emergency' => 'Emergency Contacts',
            'valuables' => 'Valuables Photos',
            'other' => 'Other Documents',
        ];
    }

    // Get category label
    public function getCategoryLabelAttribute()
    {
        $categories = self::getCategories();
        return $categories[$this->category] ?? 'Unknown';
    }
}
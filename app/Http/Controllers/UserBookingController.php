<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\CustomPackage;
use Illuminate\Support\Facades\Auth;

class UserBookingController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Current Bookings (today or future)
        $currentBookings = Booking::where('user_id', $userId)
            ->whereDate('date', '>=', now()->toDateString())
            ->orderBy('date', 'asc')
            ->get();

        // Past Bookings (before today)
        $pastBookings = Booking::where('user_id', $userId)
            ->whereDate('date', '<', now()->toDateString())
            ->orderBy('date', 'desc')
            ->get();

        // Current (active) Packages
        $currentPackages = CustomPackage::where('user_id', $userId)
            ->where('status', 'active')
            ->get();

        // Past (inactive) Packages
        $pastPackages = CustomPackage::where('user_id', $userId)
            ->where('status', 'inactive')
            ->get();

        return view('user.bookings', compact(
            'currentBookings',
            'pastBookings',
            'currentPackages',
            'pastPackages'
        ));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\CustomPackage;
use App\Models\FixedBooking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserBookingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userEmail = $user->email;

        // Current Bookings (today or future)
        $currentBookings = Booking::where('email', $userEmail)
            ->whereDate('date', '>=', now()->toDateString())
            ->orderBy('date', 'asc')
            ->get();

        // Past Bookings (before today)
        $pastBookings = Booking::where('email', $userEmail)
            ->whereDate('date', '<', now()->toDateString())
            ->orderBy('date', 'desc')
            ->get();

        // Current (active) Packages
        $currentPackages = CustomPackage::where('user_id', $user->id)
            ->where('status', 'active')
            ->get();

        // Past (inactive) Packages
        $pastPackages = CustomPackage::where('user_id', $user->id)
            ->where('status', 'inactive')
            ->get();

        // Current Fixed Bookings
        $currentFixedBookings = FixedBooking::where('user_id', $user->id)
            ->where('status', '!=', 'cancelled')
            ->orderBy('created_at', 'desc')
            ->get();

        // Past Fixed Bookings
        $pastFixedBookings = FixedBooking::where('user_id', $user->id)
            ->where('status', 'cancelled')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.bookings', compact(
            'currentBookings',
            'pastBookings',
            'currentPackages',
            'pastPackages',
            'currentFixedBookings',
            'pastFixedBookings'
        ));
    }




    public function show($id)
   {
    $user = Auth::user();
    $booking = Booking::where('email', $user->email)->findOrFail($id);
    return view('user.bookings_show', compact('booking'));
   }



    public function destroy($id)
{
    $user = Auth::user();
    $booking = Booking::where('email', $user->email)->findOrFail($id);
    $booking->status = 'cancelled';
    $booking->save();

    return redirect()->back()->with('success', 'Booking has been cancelled successfully.');
}

public function rebook($id)
{
    $user = Auth::user();
    $oldBooking = Booking::where('email', $user->email)->findOrFail($id);

    $newBooking = $oldBooking->replicate(); // clone old booking
    $newBooking->status = 'pending';
    $newBooking->date = now()->addDays(7)->format('Y-m-d'); // example: rebook for 7 days later
    $newBooking->created_at = now();
    $newBooking->updated_at = now();
    $newBooking->save();

    return redirect()->back()->with('success', 'Your booking has been rebooked successfully.');
}

 public function forceDelete($id)
    {
        $user = Auth::user();
        $booking = Booking::where('email', $user->email)->findOrFail($id);

        if (!in_array(strtolower($booking->status), ['cancelled', 'completed'])) {
            return redirect()->back()->with('error', 'Only cancelled or completed bookings can be deleted.');
        }

        $booking->delete();

        return redirect()->route('user.bookings')->with('success', 'Booking deleted successfully.');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\CustomPackage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

    

   
    public function show($id)
   {
    $booking = Booking::findOrFail($id);
    return view('user.bookings_show', compact('booking'));
   }



    public function destroy($id)
{
    $booking = Booking::findOrFail($id);
    $booking->status = 'cancelled';
    $booking->save();

    return redirect()->back()->with('success', 'Booking has been cancelled successfully.');
}

public function rebook($id)
{
    $oldBooking = Booking::findOrFail($id);

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
        $booking = Booking::findOrFail($id);

        if (!in_array(strtolower($booking->status), ['cancelled', 'completed'])) {
            return redirect()->back()->with('error', 'Only cancelled or completed bookings can be deleted.');
        }

        $booking->delete();

        return redirect()->route('user.bookings')->with('success', 'Booking deleted successfully.');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FixedBooking;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;

class FixedBookingController extends Controller
{
    public function reserve($packageId)
    {
        $package = Package::findOrFail($packageId);
        return view('fixedbooking.reserve', compact('package'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:packages,id',
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'phone'      => 'required|string|max:30',
            'pickup_location' => 'required|string|max:255',
            'payment_method'  => 'required|string|max:50',
            'participants'    => 'required|integer|min:1',
            'receipt'         => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $package = Package::findOrFail($request->package_id);
        $participants = $request->input('participants', 1);
        $totalPrice = $package->price * $participants;

        // Handle receipt upload
        $receiptPath = null;
        if ($request->hasFile('receipt')) {
            $receiptPath = $request->file('receipt')->store('receipts', 'public');
        }

        $booking = FixedBooking::create([
            'package_id' => $package->id,
            'package_name' => $package->package_name, // Add package name
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'pickup_location' => $request->pickup_location,
            'payment_method'  => $request->payment_method,
            'receipt'         => $receiptPath,
            'participants'    => $participants,
            'total_price'     => $totalPrice,
            'user_id'         => auth()->id(),
            'status'          => 'pending',
        ]);

        return redirect()->route('account')->with('success', 'Booking created successfully!');
    }
}
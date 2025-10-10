<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FixedBooking;
use App\Models\Package;

class FixedBookingController extends Controller
{
    /**
     * Show booking form for a selected package
     */
    public function reserve($packageId)
    {
        $package = Package::findOrFail($packageId);
        return view('fixedbooking.reserve', compact('package'));
    }

    /**
     * Handle booking submission
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'pickup_location' => 'required|string',
            'payment_method' => 'required|string',
            'receipt' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // ✅ Handle file upload (if receipt is provided)
        if ($request->hasFile('receipt')) {
            $validated['receipt'] = $request->file('receipt')->store('fixedbookings/receipts', 'public');
        }

        // ✅ Attach logged-in user ID & booking status
        $validated['user_id'] = auth()->id();
$validated['status'] = 'pending';

FixedBooking::create($validated);


        // ✅ Redirect safely (no 404)
        return redirect('/')
            ->with('success', 'Your booking request has been sent successfully and is now pending admin approval.');
    }
}

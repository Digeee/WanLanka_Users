@extends('layouts.app')

@section('content')
<div class="container-fluid py-5 bg-light min-vh-100">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            <div class="card shadow-lg border-0 rounded-3">
                
                <!-- Header -->
                <div class="card-header bg-primary text-white rounded-top">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-1">Booking #{{ $booking->id }}</h3>
                            <small>Booked on: {{ $booking->created_at->format('d M, Y H:i') }}</small>
                        </div>
                        <span class="badge fs-6 py-2 px-3 
                            bg-{{ $booking->status == 'cancelled' ? 'danger' : ($booking->status == 'completed' ? 'success' : 'warning') }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </div>
                </div>

                <!-- Body -->
                <div class="card-body p-5">
                    <!-- Pickup & Drop -->
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <h5 class="fw-bold">Pickup Details</h5>
                            <ul class="list-unstyled mb-0">
                                <li><strong>District:</strong> {{ $booking->pickup_district }}</li>
                                <li><strong>Location:</strong> {{ $booking->pickup_location ?? 'N/A' }}</li>
                                <li><strong>Date & Time:</strong> {{ $booking->date }} at {{ $booking->time }}</li>
                            </ul>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h5 class="fw-bold">Drop-off Details</h5>
                            <ul class="list-unstyled mb-0">
                                <li><strong>District:</strong> {{ $booking->drop_district ?? 'N/A' }}</li>
                                <li><strong>Location:</strong> {{ $booking->drop_location ?? 'N/A' }}</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Vehicle & Driver -->
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <h5 class="fw-bold">Vehicle Info</h5>
                            <ul class="list-unstyled mb-0">
                                <li><strong>Type:</strong> {{ $booking->vehicle_type ?? 'N/A' }}</li>
                                <li><strong>Driver:</strong> {{ $booking->driver_name ?? 'N/A' }}</li>
                            </ul>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h5 class="fw-bold">Driver Contact</h5>
                            <ul class="list-unstyled mb-0">
                                <li><strong>Phone:</strong> {{ $booking->driver_contact ?? 'N/A' }}</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Payment Info -->
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <h5 class="fw-bold">Payment Info</h5>
                            <ul class="list-unstyled mb-0">
                                <li><strong>Amount:</strong> Rs. {{ number_format($booking->amount, 2) }}</li>
                                <li><strong>Method:</strong> {{ ucfirst($booking->payment_method ?? 'N/A') }}</li>
                            </ul>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h5 class="fw-bold">Payment Status</h5>
                            <span class="badge fs-6 py-2 px-3 
                                bg-{{ $booking->payment_status == 'paid' ? 'success' : 'secondary' }}">
                                {{ ucfirst($booking->payment_status ?? 'Unpaid') }}
                            </span>
                        </div>
                    </div>

                    <!-- User Info -->
                    <div class="mb-4">
                        <h5 class="fw-bold">User Information</h5>
                        <ul class="list-unstyled mb-0">
                            <li><strong>Name:</strong> {{ $booking->user->name ?? 'N/A' }}</li>
                            <li><strong>Email:</strong> {{ $booking->user->email ?? 'N/A' }}</li>
                            <li><strong>Phone:</strong> {{ $booking->user->phone ?? 'N/A' }}</li>
                            <li><strong>Address:</strong> {{ $booking->user->address ?? 'N/A' }}</li>
                        </ul>
                    </div>
                </div>

                <!-- Footer Buttons -->
                <div class="card-footer d-flex justify-content-between bg-light border-top">
                    <!-- Back Button: always works -->
                    <a href="{{ route('user.bookings') }}" class="btn btn-outline-secondary btn-lg">
                        &larr; Back
                    </a>

                    <div class="d-flex gap-2">
                        <!-- Cancel Booking -->
                        @if($booking->status !== 'cancelled')
                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this booking?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-lg">
                                Cancel Booking
                            </button>
                        </form>
                        @endif

                        <!-- Delete Booking (for cancelled or completed) -->
                        @if(strtolower($booking->status) === 'cancelled' || strtolower($booking->status) === 'completed')
                        <form action="{{ route('userbookings.forceDelete', $booking->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this booking permanently?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-lg">
                                Delete
                            </button>
                        </form>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

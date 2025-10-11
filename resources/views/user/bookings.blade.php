@extends('layouts.app')

@section('content')
<style>
    /* 🌟 Clean & Modern Look */
    html, body {
        height: 100%;
        margin: 0;
        background: #f8f9fc;
        font-family: "Poppins", sans-serif;
        display: flex;
        flex-direction: column;
    }

    main {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    h2 {
        font-weight: 700;
        color: #2c3e50;
    }

    /* 🌟 Heading */
    .main-heading {
        text-align: center;
        margin-top: 40px;
        margin-bottom: 25px;
    }

    .main-heading hr {
        width: 100px;
        height: 3px;
        background-color: #007bff;
        border: none;
        margin: 12px auto 0 auto;
    }

    /* 🌟 Tabs */
    .nav-tabs {
        justify-content: center;
        border-bottom: 2px solid #dee2e6;
        margin-bottom: 35px;
    }

    .nav-tabs .nav-link {
        font-weight: 600;
        color: #555;
        border: none;
        border-bottom: 3px solid transparent;
        transition: all 0.3s ease;
        padding: 10px 25px;
    }

    .nav-tabs .nav-link:hover {
        color: #007bff;
        border-color: #007bff;
        background: #f9fbfd;
    }

    .nav-tabs .nav-link.active {
        color: #007bff;
        border-bottom: 3px solid #007bff;
        background-color: transparent;
    }

    /* 🌟 Cards */
    .card {
        border: none;
        border-radius: 14px;
        background: #fff;
        transition: 0.3s ease;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    }

    .card-body {
        padding: 1.8rem;
    }

    .booking-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .booking-title {
        font-weight: 600;
        font-size: 1.2rem;
    }

    .btn-custom {
        font-weight: 500;
        border-radius: 8px;
        padding: 6px 14px;
        transition: all 0.3s ease;
    }

    .btn-custom:hover {
        transform: translateY(-2px);
    }

    .text-muted {
        text-align: center;
        margin-top: 3rem;
        font-style: italic;
        color: #999 !important;
    }

    /* Animation */
    .tab-pane {
        animation: fadeIn 0.4s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* 🌙 Footer Styling */
    footer {
        background: #0d6efd;
        color: #fff;
        text-align: center;
        padding: 15px 0;
        font-size: 0.95rem;
        margin-top: auto;
    }

    footer a {
        color: #fff;
        text-decoration: underline;
        transition: color 0.2s;
    }

    footer a:hover {
        color: #cfe2ff;
    }
</style>

<main>
    <div class="container-fluid px-5 py-4">
        <!-- 🌟 Main Heading -->
        <div class="main-heading">
            <h2>My Bookings & Packages</h2>
            <hr>
        </div>

        <!-- 🌟 Tabs Navigation -->
        <ul class="nav nav-tabs" id="bookingTabs" role="tablist">
            <li class="nav-item"><a class="nav-link active" id="currentBooking-tab" data-bs-toggle="tab" href="#currentBooking">🚗 Current Bookings</a></li>
            <li class="nav-item"><a class="nav-link" id="pastBooking-tab" data-bs-toggle="tab" href="#pastBooking">📅 Past Bookings</a></li>
            <li class="nav-item"><a class="nav-link" id="currentPackage-tab" data-bs-toggle="tab" href="#currentPackage">💼 Current Packages</a></li>
            <li class="nav-item"><a class="nav-link" id="pastPackage-tab" data-bs-toggle="tab" href="#pastPackage">📦 Past Packages</a></li>
        </ul>

        <!-- 🌟 Tab Content -->
        <div class="tab-content mt-4">
            {{-- 🚗 Current Bookings --}}
            <div class="tab-pane fade show active" id="currentBooking">
                @forelse($currentBookings as $booking)
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="booking-header mb-2">
                                <h5 class="booking-title text-primary">{{ $booking->pickup_district }}</h5>
                                <span class="badge bg-warning text-dark">{{ ucfirst($booking->status) }}</span>
                            </div>
                            <p class="text-muted mb-1"><strong>Date:</strong> {{ $booking->date }}</p>
                            <p class="text-muted"><strong>Time:</strong> {{ $booking->time }}</p>
                            <div class="text-end mt-3">
                                <div class="text-end mt-3">
                                <!-- ✅ View Button -->
                                <a href="{{ route('bookings.show', $booking->id) }}" class="btn btn-outline-primary btn-custom">
                                    View
                                </a>
                {{-- 🗑️ Delete Button (only if cancelled or completed) --}}
@if(in_array(strtolower($booking->status), ['cancelled', 'completed']))
    <form action="{{ route('userbookings.forceDelete', $booking->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-danger btn-sm"
            onclick="return confirm('Are you sure you want to delete this {{ strtolower($booking->status) }} booking permanently?')">
            Delete
        </button>
    </form>
@endif

                            
                            </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">No current bookings available.</p>
                @endforelse
            </div>

            {{-- 📅 Past Bookings --}}
            <div class="tab-pane fade" id="pastBooking">
                @forelse($pastBookings as $booking)
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="booking-header mb-2">
                                <h5 class="booking-title text-success">{{ $booking->pickup_district }}</h5>
                                <span class="badge bg-success">{{ ucfirst($booking->status) }}</span>
                            </div>
                            <p class="text-muted mb-1"><strong>Date:</strong> {{ $booking->date }}</p>
                            <p class="text-muted"><strong>Time:</strong> {{ $booking->time }}</p>
                            <div class="text-end mt-3">
                               <form action="{{ route('userbookings.rebook', $booking->id) }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-outline-primary btn-custom">
        Rebook
    </button>
</form>
{{-- 🗑️ Delete Button (only if cancelled or completed) --}}
@if(in_array(strtolower($booking->status), ['cancelled', 'completed']))
    <form action="{{ route('userbookings.forceDelete', $booking->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-danger btn-sm"
            onclick="return confirm('Are you sure you want to delete this {{ strtolower($booking->status) }} booking permanently?')">
            Delete
        </button>
    </form>
@endif


                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">No past bookings found.</p>
                @endforelse
            </div>

            {{-- 💼 Current Packages --}}
            <div class="tab-pane fade" id="currentPackage">
                @forelse($currentPackages as $package)
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="booking-header mb-2">
                                <h5 class="booking-title text-primary">{{ $package->title }}</h5>
                                <span class="badge bg-primary">Active</span>
                            </div>
                            <p class="text-muted mb-2">{{ $package->description }}</p>
                            <p class="fw-semibold text-dark"><strong>Price:</strong> LKR {{ number_format($package->price, 2) }}</p>
                            <div class="text-end mt-3">
                                <button class="btn btn-outline-primary btn-custom">View Details</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">No active packages available.</p>
                @endforelse
            </div>

            {{-- 📦 Past Packages --}}
            <div class="tab-pane fade" id="pastPackage">
                @forelse($pastPackages as $package)
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="booking-header mb-2">
                                <h5 class="booking-title text-secondary">{{ $package->title }}</h5>
                                <span class="badge bg-secondary">Inactive</span>
                            </div>
                            <p class="text-muted mb-2">{{ $package->description }}</p>
                            <p class="fw-semibold text-dark"><strong>Price:</strong> LKR {{ number_format($package->price, 2) }}</p>
                            <div class="text-end mt-3">
                                <button class="btn btn-outline-success btn-custom">Renew Package</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">No past packages found.</p>
                @endforelse
            </div>
        </div>
    </div>
</main>


@endsection

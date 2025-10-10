@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Bookings</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Package</th>
                <th>Participants</th>
                <th>Vehicle</th>
                <th>Total Price</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach(auth()->user()->bookings as $booking)
            <tr>
                <td>{{ $booking->package->package_name }}</td>
                <td>{{ $booking->participants }}</td>
                <td>{{ $booking->vehicle_type ?? 'None' }}</td>
                <td>{{ $booking->total_price }}</td>
                <td>{{ ucfirst($booking->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

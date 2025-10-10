@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Book: {{ $package->package_name }}</h2>

    <div class="card shadow-lg">
        <div class="card-body">
            <form action="{{ route('book.store', $package->id) }}" method="POST">
                @csrf

                {{-- Participants --}}
                <div class="mb-3">
                    <label for="participants" class="form-label">Number of Participants</label>
                    <input type="number" name="participants" id="participants"
                           class="form-control @error('participants') is-invalid @enderror"
                           value="{{ old('participants', 1) }}" min="1">
                    @error('participants')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Days --}}
                <div class="mb-3">
                    <label for="days" class="form-label">Number of Days</label>
                    <input type="number" name="days" id="days"
                           class="form-control @error('days') is-invalid @enderror"
                           value="{{ old('days', $package->days ?? 1) }}" min="1">
                    @error('days')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Vehicle --}}
                <div class="mb-3">
                    <label for="vehicle_type" class="form-label">Vehicle</label>
                    <select name="vehicle_type" id="vehicle_type"
                            class="form-select @error('vehicle_type') is-invalid @enderror">
                        <option value="none">No Vehicle</option>
                        <option value="car">Car (Rs. 5000/day)</option>
                        <option value="van">Van (Rs. 8000/day)</option>
                        <option value="bike">Bike (Rs. 3000/day)</option>
                        <option value="auto">Auto (Rs. 4000/day)</option>
                    </select>
                    @error('vehicle_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Guide --}}
                <div class="mb-3 form-check">
                    <input type="checkbox" name="with_guide" id="with_guide" value="1"
                           class="form-check-input" {{ old('with_guide') ? 'checked' : '' }}>
                    <label for="with_guide" class="form-check-label">Add Guide (Rs. 3000/day)</label>
                </div>

                {{-- Payment Method --}}
                <div class="mb-3">
                    <label for="payment_method" class="form-label">Payment Method</label>
                    <select name="payment_method" id="payment_method"
                            class="form-select @error('payment_method') is-invalid @enderror">
                        <option value="online">Online</option>
                        <option value="cash">Cash</option>
                    </select>
                    @error('payment_method')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Notes --}}
                <div class="mb-3">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea name="notes" id="notes" rows="3" class="form-control">{{ old('notes') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Confirm Booking</button>
            </form>
        </div>
    </div>
</div>
@endsection

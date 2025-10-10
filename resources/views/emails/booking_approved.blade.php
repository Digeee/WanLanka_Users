<h2>Hi {{ $booking->full_name }},</h2>
<p>Your booking for <strong>{{ $booking->place->name ?? 'the place' }}</strong> on <strong>{{ $booking->date }}</strong> has been <strong>approved</strong>.</p>
<p>Pickup Location: {{ $booking->pickup_location }}</p>
<p>Thank you for booking with us!</p>

<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <input type="email" name="email" placeholder="Your email" required>
    <button type="submit">Send OTP</button>
</form>

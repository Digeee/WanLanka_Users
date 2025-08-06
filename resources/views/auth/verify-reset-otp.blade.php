<form method="POST" action="{{ route('password.otp.verify') }}">
    @csrf
    <input type="text" name="otp" placeholder="Enter OTP" required>
    <button type="submit">Verify OTP</button>
</form>

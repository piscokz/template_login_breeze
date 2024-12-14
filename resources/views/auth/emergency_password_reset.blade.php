<form method="POST" action="{{ route('emergency.password.reset') }}">
    @csrf
    <div>
        <label>Email</label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label>Emergency Password</label>
        <input type="password" name="emergency_password" required>
    </div>
    <div>
        <label>New Password</label>
        <input type="password" name="new_password" required>
    </div>
    <div>
        <label>Confirm New Password</label>
        <input type="password" name="new_password_confirmation" required>
    </div>
    <button type="submit">Reset Password</button>
</form>

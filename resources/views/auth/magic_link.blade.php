<form method="POST" action="{{ route('magic.link.send') }}">
    @csrf
    <div>
        <label>Email</label>
        <input type="email" name="email" required>
    </div>
    <button type="submit">Kirim Magic Link</button>
</form>

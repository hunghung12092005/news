<!-- resources/views/auth/forgot-password.blade.php -->
<form action="{{ route('password.email') }}" method="POST">
    @csrf
    <label for="email">Địa chỉ email:</label>
    <input type="email" name="email" required>
    <button type="submit">Gửi mã OTP</button>

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    @if (session('status'))
        <div>{{ session('status') }}</div>
    @endif
</form>
<!-- resources/views/auth/forgot-password.blade.php -->
{{-- <form action="{{ route('password.email') }}" method="POST">
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
</form> --}}
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="form-container">
        <div class="logo-container">
            Forgot Password
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="form" action="{{ route('password.email') }}" method="POST">

            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Enter your email" required="">
            </div>

            <button class="form-submit-btn" type="submit">Send Email</button>
        </form>

        <p class="signup-link">
            Don't have an account?
            <a href="#" class="signup-link link"> Sign up now</a>
        </p>
    </div>
</body>

<style>
    .form-container {
        max-width: 400px;
        margin: 100 auto;
        background-color: #fff;
        padding: 50px 24px;
        font-size: 14px;
        font-family: inherit;
        color: #212121;
        display: flex;
        flex-direction: column;
        gap: 20px;
        box-sizing: border-box;
        border-radius: 10px;
        box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.084), 0px 2px 3px rgba(0, 0, 0, 0.168);
    }

    .form-container button:active {
        scale: 0.95;
    }

    .form-container .logo-container {
        text-align: center;
        font-weight: 600;
        font-size: 18px;
    }

    .form-container .form {
        display: flex;
        flex-direction: column;
    }

    .form-container .form-group {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .form-container .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-container .form-group input {
        width: 100%;
        padding: 12px 16px;
        border-radius: 6px;
        font-family: inherit;
        border: 1px solid #ccc;
    }

    .form-container .form-group input::placeholder {
        opacity: 0.5;
    }

    .form-container .form-group input:focus {
        outline: none;
        border-color: #1778f2;
    }

    .form-container .form-submit-btn {
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: inherit;
        color: #fff;
        background-color: #212121;
        border: none;
        width: 100%;
        padding: 12px 16px;
        font-size: inherit;
        gap: 8px;
        margin: 12px 0;
        cursor: pointer;
        border-radius: 6px;
        box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.084), 0px 2px 3px rgba(0, 0, 0, 0.168);
    }

    .form-container .form-submit-btn:hover {
        background-color: #313131;
    }

    .form-container .link {
        color: #1778f2;
        text-decoration: none;
    }

    .form-container .signup-link {
        align-self: center;
        font-weight: 500;
    }

    .form-container .signup-link .link {
        font-weight: 400;
    }

    .form-container .link:hover {
        text-decoration: underline;
    }
</style>

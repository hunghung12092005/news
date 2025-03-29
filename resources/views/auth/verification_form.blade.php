{{-- <div class="container">
    <h2>Xác minh OTP</h2>

    <form id="otp-form">
        @csrf
        <label for="otp">Nhập mã OTP:</label>
        <input type="text" name="otp" required class="form-control">
        <input type="hidden" name="email" value="{{ $email }}">

        <button type="submit">Xác minh OTP</button>

        <div id="response-message" class="mt-3"></div>
    </form>
</div> --}}

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    /* From Uiverse.io by NelsonDJCR */

    .form-card {
        margin: 50 auto;
        width: 280px;
        height: 350px;
        border-radius: 1.2rem;
        background-color: #fff;
        padding: 1.3rem;
        color: red;
        text-align: center;
        position: relative;
    }

    .form-card-title {
        font-size: 1.6rem;
        margin-bottom: 0.6rem;
        margin-top: 0.2rem;
    }

    .form-card-prompt {
        margin-bottom: 2rem;
        font-size: 14px;
    }

    /* hard reset */
    .form-card-input {
        all: unset;
    }

    .form-card-input-wrapper {
        position: relative;
        width: 100%;
        height: 3rem;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin-bottom: 1rem;
    }

    .form-card-input {
        /* margin-left: 10px;
        padding: 2px; */
        font-size: 1.1rem;
        font-weight: bold;
        letter-spacing: 1.5rem;
        text-align: start;
        -webkit-transform: translateX(36px);
        -ms-transform: translateX(36px);
        transform: translateX(36px);
        position: absolute;
        z-index: 3;
        background-color: transparent;
    }

    .form-card-input-bg {
        content: '';
        width: 240px;
        height: 60px;
        margin: auto;
        inset: 0;
        bottom: 10px;
        position: absolute;
        z-index: 1;
        border-radius: 12px;
        background-color: rgba(206, 206, 206, 0.664);
    }

    .call-again {
        color: #5e5e5e;
        font-size: 14px;
    }

    .call-again:hover {
        cursor: pointer;
    }

    .underlined {
        text-decoration: underline;
    }

    .form-card-submit {
        position: absolute;
        width: 180px;
        margin: auto;
        color: red;
        border: none;
        background-color: #212121;
        font-size: 1.2rem;
        border-radius: 0.8rem;
        padding: 0.8rem 3.5rem;
        bottom: 2rem;
        left: 0;
        right: 0;
        -webkit-transition: 200ms ease-in-out;
        transition: 200ms ease-in-out;
    }

    .form-card-submit:hover {
        cursor: pointer;
        opacity: 0.8;
    }

    .form-card-submit:active {
        opacity: 0.9;
        -webkit-transform: scale(95%);
        -ms-transform: scale(95%);
        transform: scale(95%);
    }

    #uuid-d8a0d861-3741-4013 {
        width: auto;
        height: 500px;
    }

    @-webkit-keyframes scale-out {

        0%,
        15%,
        100% {
            color: #fff;
            -webkit-transform: scale(72%);
            transform: scale(72%);
        }

        16%,
        98% {
            color: rgba(255, 255, 255, 0.295);
            -webkit-transform: scale(100%);
            transform: scale(100%);
        }
    }

    @keyframes scale-out {

        0%,
        15%,
        100% {
            color: #fff;
            -webkit-transform: scale(72%);
            transform: scale(72%);
        }

        16%,
        98% {
            color: rgba(255, 255, 255, 0.295);
            -webkit-transform: scale(100%);
            transform: scale(100%);
        }
    }

    @-webkit-keyframes shine {
        to {
            background-position: 200% center;
        }
    }

    @keyframes shine {
        to {
            background-position: 200% center;
        }
    }
</style>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div id="response-message" class="div">

</div>
<form class="form-card" id="otp-form">
    @csrf
    <p class="form-card-title">We're sending gmail to confirm it</p>
    <p class="form-card-prompt">Enter last 6 digits of the number we are sending you from</p>
    <input type="hidden" name="email" value="{{ $email }}">
    <div class="form-card-input-wrapper">
        <input class="form-card-input" name="otp" placeholder="------" maxlength="6" type="tel">
        <div class="form-card-input-bg"></div>
    </div>
    <p class="call-again"><span class="underlined">send again</span> in 1:00s </p>

</form>






<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#otp-form').on('submit', function(e) {
            e.preventDefault(); // Ngăn chặn hành vi mặc định của form

            $.ajax({
                url: '{{ route('otp.verify.submit') }}', // Route để xử lý yêu cầu
                type: 'POST',
                data: $(this).serialize(), // Lấy dữ liệu từ form
                success: function(response) {
                    if (response.success) {
                        $('#response-message').html(
                            '<div class="alert alert-warning alert-dismissible fade show" role="alert">' +
                            '<strong>OTP Success!</strong> Đang Chuyển Hướng.' +
                            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                            '</div>'
                        );

                        // Chuyển hướng đến trang nhập mật khẩu mới
                        setTimeout(function() {
                            window.location.href = '/reset-password/' + response
                                .token + '?email=' + encodeURIComponent(response
                                    .email); // Sử dụng token và email từ phản hồi
                        }, 2000);
                    } else {
                        $('#response-message').html(
                            '<div class="alert alert-danger" role="alert">' +
                            'Mã OTP không chính xác.' +
                            '</div>');
                    }
                },
                error: function(xhr) {
                    // Xử lý lỗi
                    let errors = xhr.responseJSON.errors;
                    let errorMessage = '<div class="alert alert-danger"><ul>';
                    $.each(errors, function(key, value) {
                        errorMessage += '<li>' + value[0] + '</li>';
                    });
                    errorMessage += '</ul></div>';
                    $('#response-message').html(errorMessage);
                }
            });
        });
    });
</script>

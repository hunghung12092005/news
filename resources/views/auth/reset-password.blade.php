<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<div class="container">
    <h2>Đặt lại mật khẩu</h2>

    <form id="reset-password-form">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" required value="{{ $email }}">
        
        <div class="form-group">
            <label for="new_password">Mật khẩu mới:</label>
            <input type="password" name="new_password" required class="form-control" id="new_password">
        </div>

        <div class="form-group">
            <label for="new_password_confirmation">Xác nhận mật khẩu:</label>
            <input type="password" name="new_password_confirmation" required class="form-control" id="new_password_confirmation">
        </div>

        <button type="submit" class="btn btn-primary m-2">Đặt lại mật khẩu</button>
    </form>

    <div id="response-message" class="mt-3"></div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#reset-password-form').on('submit', function(e) {
            e.preventDefault(); // Ngăn chặn hành vi mặc định của form

            $.ajax({
                url: '{{ route('password.update') }}', // Route để xử lý yêu cầu
                type: 'POST',
                data: $(this).serialize(), // Lấy dữ liệu từ form
                success: function(response) {
                    // Xử lý phản hồi thành công
                    $('#response-message').html(
                            '<div class="alert alert-warning alert-dismissible fade show" role="alert">' +
                            '<strong>Thay đổi mk thành công!</strong> Đang Chuyển Hướng.' +
                            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                            '</div>'
                        );
                    setTimeout(function() {
                            window.location.href = '/'; // Sử dụng token và email từ phản hồi
                    }, 3000);
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

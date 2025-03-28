<div class="container">
    <h2>Xác minh OTP</h2>

    <form id="otp-form">
        @csrf
        <label for="otp">Nhập mã OTP:</label>
        <input type="text" name="otp" required class="form-control">
        <input type="hidden" name="email" value="{{ $email }}">

        <button type="submit">Xác minh OTP</button>

        <div id="response-message" class="mt-3"></div>
    </form>
</div>

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
                            '<div class="alert alert-success">Xác minh thành công!</div>'
                        );

                        // Chuyển hướng đến trang nhập mật khẩu mới
                        setTimeout(function() {
                            window.location.href = '/reset-password/' + response
                                .token + '?email=' + encodeURIComponent(response
                                    .email); // Sử dụng token và email từ phản hồi
                        }, 2000);
                    } else {
                        $('#response-message').html('<div class="alert alert-danger">' +
                            response.error + '</div>');
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

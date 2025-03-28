<!DOCTYPE html>
<html>
<head>
    <title>Test Email</title>
    <style>
        .button {
            background-color: #4CAF50; /* Màu nền */
            color: white; /* Màu chữ */
            padding: 10px 20px; /* Khoảng cách */
            text-align: center; /* Căn giữa */
            text-decoration: none; /* Bỏ gạch dưới */
            display: inline-block; /* Hiển thị inline block */
            font-size: 16px; /* Kích thước chữ */
            margin: 4px 2px; /* Khoảng cách */
            cursor: pointer; /* Con trỏ chuột */
            border-radius: 5px; /* Bo góc */
        }
    </style>
</head>
<body>
    <h1>Chào {{ $data['name'] }},</h1>
    <p>Cảm ơn bạn đã liên hệ với chúng tôi!</p>
    <p>Chúng tôi rất vui mừng thông báo rằng bạn đã được đăng ký thành công nhận mã ưu đãi.</p>    
    <!-- Nút -->
    <a href="{{ route('email.confirm', ['email' => $data['email']]) }}" class="button">Xác nhận bạn là người</a>
    <p>Trân trọng,<br>Đội ngũ hỗ trợ khách hàng</p>
</body>
</html>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chào mừng đến với GS7</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <div style="background-color: #f8f9fa; border-radius: 8px; padding: 30px;">
        <h2 style="color: #4f46e5; margin-top: 0;">Chào mừng bạn đến với GS7!</h2>

        <p>Xin chào <strong>{{ $userData['name'] }}</strong>,</p>

        <p>Cảm ơn bạn đã đăng ký tài khoản tại hệ thống tìm kiếm gia sư GS7.</p>

        <div style="background-color: #ffffff; border-radius: 6px; padding: 15px; margin: 15px 0;">
            <p style="margin: 5px 0;"><strong>Họ tên:</strong> {{ $userData['name'] }}</p>
            <p style="margin: 5px 0;"><strong>Email:</strong> {{ $userData['email'] }}</p>
            <p style="margin: 5px 0;"><strong>Vai trò:</strong> {{ $userData['role'] === 'teacher' ? 'Gia sư' : 'Phụ huynh / Người dùng' }}</p>
        </div>

        @if($userData['role'] === 'teacher')
            <p>Tài khoản gia sư của bạn đang chờ được phê duyệt bởi quản trị viên. Bạn sẽ nhận được thông báo khi hồ sơ được duyệt.</p>
        @else
            <p>Bạn có thể đăng nhập ngay và bắt đầu tìm kiếm gia sư phù hợp.</p>
        @endif

        <hr style="border: none; border-top: 1px solid #e5e7eb; margin: 20px 0;">
        <p style="font-size: 12px; color: #6b7280;">GS7 - Tìm Kiếm Gia Sư</p>
    </div>
</body>
</html>

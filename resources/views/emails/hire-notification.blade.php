<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yêu cầu thuê gia sư mới</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <div style="background-color: #f8f9fa; border-radius: 8px; padding: 30px;">
        <h2 style="color: #4f46e5; margin-top: 0;">Yêu cầu thuê gia sư mới</h2>

        <p>Bạn nhận được yêu cầu thuê mới từ <strong>{{ $jobData['user_name'] }}</strong>.</p>

        <div style="background-color: #ffffff; border-radius: 6px; padding: 15px; margin: 15px 0;">
            <p style="margin: 5px 0;"><strong>Môn học:</strong> {{ $jobData['subject'] }}</p>
            <p style="margin: 5px 0;"><strong>Lớp:</strong> {{ $jobData['class'] }}</p>
        </div>

        <p>Vui lòng đăng nhập để xác nhận.</p>

        <hr style="border: none; border-top: 1px solid #e5e7eb; margin: 20px 0;">
        <p style="font-size: 12px; color: #6b7280;">GS7 - Tìm Kiếm Gia Sư</p>
    </div>
</body>
</html>

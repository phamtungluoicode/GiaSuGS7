<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gia sư đã đồng ý dạy</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <div style="background-color: #f8f9fa; border-radius: 8px; padding: 30px;">
        <h2 style="color: #059669; margin-top: 0;">Gia sư đã đồng ý dạy</h2>

        <p>Gia sư <strong>{{ $teacherData['teacher_name'] }}</strong> đã đồng ý dạy bạn.</p>

        <div style="background-color: #ffffff; border-radius: 6px; padding: 15px; margin: 15px 0;">
            <p style="margin: 5px 0;"><strong>Thông tin liên hệ:</strong></p>
            <p style="margin: 5px 0;">Số điện thoại: {{ $teacherData['teacher_phone'] }}</p>
            <p style="margin: 5px 0;">Email: {{ $teacherData['teacher_email'] }}</p>
        </div>

        <hr style="border: none; border-top: 1px solid #e5e7eb; margin: 20px 0;">
        <p style="font-size: 12px; color: #6b7280;">GS7 - Tìm Kiếm Gia Sư</p>
    </div>
</body>
</html>

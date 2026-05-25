<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lại mật khẩu</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f3f4f6; font-family: Arial, Helvetica, sans-serif;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color: #f3f4f6; padding: 40px 0;">
        <tr>
            <td align="center">
                <table role="presentation" width="480" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                    {{-- Header --}}
                    <tr>
                        <td align="center" style="background-color: #4f46e5; padding: 24px;">
                            <h1 style="margin: 0; color: #ffffff; font-size: 24px; font-weight: 800; letter-spacing: -0.5px;">GS7</h1>
                        </td>
                    </tr>

                    {{-- Body --}}
                    <tr>
                        <td style="padding: 32px 24px;">
                            <h2 style="margin: 0 0 16px 0; color: #1f2937; font-size: 20px; font-weight: 700;">
                                Đặt lại mật khẩu
                            </h2>
                            <p style="margin: 0 0 24px 0; color: #4b5563; font-size: 14px; line-height: 1.6;">
                                Bạn đã yêu cầu đặt lại mật khẩu. Nhấn vào link bên dưới để đặt lại mật khẩu:
                            </p>

                            {{-- Button --}}
                            <table role="presentation" cellpadding="0" cellspacing="0" style="margin: 0 auto;">
                                <tr>
                                    <td align="center" style="border-radius: 8px; background-color: #4f46e5;">
                                        <a href="{{ $resetLink }}" target="_blank" style="display: inline-block; padding: 12px 32px; color: #ffffff; font-size: 14px; font-weight: 600; text-decoration: none; border-radius: 8px;">
                                            Đặt lại mật khẩu
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <p style="margin: 24px 0 0 0; color: #6b7280; font-size: 13px; line-height: 1.6;">
                                Nếu bạn không yêu cầu đặt lại mật khẩu, vui lòng bỏ qua email này.
                            </p>

                            <p style="margin: 16px 0 0 0; color: #9ca3af; font-size: 12px; line-height: 1.5;">
                                Nếu nút không hoạt động, sao chép và dán link sau vào trình duyệt:<br>
                                <a href="{{ $resetLink }}" style="color: #4f46e5; word-break: break-all;">{{ $resetLink }}</a>
                            </p>
                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td align="center" style="padding: 16px 24px; border-top: 1px solid #e5e7eb;">
                            <p style="margin: 0; color: #9ca3af; font-size: 12px;">
                                &copy; {{ date('Y') }} GS7 - TutorLink. All rights reserved.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>

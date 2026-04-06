<!DOCTYPE html>
<html>
<head>
    <title>Verification Code</title>
</head>
<body style="font-family: Arial, sans-serif; background: #0f0f1a; color: #ffffff; margin: 0; padding: 0;">
    <div style="max-width: 600px; margin: 40px auto; background: #1a1a2e; padding: 40px; border-radius: 12px; border: 1px solid #ff4444;">
        <h1 style="color: #ff4444; text-align: center;">Your Verification Code</h1>
        <p style="font-size: 18px; text-align: center; margin: 30px 0;">
            Use this code to complete your login:
        </p>
        <div style="font-size: 48px; font-weight: bold; text-align: center; letter-spacing: 10px; color: #ff4444; margin: 30px 0;">
            {{ $code }}
        </div>
        <p style="text-align: center; color: #cccccc;">
            This code expires in 10 minutes.
        </p>
        <p style="text-align: center; font-size: 14px; color: #888888; margin-top: 40px;">
            If you didn't request this, please ignore this email.
        </p>
    </div>
</body>
</html>
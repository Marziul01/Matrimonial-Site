<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Verification Code</title>
</head>
<body>
    <div style="font-family: Arial, sans-serif; font-size: 16px;">
        <h2>Password Reset Request</h2>
        <p>Hello,</p>
        <p>You have requested to reset your password. Please use the following 6-digit verification code to reset your password:</p>
        <p><strong style="font-size: 24px;">{{ $verificationCode }}</strong></p>
        <p>If you did not request a password reset, please ignore this email.</p>
        <p>Thank you,</p>
        <p><strong>{{ config('app.name') }} Team</strong></p>
    </div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <style>
        .email-container {
            font-family: Arial, sans-serif;
            color: #333;
            padding: 20px;
        }
        .email-header {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            text-align: center;
            font-size: 18px;
        }
        .email-body {
            margin-top: 20px;
        }
        .email-footer {
            margin-top: 20px;
            text-align: center;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">Contact Form Submission</div>
        <div class="email-body">
            <p><strong>Name:</strong> {{ $details['name'] }}</p>
            <p><strong>Email:</strong> {{ $details['email'] }}</p>
            <p><strong>Phone Number:</strong> {{ $details['number'] }}</p>
            <p><strong>Message:</strong> {{ $details['message'] }}</p>
        </div>
        <div class="email-footer">
            <p>Thank you for contacting us!</p>
        </div>
    </div>
</body>
</html>

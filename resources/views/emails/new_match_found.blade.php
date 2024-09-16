<!DOCTYPE html>
<html>
<head>
    <title>New Match Found!</title>
</head>
<body>
    <h1>Dear {{ $matchedUser->name }},</h1>
    <p>A new user has submitted their profile, and they match your preferred criteria!</p>

    <p>Here are some details about the new match:</p>
    <ul>
        <li>Gender: {{ $newProfile->gender }}</li>
        <li>Religion: {{ $newProfile->religion }}</li>
        <li>Marital Status: {{ $newProfile->marital_status }}</li>
        <li>Age: {{ \Carbon\Carbon::parse($newProfile->date_of_birth)->age }} years old</li>
        <!-- Add more details as needed -->
    </ul>

    <p>Log in to your account to see more details.</p>

    <p>Best regards,<br>Your Website Team</p>
</body>
</html>

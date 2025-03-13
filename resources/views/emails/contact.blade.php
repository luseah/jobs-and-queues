<!DOCTYPE html>
<html>
<head>
    <title>Contact Message</title>
</head>
<body>
    <h2>Dear {{ $name }},</h2>
    <p>Thank you for reaching out to us! We have received your message:</p>
    <blockquote>{{ $messageBody }}</blockquote>
    <p>We will get back to you shortly.</p>
</body>
</html>

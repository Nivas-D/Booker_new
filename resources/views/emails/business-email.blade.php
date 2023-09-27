<!DOCTYPE html>
<html>
<head>
<style>
        /* Add CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #eee;
            margin: 0;
            padding: 0;
            padding:20px;
        }
        .container {
            
            background:'#fff';
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        p {
            color: #555;
        }
    </style>
    <title>Business Registration Notification</title>
</head>
<body>
<div class="container">
    <p style="font-weight:700;">Dear {{ $mailData['name'] }},</p>
    <p>Thank you for registering your business with us.</p>
    <p>An admin will review your registration, and if necessary, they will contact you for further details.</p>
    <p>If you have any questions, please feel free to contact our support team.</p>
    <p>Best regards,</p>
    <p style="font-weight:700;">Booker Admin</p>
    <div class="container">
</body>
</html>
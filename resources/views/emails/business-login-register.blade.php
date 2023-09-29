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
    <table align="center" width="600" cellpadding="0" cellspacing="0" border="0" style="border-collapse: collapse;">
        <tr>
            <td>
                <p style="font-size: 16px; font-weight: bold;">Account Approval / Confirmation</p>
                <p>Welcome to Booker! Your account is almost ready for use.</p>
                <p>Here are your account details:</p>
                <ul>
                    <li><strong>Email Address:</strong> {{$mailData['email']}}</li>
                    <li><strong>Password:</strong> {{$mailData['password']}}</li>
                </ul>
                <p>Click here the link here to login your business dashboard
                    <a href="{{$mailData['link']}}" target="_blank">Booker</a></p>
                
               
                <p>If you have any questions or need assistance, please don't hesitate to contact our support team at booker@admin.com.</p>
                <p>Thank you for choosing our service.</p>
                <p>Best regards,<br>Booker Admin</p>
            </td>
        </tr>
    </table>
    </div>
</body>
</html>
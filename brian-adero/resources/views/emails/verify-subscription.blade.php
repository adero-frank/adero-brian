<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Confirm Subscription</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f6f9fc;
            padding: 40px 0;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn {
            display: inline-block;
            background-color: #0f172a;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #666;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Confirm your subscription</h2>
        <p>Hello,</p>
        <p>Thank you for subscribing to my newsletter. Please click the button below to verify your email address and
            start receiving updates.</p>

        <a href="{{ route('subscribe.verify', $token) }}" class="btn">Confirm Subscription</a>

        <p style="margin-top: 30px; font-size: 14px;">If you didn't sign up for this, you can safely ignore this email.
        </p>

        <div class="footer">
            &copy; {{ date('Y') }} Brian Adero
        </div>
    </div>
</body>

</html>
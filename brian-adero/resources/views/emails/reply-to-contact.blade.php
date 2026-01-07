<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ $subject }}</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f6f9fc;
            padding: 40px 0;
            margin: 0;
            color: #333;
        }

        .container {
            max-w,
            idth: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .header {
            background-color: #0f172a;
            /* Slate 900 */
            color: #ffffff;
            padding: 30px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 300;
            letter-spacing: 1px;
        }

        .content {
            padding: 40px 30px;
            line-height: 1.6;
            color: #475569;
        }

        .content h2 {
            color: #1e293b;
            font-size: 20px;
            margin-top: 0;
        }

        .footer {
            background-color: #f1f5f9;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #94a3b8;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Brian Adero</h1>
        </div>
        <div class="content">
            {!! $messageContent !!}
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Brian Adero - Advocate. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
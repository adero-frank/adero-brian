<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: sans-serif;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background: #0f172a;
            padding: 20px;
            text-align: center;
            color: white;
        }

        .content {
            padding: 30px 0;
        }

        .footer {
            font-size: 12px;
            color: #888;
            text-align: center;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h3>Brian Adero | Advocate</h3>
        </div>
        <div class="content">
            {!! $messageContent !!}
        </div>
        <div class="footer">
            <p>You are receiving this email because you subscribed to legal insights from Brian Adero.</p>
        </div>
    </div>
</body>

</html>
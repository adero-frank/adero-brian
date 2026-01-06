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
            padding: 30px;
            background: #f8f9fa;
        }

        .field {
            margin-bottom: 20px;
        }

        .label {
            font-weight: bold;
            color: #0f172a;
            margin-bottom: 5px;
        }

        .value {
            color: #555;
        }

        .footer {
            font-size: 12px;
            color: #888;
            text-align: center;
            border-top: 1px solid #eee;
            padding-top: 20px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>New Contact Form Submission</h2>
            <p>From: Brian Adero Website</p>
        </div>
        <div class="content">
            <div class="field">
                <div class="label">Name:</div>
                <div class="value">{{ $name }}</div>
            </div>

            <div class="field">
                <div class="label">Email:</div>
                <div class="value"><a href="mailto:{{ $email }}">{{ $email }}</a></div>
            </div>

            <div class="field">
                <div class="label">Phone:</div>
                <div class="value">{{ $phone }}</div>
            </div>

            <div class="field">
                <div class="label">Message:</div>
                <div class="value">{{ $submissionMessage }}</div>
            </div>
        </div>
        <div class="footer">
            <p>This email was sent from the contact form on your website.</p>
        </div>
    </div>
</body>

</html>
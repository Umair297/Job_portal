<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 40px;
        }

        .header {
            text-align: center;
            color: #3c82eb;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 14px;
            margin: 5px 0;
        }

        .section {
            margin-top: 30px;
        }

        .section h2 {
            font-size: 20px;
            color: #3c82eb;
            margin-bottom: 15px;
            border-bottom: 2px solid #3c82eb;
            padding-bottom: 5px;
        }

        .section p {
            font-size: 14px;
            margin: 0 0 10px;
            line-height: 1.6;
        }

        .line {
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }

        .highlight {
            font-weight: bold;
            color: #3c82eb;
        }

        .content {
            text-align: justify;
        }

        footer {
            text-align: center;
            font-size: 12px;
            color: #aaa;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>{{ $data['name'] }}</h1>
            <p class="highlight">{{ $data['contact'] }}</p>
            <p>{{ $data['website'] }}</p>
        </div>

        <!-- Summary -->
        <div class="section">
            <h2>Summary</h2>
            <p class="content">{{ $data['summary'] }}</p>
        </div>

        <!-- Role -->
        <div class="section">
            <h2>Role</h2>
            <p class="content highlight">{{ $data['role'] }}</p>
        </div>

        <!-- Work Experience -->
        <div class="section">
            <h2>Work Experience</h2>
            <p class="content">{!! nl2br(e($data['work_experience'])) !!}</p>
        </div>

        <!-- Education -->
        <div class="section">
            <h2>Education</h2>
            <p class="content">{!! nl2br(e($data['education'])) !!}</p>
        </div>

        <!-- Additional Information -->
        <div class="section">
            <h2>Additional Information</h2>
            <p class="content">{!! nl2br(e($data['additional_info'])) !!}</p>
        </div>
    </div>

    <footer>
        &copy; {{ now()->year }} Resume Builder. Designed with care.
    </footer>
</body>
</html>

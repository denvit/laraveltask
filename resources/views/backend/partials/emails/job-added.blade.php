<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <div style="width: 100%;">
        <h2>Your job was successfully added!</h2><br>
        <h4>Job details:</h4>
        <p>{{ $title }}</p>
        <p>{{ $description }}</p>
        <br><br>
        <p>You can edit or remove this job on following link: {{ $token }}</p>
        <br><br>
        <p>Your JobBoard.com team.</p>
    </div>
</body>
</html>
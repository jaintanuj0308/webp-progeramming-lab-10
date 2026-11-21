<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application B - Date, Time &amp; Day</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Application B: Current Date, Time &amp; Day</h1>

        <div class="info-box">
            <p><strong>Current Date:</strong> <?php echo date('d F Y'); ?></p>
            <p><strong>Current Time:</strong> <?php echo date('h:i:s A'); ?></p>
            <p><strong>Current Day:</strong> <?php echo date('l'); ?></p>
        </div>

        <a href="index.html" class="btn">Back to Home</a>
    </div>
</body>
</html>

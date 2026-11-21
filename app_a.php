<?php
session_start();

// Handle logout
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    $name = isset($_SESSION['name']) ? $_SESSION['name'] : 'User';
    $start_time = isset($_SESSION['start_time']) ? $_SESSION['start_time'] : time();
    $logout_time = time();
    $duration_seconds = $logout_time - $start_time;

    // Calculate hours, minutes, seconds
    $hours = floor($duration_seconds / 3600);
    $minutes = floor(($duration_seconds % 3600) / 60);
    $seconds = $duration_seconds % 60;

    // Destroy session
    session_unset();
    session_destroy();
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Logged Out</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <h1>Thank You, <?php echo htmlspecialchars($name); ?>!</h1>
            <p>You have been successfully logged out.</p>

            <div class="info-box">
                <p><strong>Session Start Time:</strong> <?php echo date('h:i:s A', $start_time); ?></p>
                <p><strong>Logout Time:</strong> <?php echo date('h:i:s A', $logout_time); ?></p>
                <p><strong>Session Duration:</strong>
                    <?php echo $hours . ' hour(s), ' . $minutes . ' minute(s), ' . $seconds . ' second(s)'; ?>
                </p>
            </div>

            <a href="app_a.php" class="btn">Login Again</a>
            <a href="index.html" class="btn">Back to Home</a>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';

    if ($name === '') {
        $error = 'Please enter your name.';
    } else {
        // Store name and start time in session
        $_SESSION['name'] = $name;
        $_SESSION['start_time'] = time();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application A - Welcome Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php if (isset($_SESSION['name'])): ?>
            <!-- Welcome Page -->
            <div class="session-time">
                Session started at: <?php echo date('h:i:s A', $_SESSION['start_time']); ?>
            </div>

            <h1>Hello, <?php echo htmlspecialchars($_SESSION['name']); ?>!</h1>
            <p>Welcome to the application. You are now logged in.</p>

            <a href="app_a.php?action=logout" class="btn btn-logout">Logout</a>
            <a href="index.html" class="btn">Back to Home</a>
        <?php else: ?>
            <!-- Login Form -->
            <h1>Application A: Welcome Page</h1>
            <p>Enter your name to log in:</p>

            <?php if (isset($error)): ?>
                <p class="error"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>

            <form method="post" action="app_a.php">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
                <button type="submit" class="btn">Submit</button>
            </form>

            <a href="index.html" class="btn">Back to Home</a>
        <?php endif; ?>
    </div>
</body>
</html>

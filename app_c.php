<?php
$result = '';
$result_class = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $age = isset($_POST['age']) ? trim($_POST['age']) : '';

    if ($name === '') {
        $result = 'Please enter your name.';
        $result_class = 'error';
    } elseif ($age === '' || !is_numeric($age) || intval($age) < 0) {
        $result = 'Please enter a valid age.';
        $result_class = 'error';
    } else {
        $age = intval($age);
        if ($age < 18) {
            $result = 'Hello ' . htmlspecialchars($name) . ', you are not authorized to visit the site.';
            $result_class = 'not-authorized';
        } else {
            $result = 'Welcome to this site.';
            $result_class = 'authorized';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application C - Age Authorization</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Application C: Age-Based Authorization</h1>
        <p>Enter your name and age:</p>

        <form method="post" action="app_c.php">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>

            <label for="age">Your Age:</label>
            <input type="number" id="age" name="age" placeholder="Enter your age" min="0" required>

            <button type="submit" class="btn">Submit</button>
        </form>

        <?php if ($result !== ''): ?>
            <div class="result <?php echo $result_class; ?>">
                <p><?php echo $result; ?></p>
            </div>
        <?php endif; ?>

        <a href="index.html" class="btn">Back to Home</a>
    </div>
</body>
</html>

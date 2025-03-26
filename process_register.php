<?php include "inc/head.inc.php"; ?>
<?php
session_start();
$errorMsg = "";
$success = true;

// Function to sanitize input (EXCEPT password)
function sanitize_input($data) {
    $data = trim($data);             
    $data = stripslashes($data);     
    $data = htmlspecialchars($data); 
    return $data;
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Last Name (Required)
    if (empty($_POST["lname"])) {
        $errorMsg .= "Last Name is required.<br>";
        $success = false;
    } else {
        $lname = sanitize_input($_POST["lname"]);
    }

    // Validate Email (Required & Properly Formatted)
    if (empty($_POST["email"])) {
        $errorMsg .= "Email is required.<br>";
        $success = false;
    } else {
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL); // Sanitize input
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // Validate format
            $errorMsg .= "Invalid email format.<br>";
            $success = false;
        }
    }

    // Validate Password (Required, Minimum 8 Characters)
    if (empty($_POST["pwd"])) {
        $errorMsg .= "Password is required.<br>";
        $success = false;
    } else {
        $password = $_POST["pwd"]; // DO NOT sanitize passwords
        if (strlen($password) < 8) {
            $errorMsg .= "Password must be at least 8 characters long.<br>";
            $success = false;
        }
    }

    // Validate Confirm Password (Required & Must Match)
    if (empty($_POST["pwd_confirm"])) {
        $errorMsg .= "Confirm Password is required.<br>";
        $success = false;
    } else {
        $confirm_password = $_POST["pwd_confirm"];
        if ($password !== $confirm_password) {
            $errorMsg .= "Passwords do not match.<br>";
            $success = false;
        }
    }

    // Validate Terms Agreement
    if (!isset($_POST["agree"])) {
        $errorMsg .= "You must agree to the terms and conditions.<br>";
        $success = false;
    }

    // Hash Password if all checks pass
    if ($success) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Results - Waste Not</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php include "inc/nav.inc.php"; ?>

    <div class="container mt-5 text-center">
        <?php if ($success): ?>
            <div class="card p-5 shadow-sm">
                <i class="fas fa-check-circle fa-5x text-success mb-3"></i>
                <h2 class="fw-bold">Your registration is successful!</h2>
                <p>Thank you for joining our community, <?= htmlspecialchars($lname); ?>.</p>
                <p>Together, we can make a difference in reducing food waste.</p>
                <div class="mt-4">
                    <a href="login.php" class="btn btn-primary me-2">Log-in</a>
                    <a href="index.php" class="btn btn-outline-success">Return to Homepage</a>
                </div>
            </div>
        <?php else: ?>
            <div class="card p-5 shadow-sm">
                <i class="fas fa-exclamation-circle fa-5x text-danger mb-3"></i>
                <h2 class="fw-bold">Oops!</h2>
                <p>The following errors were detected:</p>
                <div class="alert alert-danger">
                    <?= $errorMsg; ?>
                </div>
                <a href="register.php" class="btn btn-primary mt-3">Return to Sign Up</a>
            </div>
        <?php endif; ?>
    </div>

    <?php include "inc/footer.inc.php"; ?>
</body>
</html>
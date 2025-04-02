<?php
session_start();
$errorMsg = "";
$success = true;

// Function to sanitize input
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $errorMsg .= "Email is required.<br>";
        $success = false;
    } else {
        $email = sanitize_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMsg .= "Invalid email format.<br>";
            $success = false;
        }
    }

    if (empty($_POST["pwd"])) {
        $errorMsg .= "Password is required.<br>";
        $success = false;
    } else {
        $password = $_POST["pwd"];
    }

    if ($success) {
        authenticateUser();
    }
}

// Function to authenticate user
function authenticateUser() {
    global $email, $password, $errorMsg, $success;

    // Load database configuration
    $config = parse_ini_file('/var/www/private/db-config.ini');
    if (!$config) {
        $errorMsg = "Failed to read database config file.";
        $success = false;
        return;
    }

    // Connect to database
    $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

    if ($conn->connect_error) {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;
        return;
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT fname, lname, password FROM projectdatabase WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Fetch user data
        $stmt->bind_result($fname, $lname, $pwd_hashed);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $pwd_hashed)) {
            $_SESSION["fname"] = $fname;
            $_SESSION["lname"] = $lname;
            $_SESSION["username"] = $fname; 

            header("Location: index.php");
            exit();
        } else {
            $errorMsg = "Email not found or password doesn't match.";
            $success = false;
        }
    } else {
        $errorMsg = "Email not found or password doesn't match.";
        $success = false;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Results</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include "inc/nav.inc.php"; ?>
    <main class="container text-center mt-5">
        <?php if (!$success) { ?>
            <h1 class="text-danger">Oops!</h1>
            <p class="lead">The following errors were detected:</p>
            <div class="alert alert-danger">
                <?= nl2br($errorMsg); ?>
            </div>
            <a href="login.php" class="btn btn-warning">Return to Login</a>
        <?php } else { ?>
            <h1 class="text-success">Login successful!</h1>
            <p class="lead">Welcome back, <strong><?= htmlspecialchars($_SESSION["fname"] . " " . $_SESSION["lname"]); ?></strong>.</p>
            <a href="index.php" class="btn btn-success">Return to Home</a>
        <?php } ?>
    </main>
    <?php include "inc/footer.inc.php"; ?>
</body>
</html>

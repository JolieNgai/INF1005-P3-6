<?php
$fname = $lname = $email = $password = $confirm_password = $errorMsg = "";
$success = true;

function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if (!empty($_POST["fname"])) {
    $fname = sanitize_input($_POST["fname"]);
}

if (empty($_POST["lname"])) {
    $errorMsg .= "Last Name is required.<br>";
    $success = false;
} else {
    $lname = sanitize_input($_POST["lname"]);
}

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

if (empty($_POST["pwd"]) || empty($_POST["pwd_confirm"])) {
    $errorMsg .= "Password and Confirm Password are required.<br>";
    $success = false;
} else {
    $password = $_POST["pwd"];
    $confirm_password = $_POST["pwd_confirm"];

    if ($password !== $confirm_password) {
        $errorMsg .= "Passwords do not match.<br>";
        $success = false;
    } elseif (strlen($password) < 8) {
        $errorMsg .= "Password must be at least 8 characters long.<br>";
        $success = false;
    }
}

if (!isset($_POST["agree"])) {
    $errorMsg .= "You must agree to the terms and conditions.<br>";
    $success = false;
}

function saveMemberToDB() 
{ 
    global $fname, $lname, $email, $pwd_hashed, $errorMsg, $success; 

    $config = parse_ini_file('/var/www/private/db-config.ini'); 
    if (!$config) 
    { 
        $errorMsg = "Failed to read database config file."; 
        $success = false; 
    } 
    else 
    { 
        $conn = new mysqli( 
            $config['servername'], 
            $config['username'], 
            $config['password'], 
            $config['dbname'] 
        ); 

        if ($conn->connect_error) 
        { 
            $errorMsg = "Connection failed: " . $conn->connect_error; 
            $success = false; 
        } 
        else 
        { 
            $stmt = $conn->prepare("INSERT INTO projectdatabase 
                (fname, lname, email, password) VALUES (?, ?, ?, ?)"); 

            $stmt->bind_param("ssss", $fname, $lname, $email, $pwd_hashed); 
            if (!$stmt->execute()) 
            { 
                $errorMsg = "Execute failed: (" . $stmt->errno . ") " . 
                    $stmt->error; 
                $success = false; 
            } 
            $stmt->close(); 
        } 

        $conn->close(); 
    } 
}

if ($success) {
    $pwd_hashed = password_hash($password, PASSWORD_DEFAULT);
    saveMemberToDB();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration Results</title>
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
            <a href="register.php" style="color:#0a58ca" class="btn btn-danger">Return to Sign Up</a>
        <?php } else { ?>
            <h1 class="text-success">Your registration is successful!</h1>
            <p class="lead">Thank you for signing up, <?= htmlspecialchars($fname . " " . $lname); ?>.</p>
            <a href="login.php" class="btn btn-success">Log-in</a>
        <?php } ?>
    </main>
    <?php include "inc/footer.inc.php"; ?>
</body>

</html>
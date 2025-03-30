<?php
// login_simulate.php
session_start();
$_SESSION['user_id'] = 1;
$_SESSION['fname'] = "Demo";
$_SESSION['lname'] = "User";
$_SESSION['email'] = "demo@example.com";
?>

<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../db_connect.php";
$conn = getDbConnection();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "unauthorized"; // not logged in
    exit;
}

// Check if POST method
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "invalid_request"; // not a POST request
    exit;
}

$userId = $_SESSION['user_id'];

// Sanitize & extract input
$title = $_POST['title'];
$description = $_POST['description'];
$url = $_POST['url'];
$image = $_POST['image'];
$publishedAt = date('Y-m-d H:i:s', strtotime($_POST['published_at']));
$category = $_POST['category'];

// Check if article is already saved by this user
$check = $conn->prepare("SELECT id FROM saved_articles WHERE user_id = ? AND url = ?");
$check->bind_param("is", $userId, $url);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    echo "exists";
} else {
    $stmt = $conn->prepare("INSERT INTO saved_articles 
        (user_id, title, description, url, image_url, published_at, category)
        VALUES (?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("issssss", $userId, $title, $description, $url, $image, $publishedAt, $category);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }

    $stmt->close();
}

$check->close();
$conn->close();
?>

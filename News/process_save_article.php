<?php

include "../login_simulate.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "Session User ID: " . ($_SESSION['user_id'] ?? 'not set') . "<br>";
echo "Request Method: " . $_SERVER["REQUEST_METHOD"] . "<br>";

require_once "../db_connect.php"; // Your DB connection logic

$conn = getDbConnection();



if (isset($_SESSION['user_id']) && $_SERVER["REQUEST_METHOD"] === "POST") {
    $userId = $_SESSION['user_id'];

    // Sanitize & extract form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $url = $_POST['url'];
    $image = $_POST['image'];
    $publishedAt = $_POST['published_at'];
    $publishedAt = date('Y-m-d H:i:s', strtotime($publishedAt));
    $category = $_POST['category'];

    $stmt = $conn->prepare("INSERT INTO saved_articles 
        (user_id, title, description, url, image_url, published_at, category)
        VALUES (?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("issssss", $userId, $title, $description, $url, $image, $publishedAt, $category);

    if ($stmt->execute()) {
        echo "✅ Article saved successfully!";
        // Optionally redirect back
        // header("Location: news.php?category=" . urlencode($category));
    } else {
        echo "❌ Failed to save article: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "❌ Not authorized or invalid request.";
}
?>

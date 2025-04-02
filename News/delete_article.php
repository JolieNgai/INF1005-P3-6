<?php
session_start();
require_once "../db_connect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["article_id"], $_SESSION["user_id"])) {
    $articleId = $_POST["article_id"];
    $userId = $_SESSION["user_id"];

    $conn = getDbConnection();
    $stmt = $conn->prepare("DELETE FROM saved_articles WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $articleId, $userId);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

header("Location: saved_article.php");
exit();

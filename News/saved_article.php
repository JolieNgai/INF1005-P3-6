<?php
session_start();
require_once "../db_connect.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$conn = getDbConnection();
$userId = $_SESSION["user_id"];

$stmt = $conn->prepare("SELECT id, title, description, url, image_url, published_at, category 
                        FROM saved_articles 
                        WHERE user_id = ? 
                        ORDER BY saved_at DESC");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$savedArticles = $result->fetch_all(MYSQLI_ASSOC);

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Saved Articles - Food 4 Thought</title>
    <?php include "../inc/head.inc.php"; ?>
</head>

<body class="custom-body-background">
    <?php include "../inc/nav.inc.php"; ?>
    <?php include "../inc/header.inc.php"; ?>

    <div class="container mt-5">
        <h1 class="mb-4">Saved Articles</h1>
        <?php if (empty($savedArticles)): ?>
            <div class="alert alert-info">You haven't saved any articles yet.</div>
        <?php else: ?>
            <div class="row">
                <?php foreach ($savedArticles as $article): ?>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="<?= htmlspecialchars($article['image_url'] ?? '../images/default.jpg') ?>" 
                                 class="card-img-top" 
                                 alt="<?= htmlspecialchars($article['title']) ?>" 
                                 style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($article['title']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($article['description'] ?? "No description available.") ?></p>
                                <p class="card-text">
                                    <small class="text-muted">Published on <?= date("F j, Y", strtotime($article['published_at'])) ?></small>
                                </p>
                                <a href="<?= htmlspecialchars($article['url']) ?>" class="btn btn-primary" target="_blank">Read More</a>
                                <form method="POST" action="delete_article.php" class="d-inline">
                                    <input type="hidden" name="article_id" value="<?= $article['id'] ?>">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php include "../inc/footer.inc.php"; ?>
</body>

</html>

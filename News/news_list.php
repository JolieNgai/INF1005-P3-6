<?php
include "../inc/news/config.inc.php";
include "../inc/news/fetch_news.inc.php";

$categories = ["All", "Sustainable Living", "Zero Waste", "Food Rescue", "Hunger Awareness"];
$currentCategory = isset($_GET["category"]) && in_array($_GET["category"], $categories) ? $_GET["category"] : "All";

$articlesPerPage = 12;
$currentPage = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;

$newsArticles = [];
$error = null;

try {
    $newsArticles = fetchNews($currentCategory, 'publishedAt');
    $totalArticles = count($newsArticles);
    $totalPages = max(1, ceil($totalArticles / $articlesPerPage));
    $currentPage = min($currentPage, $totalPages);
    $startIndex = ($currentPage - 1) * $articlesPerPage;
    $endIndex = min($startIndex + $articlesPerPage, $totalArticles);
} catch (Exception $e) {
    $error = "Failed to load news. Please try again later.";
    $totalPages = 1;
    $currentPage = 1;
}

$paginationUrlBase = "news_list.php?category=" . urlencode($currentCategory);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Food 4 Thought</title>
    <?php include "../inc/head.inc.php"; ?>
    <link rel="stylesheet" href="../css/news_list.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script defer src="/js/main.js"></script>
</head>

<body class="custom-body-background">
    <?php include "../inc/nav.inc.php"; ?>
    <?php include "../inc/header.inc.php"; ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="row mb-3">
                        <div class="col">
                            <h1 class="text-success"><?= htmlspecialchars($currentCategory); ?> News</h1>
                            <hr class="mb-0">
                        </div>
                    </div>

                    <?php for ($i = $startIndex; $i < $endIndex; $i++): ?>
                    <?php $article = $newsArticles[$i]; ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="<?= $article['urlToImage'] ?? './images/default.jpg'; ?>" class="card-img-top"
                                alt="News Image" onerror="this.src='../images/default.jpg';">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <h5 class="card-title"><?= htmlspecialchars($article['title']); ?></h5>
                                    <p class="card-text">
                                        <?= !empty($article['description']) ? htmlspecialchars($article['description']) : 'No description available.'; ?>
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <a href="<?= $article['url']; ?>" class="btn btn-primary btn-sm"
                                        target="_blank">Read More</a>
                                    <form class="save-article-form d-inline" method="POST">
                                        <input type="hidden" name="title"
                                            value="<?= htmlspecialchars($article['title']); ?>">
                                        <input type="hidden" name="description"
                                            value="<?= htmlspecialchars($article['description']); ?>">
                                        <input type="hidden" name="url" value="<?= $article['url']; ?>">
                                        <input type="hidden" name="image" value="<?= $article['urlToImage']; ?>">
                                        <input type="hidden" name="published_at"
                                            value="<?= $article['publishedAt']; ?>">
                                        <input type="hidden" name="category" value="<?= $currentCategory; ?>">
                                        <button aria-label="Save article" type="submit" class="btn btn-outline-primary btn-sm save-btn">
                                            <i class="fas fa-bookmark"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endfor; ?>
                </div>

                <!-- Pagination -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <?php if ($currentPage > 1): ?>
                        <li class="page-item">
                            <a class="page-link"
                                href="<?= $paginationUrlBase ?>&page=<?= $currentPage - 1 ?>">Previous</a>
                        </li>
                        <?php endif; ?>

                        <?php for ($p = 1; $p <= $totalPages; $p++): ?>
                        <li class="page-item <?= $p == $currentPage ? 'active' : '' ?>">
                            <a class="page-link" href="<?= $paginationUrlBase ?>&page=<?= $p ?>"><?= $p ?></a>
                        </li>
                        <?php endfor; ?>

                        <?php if ($currentPage < $totalPages): ?>
                        <li class="page-item">
                            <a class="page-link" href="<?= $paginationUrlBase ?>&page=<?= $currentPage + 1 ?>">Next</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <?php include "../inc/footer.inc.php"; ?>
</body>

</html>
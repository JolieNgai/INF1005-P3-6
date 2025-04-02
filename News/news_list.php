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
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <style>
    <style>.btn-primary {
        background-color: #198754;
        border-color: #198754;
    }

    .btn-primary:hover {
        background-color: #157347;
        border-color: #146c43;
    }

    .btn-outline-primary {
        border-color: #198754;
        color: #198754;
    }

    .btn-outline-primary:hover {
        background-color: #198754;
        color: white;
    }

    .pagination .page-item.active .page-link {
        background-color: #198754;
        border-color: #198754;
    }

    .card-title {
        font-size: 1.1rem;
        font-weight: 600;
    }

    .card-text {
        font-size: 0.95rem;
    }

    .feedback-msg {
        font-size: 0.75rem;
    }
    </style>

    </style>
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
                                        <button type="submit" class="btn btn-outline-primary btn-sm save-btn">
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

    <script>
    $(document).ready(function() {
        $(".save-article-form").on("submit", function(e) {
            e.preventDefault();
            const form = $(this);
            const btn = form.find(".save-btn i");
            const originalIcon = btn.attr("class");

            // Show loading spinner
            btn.attr("class", "fas fa-spinner fa-spin");

            $.post("process_save_article.php", form.serialize(), function(response) {
                if (response.trim() === "exists") {
                    btn.attr("class", "fas fa-exclamation-circle text-warning");
                    btn.closest("button").after(
                        '<span class="text-warning ms-2 small">Exist!</span>');
                } else if (response.trim() === "success") {
                    btn.attr("class", "fas fa-check text-success");
                } else if (response === "unauthorized") {
                    btn.attr("class", "fas fa-user-lock text-danger");
                    btn.closest("button").after(
                        '<span class="text-danger ms-2 small feedback-msg">Please log in!</span>'
                    );
                } else {
                    btn.attr("class", "fas fa-times text-danger");
                }

                // Revert to original after 2.5s
                setTimeout(() => {
                    form.find("span.text-warning").remove();
                    btn.attr("class", originalIcon);
                }, 2500);
            }).fail(() => {
                btn.attr("class", "fas fa-times text-danger");
                setTimeout(() => {
                    btn.attr("class", originalIcon);
                }, 2000);
            });
        });
    });
    </script>
</body>

</html>
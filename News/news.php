<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$apiErrorMessage;

include "../inc/news/config.inc.php";
include "../inc/news/fetch_news.inc.php";

$categories = ["All", "Sustainable Living", "Zero Waste", "Food Rescue", "Hunger Awareness"];
$currentCategory = $_GET["category"] ?? "All";

$currentCategoryArticles = fetchNews($currentCategory, 'popularity');
$trendingArticles = array_slice($currentCategoryArticles, 0, 3);
$topStories = array_slice($currentCategoryArticles, 3, 3);
$latestArticles = array_slice(fetchNews($currentCategory, 'publishedAt'), 0, 3);

// Fetch today's pick from ALL categories combined
$allCategoriesArticles = [];
foreach ($categories as $category) {
    $articles = fetchNews($category, 'popularity');
    if (!empty($articles) && is_array($articles)) {
        $allCategoriesArticles = array_merge($allCategoriesArticles, $articles);
    }
}

$allCategoriesArticles = array_filter($allCategoriesArticles, function($article) {
    return is_array($article) && !isset($article['isPlaceholder']);
});

usort($allCategoriesArticles, function($a, $b) {
    return strtotime($b["publishedAt"]) - strtotime($a["publishedAt"]);
});

$todaysPick = $allCategoriesArticles[0] ?? null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Food 4 Thought</title>
    <?php include "../inc/head.inc.php"; ?>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <style>
    .newsImg {
        object-fit: cover;
        width: 100%;
        height: 200px;
    }

    .card-body {
        background-color: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(4px);
        border-radius: 0 0 10px 10px;
    }

    .container.semiTransparent {
        background-color: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(5px);
        padding: 2rem;
        border-radius: 12px;
    }

    .btn-primary {
        background-color: #198754;
        border: none;
    }

    .btn-outline-primary {
        border-color: #198754;
        color: #198754;
    }

    .btn-outline-primary:hover {
        background-color: #198754;
        color: white;
    }

    /* Override Bootstrap .nav-pills */
    .nav-pills .nav-link {
        color: #198754;
        border: 1px solid #198754;
        margin: 0 4px;
    }

    .nav-pills .nav-link:hover {
        background-color: #198754;
        color: white;
    }

    .nav-pills .nav-link.active {
        background-color: #198754;
        color: white;
        border-color: #198754;
    }


    @media (max-width: 768px) {
        .newsImg {
            height: 160px;
        }
    }
    </style>
</head>

<body class="custom-body-background">
    <?php include "../inc/nav.inc.php"; ?>
    <?php include "../inc/header.inc.php"; ?>

    <div class="container semiTransparent">
        <div class="row gx-4">
            <div class="col-lg-8 col-12">
                <?php include "../inc/news/navpill.inc.php"; ?>
                <!-- Trending Main -->
                <div class="mb-4">
                    <h1>Trending</h1>
                    <?php if (!empty($trendingArticles[0])): ?>
                    <div class="card border-0 mb-3 shadow-sm">
                        <img src="<?= $trendingArticles[0]["urlToImage"] ?? '../images/default.jpg'; ?>"
                            class="card-img-top newsImg rounded-top" onerror="this.src='../images/default.jpg';">
                        <div class="card-body">
                            <h3 class="card-title"><?= htmlspecialchars($trendingArticles[0]["title"]); ?></h3>
                            <p class="card-text">
                                <?= htmlspecialchars($trendingArticles[0]["description"] ?? "No description available."); ?>
                            </p>
                            <a href="<?= $trendingArticles[0]["url"]; ?>" class="btn btn-primary btn-sm"
                                target="_blank">Read More</a>
                            <form class="save-article-form d-inline" method="POST">
                                <input type="hidden" name="title"
                                    value="<?= htmlspecialchars($trendingArticles[0]['title']); ?>">
                                <input type="hidden" name="description"
                                    value="<?= htmlspecialchars($trendingArticles[0]['description']); ?>">
                                <input type="hidden" name="url" value="<?= $trendingArticles[0]['url']; ?>">
                                <input type="hidden" name="image" value="<?= $trendingArticles[0]['urlToImage']; ?>">
                                <input type="hidden" name="published_at"
                                    value="<?= $trendingArticles[0]['publishedAt']; ?>">
                                <input type="hidden" name="category" value="<?= $currentCategory; ?>">
                                <button type="submit" class="btn btn-outline-primary btn-sm ms-2 save-btn">
                                    <i class="fas fa-bookmark"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Trending Small -->
                <div class="row g-3 mb-4">
                    <?php for ($i = 1; $i <= 2; $i++): ?>
                    <?php if (!empty($trendingArticles[$i])): ?>
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm rounded-4 overflow-hidden">
                            <img src="<?= $trendingArticles[$i]["urlToImage"] ?? '../images/default.jpg'; ?>"
                                class="newsImg" onerror="this.src='../images/default.jpg';">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($trendingArticles[$i]["title"]); ?></h5>
                                <p class="card-text">
                                    <?= htmlspecialchars($trendingArticles[$i]["description"] ?? "No description available."); ?>
                                </p>
                                <div class="d-flex gap-2">
                                    <a href="<?= $trendingArticles[$i]["url"]; ?>" class="btn btn-primary btn-sm">Read
                                        More</a>
                                    <form class="save-article-form d-inline" method="POST">
                                        <input type="hidden" name="title"
                                            value="<?= htmlspecialchars($trendingArticles[$i]['title']); ?>">
                                        <input type="hidden" name="description"
                                            value="<?= htmlspecialchars($trendingArticles[$i]['description']); ?>">
                                        <input type="hidden" name="url" value="<?= $trendingArticles[$i]['url']; ?>">
                                        <input type="hidden" name="image"
                                            value="<?= $trendingArticles[$i]['urlToImage']; ?>">
                                        <input type="hidden" name="published_at"
                                            value="<?= $trendingArticles[$i]['publishedAt']; ?>">
                                        <input type="hidden" name="category" value="<?= $currentCategory; ?>">
                                        <button type="submit" class="btn btn-outline-primary btn-sm save-btn">
                                            <i class="fas fa-bookmark"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endfor; ?>
                </div>

                <!-- Latest Articles -->
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1>Latest Articles</h1>
                        <a href="news_list.php?category=<?= urlencode($currentCategory); ?>"
                            class="btn btn-primary btn-sm">More</a>
                    </div>

                    <?php foreach ($latestArticles as $article): ?>
                    <?php if (!empty($article)): ?>
                    <div class="card mb-3 border-0 shadow-sm">
                        <div class="row g-0 align-items-stretch">
                            <div class="col-md-4">
                                <img src="<?= $article["urlToImage"] ?? '../images/default.jpg'; ?>"
                                    class="img-fluid newsImg rounded-start" style="height: 100%; object-fit: cover;"
                                    onerror="this.src='../images/default.jpg';">
                            </div>
                            <div class="col-md-8 d-flex flex-column">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div>
                                        <h5 class="card-title"><?= htmlspecialchars($article["title"]); ?></h5>
                                        <p class="card-text">
                                            <?= htmlspecialchars($article["description"] ?? "No description available."); ?>
                                        </p>
                                        <p class="card-text"><small class="text-muted">Published on
                                                <?= date("F j, Y", strtotime($article["publishedAt"])); ?></small></p>
                                    </div>
                                    <div class="mt-2 d-flex gap-2 flex-wrap">
                                        <a href="<?= $article["url"]; ?>" class="btn btn-sm btn-primary">Read More</a>
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
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="col-lg-4 col-12">
                <?php include "../inc/news/sidebar.inc.php"; ?>
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
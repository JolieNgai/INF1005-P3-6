<?php
// Include configuration and functions
include "../inc/news/config.inc.php";
include "../inc/news/fetch_news.inc.php";

// Define categories
$categories = ["All", "Sustainable Living", "Zero Waste", "Food Rescue", "Hunger Awareness"];

// Validate and get current category
$currentCategory = isset($_GET["category"]) && in_array($_GET["category"], $categories) 
    ? $_GET["category"] 
    : "All";

// Pagination settings
$articlesPerPage = 12; // Reduced from 30 for better performance
$currentPage = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;

// Initialize variables
$newsArticles = [];
$topStories = [];
$todaysPick = null;
$error = null;

try {
    // Fetch main articles for the current category (sorted by publishedAt by default)
    $newsArticles = fetchNews($currentCategory, 'publishedAt');
    $totalArticles = count($newsArticles);
    $totalPages = max(1, ceil($totalArticles / $articlesPerPage)); // Ensure at least 1 page
    
    // Validate and adjust current page if needed
    $currentPage = min($currentPage, $totalPages);
    
    // Calculate pagination range
    $startIndex = ($currentPage - 1) * $articlesPerPage;
    $endIndex = min($startIndex + $articlesPerPage, $totalArticles);
    
    // Fetch additional data only if we have articles
    if ($totalArticles > 0) {
        // Get top stories (popular articles from current category)
        $popularArticles = fetchNews($currentCategory, 'popularity');
        $topStories = array_slice($popularArticles, 3, 3); // Skip first 3 most popular
        
        // Get today's pick from all categories
        $allCategoriesArticles = [];
        foreach ($categories as $category) {
            $articles = fetchNews($category, 'popularity');
            if (!empty($articles) && is_array($articles)) {
                $allCategoriesArticles = array_merge($allCategoriesArticles, $articles);
            }
        }
        
        // Sort by date and get most recent popular article
        usort($allCategoriesArticles, function($a, $b) {
            return strtotime($b["publishedAt"]) - strtotime($a["publishedAt"]);
        });
        $todaysPick = $allCategoriesArticles[0] ?? null;
    }
    
} catch (Exception $e) {
    $error = "Failed to load news. Please try again later.";
    error_log("News loading error: " . $e->getMessage());
    $totalPages = 1;
    $currentPage = 1;
}

// Prepare pagination URL base
$paginationUrlBase = "news_list.php?category=" . urlencode($currentCategory);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Food 4 Thought</title>
    <?php 
        include "../inc/head.inc.php";
    ?>
</head>

<body class="custom-body-background">
    <?php include "../inc/nav.inc.php" ?>
    <?php include "../inc/header.inc.php" ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row">
                    <?php
                        for ($row = 0; $row < 10; $row++) :
                            $rowStart = $startIndex + $row * 3;
                            if ($rowStart >= $endIndex) break;
                    ?>
                    <div class="row mb-3">
                        <?php for ($col = 0; $col < 3; $col++) :
                            $index = $rowStart + $col;
                            if ($index >= $endIndex || empty($newsArticles[$index])) break;
                            $article = $newsArticles[$index];
                        ?>
                        <div class="col-md-4">
                            <div class="card h-100">
                                <img src="<?= $article['urlToImage'] ?? './images/default.jpg'; ?>" class="card-img-top"
                                    alt="News Image">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($article['title']); ?></h5>
                                    <p class="card-text">
                                        <?= !empty($article['description']) ? htmlspecialchars($article['description']) : 'No description available.'; ?>
                                    </p>
                                    <a href="<?= $article['url']; ?>" class="btn btn-primary" target="_blank">Read
                                        More</a>
                                    <a href="" class="btn btn-primary" target="_blank"><i
                                            class="fas fa-bookmark"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>
                <?php endfor; ?>
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <?php if ($currentPage > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $currentPage - 1 ?>">Previous</a>
                        </li>
                        <?php endif; ?>

                        <?php for ($p = 1; $p <= $totalPages; $p++): ?>
                        <li class="page-item <?= $p == $currentPage ? 'active' : '' ?>">
                            <a class="page-link" href="?page=<?= $p ?>"><?= $p ?></a>
                        </li>
                        <?php endfor; ?>

                        <?php if ($currentPage < $totalPages): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $currentPage + 1 ?>">Next</a>
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
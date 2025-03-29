<?php
// Include configuration (API key, base URL, category map)
include "../inc/news/config.inc.php";

// Include function to fetch news using cURL
include "../inc/news/fetch_news.inc.php";

// Categories
$categories = ["All", "Sustainable Living", "Zero Waste", "Food Rescue", "Hunger Awareness"];
$currentCategory = isset($_GET["category"]) ? $_GET["category"] : "All";

// Fetch articles for current category
$currentCategoryArticles = fetchNews($currentCategory, 'popularity');

// Get trending and latest articles for current category
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

// Sort all articles by popularity and get the top one as today's pick
usort($allCategoriesArticles, function($a, $b) {
    return strtotime($b["publishedAt"]) - strtotime($a["publishedAt"]);
});
$todaysPick = !empty($allCategoriesArticles) ? $allCategoriesArticles[0] : null;

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
    

    <div class="container semiTransparent">
        <div class="row gx-4">
            <div class="col-lg-8 col-12">
                <?php include "../inc/news/navpill.inc.php"; ?>
                <div class="row mb-2 mt-2">
                    <div class="card border-0">
                        <h1>Trending</h1>
                        <?php if (!empty($trendingArticles)) : ?>
                        <img src="<?= !empty($trendingArticles[0]["urlToImage"]) ? $trendingArticles[0]["urlToImage"] : './images/default.jpg'; ?>"
                            class="card-img-top rounded" alt="Big News" height="325px">
                        <div class="card-body">
                            <h3 class="card-title"><?= htmlspecialchars($trendingArticles[0]["title"]); ?></h3>
                            <p class="card-text">
                                <?= !empty($trendingArticles[0]["description"]) ? htmlspecialchars($trendingArticles[0]["description"]) : "No description available."; ?>
                            </p>
                            <a href="<?= $trendingArticles[0]["url"]; ?>" class="btn btn-primary" target="_blank">Read
                                More</a>
                            <form method="POST" action="process_news.php">
                                <input type="hidden" name="index" value="<?= $i ?>">
                                <button type="submit" class="btn btn-outline-primary"><i
                                        class="fas fa-bookmark"></i></button>
                            </form>
                        </div>
                        <?php else : ?>
                        <p class="text-danger">No top articles available.</p>
                        <?php endif; ?>

                        <div class="row mb-2 mt-2 justify-content-between">
                            <?php for ($i = 1; $i <= 2; $i++) : ?>
                            <?php if (!empty($trendingArticles[$i])) : ?>
                            <div class="col me-1 ms-1">
                                <div class="row">
                                    <div class="card border-0">
                                        <img src="<?= !empty($trendingArticles[$i]["urlToImage"]) ? $trendingArticles[$i]["urlToImage"] : './images/default.jpg'; ?>"
                                            class="card-img-top rounded" alt="Big News" height="122px">
                                        <div class="card-body">
                                            <h3 class="card-title"><?= htmlspecialchars($trendingArticles[$i]["title"]); ?>
                                            </h3>
                                            <p class="card-text">
                                                <?= !empty($trendingArticles[$i]["description"]) ? htmlspecialchars($trendingArticles[$i]["description"]) : "No description available."; ?>
                                            </p>
                                            <a href="<?= $trendingArticles[$i]["url"]; ?>" class="btn btn-primary"
                                                target="_blank">Read More</a>
                                            <a href="" class="btn btn-primary" target="_blank"><i
                                                    class="fas fa-bookmark"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endfor; ?>
                        </div>

                    </div>
                </div>

                <div class="row mb-2 mt-2">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h1>Latest Articles</h1>
                        </div>
                        <div class="col-md-6 text-end mb-2">
                            <a href="news_list.php?category=<?= urlencode($category); ?>" class="btn btn-primary">More</a>
                        </div>
                    </div>



                    <?php for ($i = 0; $i < 3; $i++) : ?>
                    <?php if (!empty($latestArticles[$i])) : ?>
                    <div class="card mb-3 border-0" style="max-width: 100%;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="<?= !empty($latestArticles[$i]["urlToImage"]) ? $latestArticles[$i]["urlToImage"] : './images/default.jpg'; ?>"
                                    class="img-fluid rounded" alt="News Image">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($latestArticles[$i]["title"]); ?></h5>
                                    <p class="card-text">
                                        <?= !empty($latestArticles[$i]["description"]) ? htmlspecialchars($latestArticles[$i]["description"]) : "No description available."; ?>
                                    </p>
                                    <p class="card-text">
                                        <small class="text-muted">
                                            Published on
                                            <?= date("F j, Y", strtotime($latestArticles[$i]["publishedAt"])); ?>
                                        </small>
                                    </p>
                                    <a href="<?= $latestArticles[$i]["url"]; ?>" class="btn btn-primary"
                                        target="_blank">Read More</a>
                                    <a href="" class="btn btn-primary" target="_blank"><i
                                            class="fas fa-bookmark"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php else : ?>
                        <p class="text-danger">No articles available.</p>
                    <?php endif; ?>
                    <?php endfor; ?>
                </div>
                           
            </div>
            <?php include "../inc/news/sidebar.inc.php"; ?>                 
        </div>
    </div>
    <?php include "../inc/footer.inc.php"; ?>                    
    
</body>

</html>
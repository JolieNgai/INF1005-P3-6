<!-- Sidebar starts -->

<!-- About Section -->
<div class="card border-0 mb-4 shadow-sm">
    <div class="card-body rounded" style="background-color: rgba(255,255,255,0.85);">
        <h2 class="card-title">About Food Shortage</h2>
        <p>
            Food shortage is a growing global concern caused by climate change, population growth, conflicts, and unequal
            food distribution. Millions of people face hunger daily despite the world producing enough food.
        </p>
        <p>
            At <strong>Food 4 Thought</strong>, we aim to raise awareness and educate people on sustainable practices,
            food waste reduction, and community solutions like food rescue and composting. Together, we can build a more
            food-secure future.
        </p>
    </div>
</div>

<!-- Top Stories Section -->
<div class="mb-4">
    <h2>Top Stories</h2>
    <?php foreach ($topStories as $article): ?>
    <div class="card mb-3 border-0 shadow-sm rounded overflow-hidden">
        <div class="row g-0 align-items-center">
            <div class="col-4 d-flex justify-content-center align-items-center p-1">
                <img src="<?= htmlspecialchars($article['urlToImage'] ?? 'default-image.jpg'); ?>"
                    class="img-fluid rounded" style="max-height: 70px; object-fit: cover;"
                    alt="<?= htmlspecialchars($article['title']); ?>"
                    onerror="this.src='../images/default.jpg';">
            </div>
            <div class="col-8">
                <div class="card-body p-2">
                    <h6 class="card-title mb-1"><?= htmlspecialchars($article['title']); ?></h6>
                    <p class="card-text small mb-1">
                        <?= htmlspecialchars($article['description'] ?? 'No description available.'); ?>
                    </p>
                    <div class="d-flex gap-2">
                        <a href="<?= htmlspecialchars($article['url']); ?>" class="btn btn-sm btn-primary">Read More</a>
                        <form method="POST" action="process_save_article.php" class="save-article-form d-inline">
                            <input type="hidden" name="title" value="<?= htmlspecialchars($article['title']); ?>">
                            <input type="hidden" name="description" value="<?= htmlspecialchars($article['description']); ?>">
                            <input type="hidden" name="url" value="<?= htmlspecialchars($article['url']); ?>">
                            <input type="hidden" name="image" value="<?= htmlspecialchars($article['urlToImage']); ?>">
                            <input type="hidden" name="published_at" value="<?= htmlspecialchars($article['publishedAt']); ?>">
                            <input type="hidden" name="category" value="<?= htmlspecialchars($currentCategory ?? 'All'); ?>">
                            <button type="submit" class="btn btn-sm btn-outline-primary save-btn">
                                <i class="fas fa-bookmark"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<!-- Stay Connected -->
<div class="card border-0 mb-4 shadow-sm">
    <div class="card-body rounded text-center" style="background-color: rgba(255,255,255,0.85);">
        <h2 class="card-title">Stay Connected</h2>
        <div class="d-flex justify-content-center flex-wrap gap-2 mt-2">
            <a href="#" class="btn btn-light rounded-circle" style="width: 40px; height: 40px;">
                <i class="fab fa-facebook-f text-secondary"></i>
            </a>
            <a href="#" class="btn btn-light rounded-circle" style="width: 40px; height: 40px;">
                <i class="fab fa-x text-secondary"></i>
            </a>
            <a href="#" class="btn btn-light rounded-circle" style="width: 40px; height: 40px;">
                <i class="fab fa-instagram text-secondary"></i>
            </a>
            <a href="#" class="btn btn-light rounded-circle" style="width: 40px; height: 40px;">
                <i class="fab fa-google text-secondary"></i>
            </a>
        </div>
    </div>
</div>

<!-- Today's Pick -->
<div class="card border-0 mb-4 shadow-sm">
    <div class="card-body rounded" style="background-color: rgba(255,255,255,0.85);">
        <h2 class="card-title">Today's Pick</h2>
        <?php if (!empty($todaysPick)): ?>
        <div class="text-center mb-2">
            <img src="<?= htmlspecialchars($todaysPick['urlToImage'] ?? 'default-image.jpg'); ?>"
                class="img-fluid rounded" style="object-fit: cover; max-height: 200px;"
                alt="<?= htmlspecialchars($todaysPick['title']); ?>"
                onerror="this.src='../images/default.jpg';">
        </div>
        <h6><?= htmlspecialchars($todaysPick['title']); ?></h6>
        <p><?= htmlspecialchars($todaysPick['description'] ?? 'No description available.'); ?></p>
        <div class="d-flex gap-2">
            <a href="<?= htmlspecialchars($todaysPick['url']); ?>" class="btn btn-sm btn-primary">Read More</a>
            <form method="POST" action="process_save_article.php" class="save-article-form d-inline">
                <input type="hidden" name="title" value="<?= htmlspecialchars($todaysPick['title']); ?>">
                <input type="hidden" name="description" value="<?= htmlspecialchars($todaysPick['description']); ?>">
                <input type="hidden" name="url" value="<?= htmlspecialchars($todaysPick['url']); ?>">
                <input type="hidden" name="image" value="<?= htmlspecialchars($todaysPick['urlToImage']); ?>">
                <input type="hidden" name="published_at" value="<?= htmlspecialchars($todaysPick['publishedAt']); ?>">
                <input type="hidden" name="category" value="<?= htmlspecialchars($currentCategory ?? 'All'); ?>">
                <button type="submit" class="btn btn-sm btn-outline-primary save-btn">
                    <i class="fas fa-bookmark"></i>
                </button>
            </form>
        </div>
        <?php else: ?>
        <p class="text-muted">No article found.</p>
        <?php endif; ?>
    </div>
</div>


<!-- Sidebar ends -->

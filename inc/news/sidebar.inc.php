<div class="col-12 col-lg-4">
    <div class="row">
        <div class="row mb-2 mt-2">
            <div class="card border-0">
                <h1>About Food Shortage</h1>
                <div class="card-body">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias ducimus minima
                        repudiandae ex?
                        Officia atque optio sint dolorem error? Aliquid adipisci vero, molestiae
                        voluptatibus
                        dignissimos sit unde at atque possimus quae aspernatur explicabo nulla tempora
                        provident vitae
                        eaque consectetur sint, asperiores cupiditate vel? Sint nemo, fugit saepe tempora
                        dolorem
                        explicabo.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="row">
            <div class="card mb-3 border-0" style="max-width: 540px;">
                <h1>Top Stories</h1>
            </div>
        </div>

        <?php foreach ($topStories as $article) : ?>
        <div class="row">
            <div class="card mb-3 border-0" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= htmlspecialchars($article['urlToImage'] ?? 'default-image.jpg'); ?>"
                            class="img-fluid rounded" alt="<?= htmlspecialchars($article['title']); ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($article['title']); ?></h5>
                            <p class="card-text">
                                <?= htmlspecialchars($article['description'] ?? 'No description available.'); ?>
                            </p>
                            <p class="card-text">
                                <small class="text-muted">
                                    <?= date("F j, Y", strtotime($article["publishedAt"])); ?>
                                </small>
                            </p>
                            <a href="<?= htmlspecialchars($article['url']); ?>" class="btn btn-primary"
                                target="_blank">Read More</a>
                            <a href="" class="btn btn-primary" target="_blank"><i class="fas fa-bookmark"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="row">
        <div class="row mb-2 mt-2">
            <div class="card border-0">
                <h1>Stay Connected</h1>
                <div class="card-body">
                    <div class="d-flex justify-content-center gap-3">
                        <a href="https://facebook.com" target="_blank"
                            class="btn btn-light rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 50px;">
                            <i class="fab fa-facebook-f text-secondary"></i>
                        </a>
                        <a href="https://twitter.com" target="_blank"
                            class="btn btn-light rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 50px;">
                            <i class="fab fa-x text-secondary"></i>
                        </a>
                        <a href="https://pinterest.com" target="_blank"
                            class="btn btn-light rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 50px;">
                            <i class="fab fa-pinterest text-secondary"></i>
                        </a>
                        <a href="https://vimeo.com" target="_blank"
                            class="btn btn-light rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 50px;">
                            <i class="fab fa-vimeo-v text-secondary"></i>
                        </a>
                        <a href="https://instagram.com" target="_blank"
                            class="btn btn-light rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 50px;">
                            <i class="fab fa-instagram text-secondary"></i>
                        </a>
                        <a href="https://google.com" target="_blank"
                            class="btn btn-light rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 50px;">
                            <i class="fab fa-google text-secondary"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="row mb-2 mt-2">
            <?php if (!empty($todaysPick)): ?>
            <div class="card border-0">
                <h1>Today Picks</h1>
                <img src="<?= htmlspecialchars($todaysPick['urlToImage'] ?? 'default-image.jpg'); ?>"
                    class="card-img-top" alt="<?= htmlspecialchars($todaysPick['title']); ?>" height="200px">
                <div class="card-body">
                    <h3 class="card-title"><?= htmlspecialchars($todaysPick['title']); ?></h3>
                    <p class="card-text">
                        <?= htmlspecialchars($todaysPick['description'] ?? 'No description available.'); ?>
                    </p>
                    <a href="<?= htmlspecialchars($todaysPick['url']); ?>" class="btn btn-primary"
                        target="_blank">Read More</a>
                    <a href="" class="btn btn-primary" target="_blank"><i class="fas fa-bookmark"></i></a>
                </div>
            </div>
            <?php else: ?>
            <div class="card border-0">
                <h1>Today Picks</h1>
                <p class="text-danger">No articles available.</p>
            </div>
            <?php endif; ?>

        </div>
    </div>
</div>
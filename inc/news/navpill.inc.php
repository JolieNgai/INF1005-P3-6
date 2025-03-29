<div class="row mb-2 mt-2">
    <ul class="nav nav-pills justify-content-center" id="nav-pills">
        <?php foreach ($categories as $cat) : ?>
        <li class="nav-item">
            <a class="nav-link <?= ($cat == $currentCategory) ? 'active' : ''; ?>" href="?category=<?= urlencode($cat); ?>">
                <?= htmlspecialchars($cat); ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" data-bs-theme="light">

<a class="navbar-brand" href="/">
<a class="navbar-brand" href="index.php">
                <i class="fas fa-seedling me-2"></i>Food 4 Thought
            </a>
</a>

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
     <li class="nav-item">
        <a class="nav-link" href="/index.php">Homepage</a>
     </li>
     <li class = "nav-item">
        <a class ="nav-link" href="/aboutus.php">About Us</a> <!-- Add in link for this page -->
     </li>
     <li class = "nav-item">
        <a class ="nav-link" href="calculator.php">Calculator</a> <!-- Add in link for this page -->
     </li>
     <li class = "nav-item">
        <a class ="nav-link" href="/News/news.php">News</a> <!-- Add in link for this page -->
     </li>
     <li class = "nav-item">
         <a class ="nav-link" href="/phpbb/">Forum</a>
      </li>
     </ul>
<ul class="navbar-nav ms-auto">
<!-- phpBB forum -->
<?php if (isset($_SESSION['username'])): ?>
    <li class="nav-item">
        <a class="nav-link" href="/logout.php">Log out</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/News/saved_article.php">Saved Article</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></a>
    </li>
<?php else: ?>
    <li class="nav-item">
        <a class="nav-link" href="/register.php">Register</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/login.php">Log In</a>
    </li>
<?php endif; ?>
    </ul>
    
</div>

</nav>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<nav class="navbar navbar-expand-sm bg-secondary custom-light-green-background" data-bs-theme="light">

<a class="navbar-brand" href="/">
    <div class="logo-image">
          <img src="/images/Logo.jpg"
          height = "60">
    </div>
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
        <a class ="nav-link" href="News/news.php">News</a> <!-- Add in link for this page -->
     </li>
<!-- phpBB forum -->
<?php if (isset($_SESSION['username'])): ?>
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
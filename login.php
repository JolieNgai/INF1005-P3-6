<!DOCTYPE html>
<html lang="en">

<head>
    <title>Member Login</title>
    <?php include "inc/head.inc.php"; ?>
</head>

<body>
    <?php include "inc/nav.inc.php"; ?>

    <main class="container">
        <h1>Member Login</h1>
        <p>
            Existing members log in here. For new members, please go to the
            <a href="register.php" style="color:#0a58ca" >Member Registration page</a>.
        </p>

        <form action="process_login.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input required type="email" id="email" name="email" class="form-control" placeholder="Enter email">
            </div>
            <div class="mb-33">
                <label for="pwd" class="form-label">Password:</label>
                <input required type="password" id="pwd" name="pwd" class="form-control" placeholder="Enter password">
            </div>
            <div class="mb-3">
            <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Submit</button>
            </div>
        </form>
    </main>

    <?php include "inc/footer.inc.php"; ?>
</body>

</html>
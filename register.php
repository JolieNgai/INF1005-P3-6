<?php include "inc/head.inc.php"; ?>
<?php include "inc/nav.inc.php"; ?>

<main class="container mt-5">
    <h1 class="mb-3">Join Our Community</h1>
    <p>
        For existing members, please go to the
        <a href="login.php">Sign In page</a>.
    </p>

    <form action="process_register.php" method="post">
        <div class="mb-3">
            <label for="fname" class="form-label">First Name:</label>
            <input type="text" id="fname" name="fname" class="form-control" 
                   placeholder="Enter first name" maxlength="45">
        </div>

        <!-- Last Name (Required, Max Length 45) -->
        <div class="mb-3">
            <label for="lname" class="form-label">Last Name:</label>
            <input required type="text" id="lname" name="lname" class="form-control" 
                   placeholder="Enter last name" maxlength="45">
        </div>

        <!-- Email (Required, Max Length 45) -->
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" 
                   placeholder="Enter email" required maxlength="45"
                   pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
                   title="Please enter a valid email address (e.g., user@example.com)">
        </div>

        <!-- Area of Interest -->
        <div class="mb-3">
            <label for="interest" class="form-label">Area of Interest:</label>
            <select id="interest" name="interest" class="form-select">
                <option value="">Select your primary interest</option>
                <option value="household">Household Food Waste Reduction</option>
                <option value="recipes">Waste-Free Recipes</option>
                <option value="composting">Composting</option>
                <option value="education">Educational Resources</option>
                <option value="community">Community Initiatives</option>
            </select>
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="pwd" class="form-label">Password:</label>
            <input type="password" id="pwd" name="pwd" class="form-control" 
                   placeholder="Enter password" required minlength="8"
                   pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*#?&]{8,}$"
                   title="Password must be at least 8 characters long and contain at least one letter and one number">
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="pwd_confirm" class="form-label">Confirm Password:</label>
            <input type="password" id="pwd_confirm" name="pwd_confirm" class="form-control" 
                   placeholder="Confirm password" required minlength="8">
        </div>

        <!-- Newsletter Option -->
        <div class="mb-3 form-check">
            <input type="checkbox" name="newsletter" id="newsletter" class="form-check-input">
            <label class="form-check-label" for="newsletter">
                Subscribe to our monthly newsletter with tips and updates.
            </label>
        </div>

        <!-- Terms and Conditions -->
        <div class="mb-3 form-check">
            <input type="checkbox" name="agree" id="agree" class="form-check-input" required>
            <label class="form-check-label" for="agree">
                Agree to terms and conditions.
            </label>
        </div>

        <button type="submit" class="btn btn-primary w-100">Join Now</button>
    </form>
</main>

<?php include "inc/footer.inc.php"; ?>
</body>
</html>
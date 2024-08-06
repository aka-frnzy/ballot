<?php include('templates/header.php'); ?>
<div class="container">
    <h2>Login</h2>
    <form action="php/login.php" method="POST">
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
    <div class="register-container">
        <p>Don't have an account? <a href="signup.php" class="register-link">Register Here</a></p>
    </div>
</div>
<?php include('templates/footer.php'); ?>
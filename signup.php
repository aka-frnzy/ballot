<?php include('templates/header.php'); ?>
<div class="container">
    <h2>Sign Up</h2>
    <form action="php/register.php" method="POST">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Sign Up</button>
    </form>
    <div class="login-container">
        <p>Already have an account? <a href="login.php" class="login-link">Login here</a></p>
    </div>
</div>
<?php include('templates/footer.php'); ?>
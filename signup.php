<?php include('templates/header.php'); ?>
<div class="container">
    <h2>Sign Up</h2>
    <form action="php/register.php" method="POST" id="signupForm">
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
        <div>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <span id="message"></span>
        </div>
        <button type="submit">Sign Up</button>
    </form>
    <div class="login-container">
        <p>Already have an account? <a href="login.php" class="login-link">Login here</a></p>
    </div>
</div>
<script>
    document.getElementById('confirm_password').addEventListener('input', function() {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm_password').value;
        const message = document.getElementById('message');

        if (confirmPassword === password) {
            message.textContent = 'Passwords match';
            message.style.color = 'green';
        } else {
            message.textContent = 'Passwords do not match';
            message.style.color = 'red';
        }
    });
</script>

<?php include('templates/footer.php'); ?>
<?php
session_start();
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
    header("Location: admin.php");
    exit();
} elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'voter') {
    header("Location: voter.php");
    exit();
}
?>

<?php include('templates/header.php'); ?>
<style>
    .container {
        text-align: center;
        margin-top: 50px;
    }

    .btn-group {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 20px;
    }

    .btn {
        padding: 10px 20px;
        font-size: 16px;
        text-decoration: none;
        color: white;
        border-radius: 5px;
    }

    .btn-login {
        background-color: blue;
    }

    .btn-signup {
        background-color: green;
    }
</style>
<div class="container">
    <h1>Welcome to The Ballot: An Online Voting System</h1>
    <div class="btn-group">
        <a href="login.php" class="btn btn-login">Login</a>
        <a href="signup.php" class="btn btn-signup">Sign Up</a>
    </div>
</div>
<?php include('templates/footer.php'); ?>
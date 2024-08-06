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
<div class="container">
    <h1>Welcome to The Ballot An Online Voting System</h1>
    <p>Please <a href="login.php">login</a> or <a href="signup.php">sign up</a> to continue.</p>
</div>
<?php include('templates/footer.php'); ?>
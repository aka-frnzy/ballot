<?php
session_start();
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_role'] = $user['role'];
            echo "<script>
                window.location.href = '../" . ($_SESSION['user_role'] == 'admin' ? "admin.php" : "voter.php") . "';
            </script>";
        } else {
            echo "<script>
                alert('Incorrect password.');
                window.location.href = '../login.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('$email is not registered.');
            window.location.href = '../login.php';
        </script>";
    }

    $stmt->close();
    $conn->close();
}

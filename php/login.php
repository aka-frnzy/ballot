
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
            echo "Login successful. and user role is " . $_SESSION['user_role'];
            if ($_SESSION['user_role'] == 'admin') {
                header("Location:../admin.php");
                exit();
            }
            header("location:../voter.php");
            exit();
        } else {
            // echo "Incorrect password.";
            header("location:../login.php");
            exit();
        }
    } else {
        // echo "No user found with that email.";
        header("location:../login.php");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>

<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $password = $_POST['password'];
    $cpassword = $_POST['confirm_password'];

    // Check if the email is already in use
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>
            alert('This email is already registered. Please use a different email.');
            window.location.href = '../signup.php';
        </script>";
    } else {

        // Check if the password and confirm password match
        if ($password != $cpassword) {
            echo "<script>
                alert('Passwords do not match. Please try again.');
                window.location.href = '../signup.php';
            </script>";
            exit();
        }
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        // $stmt->bind_param("sss", $name, $email, $password);
        $stmt->bind_param("sss", $name, $email, $hash);

        if ($stmt->execute()) {
            echo "<script>
                alert('Registration successful. Please login.');
                window.location.href = '../login.php';
            </script>";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
}

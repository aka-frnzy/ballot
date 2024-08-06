<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .navbar {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navcontainer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-title {
            font-size: 24px;
            font-weight: bold;
        }

        .logout-btn {
            background-color: #f44336;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .logout-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="navcontainer">
            <span class="navbar-title">The Ballot</span>
            <?php if (isset($_SESSION['user_role'])) : ?>
                <button class="logout-btn" onclick="window.location.href='php/logout.php'">Logout</button>
            <?php endif; ?>
        </div>
    </nav>
</body>

</html>
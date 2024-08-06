<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $election_id = $_POST['election_id'];

    $sql = "INSERT INTO candidates (name, position, election_id) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $name, $position, $election_id);

    if ($stmt->execute()) {
        header("Location: ../admin.php?view=candidates");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

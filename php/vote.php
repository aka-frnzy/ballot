<!-- vote.php -->
<?php
session_start();
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['candidate_id']) && isset($_POST['election_id'])) {
    $candidate_id = $_POST['candidate_id'];
    $election_id = $_POST['election_id'];
    $user_id = $_SESSION['user_id'];

    // Check if the user has already voted in this election
    $check_sql = "SELECT * FROM votes WHERE user_id = ? AND election_id = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("ii", $user_id, $election_id);
    $stmt->execute();
    $check_result = $stmt->get_result();

    if ($check_result->num_rows > 0) {
        echo "<h1 style='text-align:center;'>You have already voted in this election.</h1>";
        header("refresh:2;url=../voter.php?view=elections");
    } else {
        $sql = "INSERT INTO votes (user_id, candidate_id, election_id) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $user_id, $candidate_id, $election_id);

        if ($stmt->execute()) {
            echo "<h1 style='text-align:center;'>Vote submitted successfully!</h1>";
            header("refresh:2;url=../voter.php?view=elections");
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
}
?>
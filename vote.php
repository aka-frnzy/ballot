<!-- vote.php -->
<?php
include('php/db.php');

if (isset($_GET['election_id'])) {
    $election_id = $_GET['election_id'];
    $sql = "SELECT * FROM candidates WHERE election_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $election_id);
    $stmt->execute();
    $result = $stmt->get_result();

    echo "<div class='container'>
            <h3>Vote for Election ID: $election_id</h3>
            <form action='php/vote.php' method='POST'>
                <input type='hidden' name='election_id' value='$election_id'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div>
                <input type='radio' id='candidate_{$row['id']}' name='candidate_id' value='{$row['id']}' required>
                <label for='candidate_{$row['id']}'>{$row['name']} ({$row['position']})</label>
              </div>";
    }
    echo "  <button type='submit'>Submit Vote</button>
          </form>
        </div>";

    $stmt->close();
}
include('templates/footer.php');
?>
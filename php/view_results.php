<?php
// Start the session and include the database connection
session_start();
include('php/db.php');

// Function to fetch elections
function fetchElections($conn)
{
    $sql = "SELECT * FROM elections";
    $result = $conn->query($sql);
    return $result;
}

// Function to fetch election results
function fetchElectionResults($conn, $election_id)
{
    $sql = "SELECT candidates.name, COUNT(votes.id) AS vote_count 
            FROM votes 
            JOIN candidates ON votes.candidate_id = candidates.id 
            WHERE votes.election_id = ? 
            GROUP BY candidates.name";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $election_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}
?>

<div>
    <h3>Election Results</h3>
    <form action="admin.php" method="GET">
        <input type="hidden" name="view" value="results">
        <label for="election_id">Select Election:</label>
        <select id="election_id" name="election_id" required>
            <?php
            $result = fetchElections($conn);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                }
            } else {
                echo "<option value=''>No elections available</option>";
            }
            ?>
        </select>
        <button type="submit">View Results</button>
    </form>

    <?php
    if (isset($_GET['election_id'])) {
        $election_id = intval($_GET['election_id']);
        $result = fetchElectionResults($conn, $election_id);

        echo "<h4>Results for Election ID: " . $election_id . "</h4>";
        if ($result->num_rows > 0) {
            echo "<table>
                    <thead>
                        <tr>
                            <th>Candidate Name</th>
                            <th>Vote Count</th>
                        </tr>
                    </thead>
                    <tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['vote_count'] . "</td>
                    </tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<p>No results available for this election.</p>";
        }
    }
    ?>
</div>
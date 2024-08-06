<div>
    <h3>Manage Candidates</h3>
    <form action="php/add_candidate.php" method="POST">
        <div>
            <label for="name">Candidate Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="position">Position:</label>
            <input type="text" id="position" name="position" required>
        </div>
        <div>
            <label for="election_id">Election:</label>
            <select id="election_id" name="election_id" required>
                <?php
                $sql = "SELECT * FROM elections";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['name']}</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit">Add Candidate</button>
    </form>

    <h3>Existing Candidates</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Position</th>
                <th>Election</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT candidates.id, candidates.name, candidates.position, elections.name AS election_name 
                    FROM candidates 
                    JOIN elections ON candidates.election_id = elections.id";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['position']}</td>
                        <td>{$row['election_name']}</td>
                        <td>
                            <a href='php/delete_candidate.php?id={$row['id']}'>Delete</a>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
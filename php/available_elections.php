<div>
    <h3>Available Elections</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM elections WHERE start_date <= CURDATE() AND end_date >= CURDATE()";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['start_date']}</td>
                            <td>{$row['end_date']}</td>
                            <td>
                                <a href='voter.php?view=vote&election_id={$row['id']}'>Vote</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No elections available</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
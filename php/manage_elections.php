<div>
    <h3>Manage Elections</h3>
    <form action="php/add_election.php" method="POST">
        <div>
            <label for="name">Election Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" required>
        </div>
        <div>
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" required>
        </div>
        <button type="submit">Add Election</button>
    </form>

    <h3>Existing Elections</h3>
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
            $sql = "SELECT * FROM elections";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['start_date']}</td>
                        <td>{$row['end_date']}</td>
                        <td>
                        <button style='background-color:red;' onclick='window.location.href=`php/delete_election.php?id={$row['id']}`'>Delete</button>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
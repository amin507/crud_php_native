<?php
include 'config.php';

if (isset($_GET['message'])) {
    echo "<p style='color: green;'>" . $_GET['message'] . "</p>";
}

$sql = "SELECT id, name, email FROM users";
$result = $conn->query($sql);
?>

<a href="create.php">Create New Record</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>
                    <a href='update.php?id=" . $row["id"] . "'>Edit</a> |
                    <a href='delete.php?id=" . $row["id"] . "'>Delete</a>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No records found</td></tr>";
    }
    ?>
</table>

<?php
$conn->close();
?>

<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['email'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];

        $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
        
        if ($conn->query($sql) === TRUE) {
            // Redirect to index.php with a success message
            header("Location: index.php?message=Record updated successfully");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "All fields are required.";
    }
} 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT id, name, email FROM users WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No user found with the given ID.";
        exit;
    }
} else {
    echo "ID not specified.";
    exit;
}

$conn->close();
?>

<form method="post" action="update.php?id=<?php echo $id; ?>">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
    Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
    <input type="submit" value="Update">
</form>

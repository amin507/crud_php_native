<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect to index.php with a success message
        header("Location: index.php?message=New record created successfully");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<form method="post" action="create.php">
    Name: <input type="text" name="name" required>
    Email: <input type="email" name="email" required>
    <input type="submit" value="Create">
</form>

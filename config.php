<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_muhammadamin_230401020027";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

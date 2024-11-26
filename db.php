<?php
$servername = "localhost";
$username = "reymark25";
$password = "reymark25";
$dbname = "jestoni";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

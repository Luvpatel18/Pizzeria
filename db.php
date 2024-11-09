<?php
$servername = "localhost";
$username = "luv";
$password = "root1234";
$dbname = "pizzeria";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php
// Database credentials
$hostname = "localhost"; // Change this to your database host name if it's not running locally
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "tournament_management"; // Change this to your database name

// Create connection
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Optional: Set charset to utf8
mysqli_set_charset($conn, "utf8");
?>

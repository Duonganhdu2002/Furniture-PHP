<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopping_online";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set utf8 character set
$conn->set_charset("utf8");

// Return the connection
return $conn;
?>

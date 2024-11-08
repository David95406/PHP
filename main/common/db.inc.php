<?php
session_start();

$servername = "localhost";
$username = "peca";
$password = "peca";
$dbname = "php_teszt";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
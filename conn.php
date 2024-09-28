<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bcplibrary_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

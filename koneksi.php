<?php
$servername = "localhost";
$database = "db_web";
$username = "root";
$password = "";
// Create connection
$con = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
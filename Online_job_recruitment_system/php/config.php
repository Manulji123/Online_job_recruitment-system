<?php
$hostname = "localhost"; 
$username = "root"; 
$password = "";
$database = "users"; 

$connection = new mysqli($hostname, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
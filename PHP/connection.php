<?php 
// Create a new MySQLi object and establish a connection
$mysqli = new mysqli("localhost", "root", "", "Money_Sqar_SNet_Technologies");


// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
<?php
include('../PHP/connection.php');
$email_id = $_SESSION['LOGGED_IN_EMAIL'];

$historyQuery = "SELECT * FROM withdrawals_table WHERE (Email_Address = '$email_id');";
$resulthistoryquery = $mysqli->query($historyQuery);
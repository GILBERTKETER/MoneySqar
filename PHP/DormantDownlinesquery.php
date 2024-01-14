<?php
include('../PHP/connection.php');
$email_id = $_SESSION['LOGGED_IN_EMAIL'];
$username = $_SESSION['LOGGED_IN_USERNAME'];


$dormant_sql = "SELECT * FROM moneysqar_registered_users 
WHERE(refferer_UserName = '$username' AND Activation_Amount IS NULL);";

$Query_sql = mysqli_query($mysqli, $dormant_sql);


///////////////////////////

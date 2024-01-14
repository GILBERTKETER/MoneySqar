<?php
session_start();
include('../PHP/connection.php');


$email_id = $_SESSION['LOGGED_IN_EMAIL'];
$AmountToWithdraw = $_POST['amount'];
$WithdrwaQuery = "INSERT INTO withdrawals_table (Email_Address,Amount)
 VALUES('$email_id','$AmountToWithdraw');";

mysqli_query($mysqli, $WithdrwaQuery);
echo "hello" . $email_id;

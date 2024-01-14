<?php
session_start();
include('../PHP/connection.php');

if (isset($_POST['score']) && isset($_SESSION['LOGGED_IN_EMAIL'])) {
    $results = $_POST['score'];
    $email = $_SESSION['LOGGED_IN_EMAIL'];

    if ($results == 4) {
        $results = $results * 10;
        $query = "INSERT INTO trivia_table (Email_Address, Trivia_Earnings) 
              VALUES ('$email', '$results');";

        if (mysqli_query($mysqli, $query)) {
            echo "added";
            echo $results;
        } else {
            echo "not added";
        }
    } else {
        echo '<script> alert("You failed");</script>';
    }
}

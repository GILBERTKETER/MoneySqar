<?php
session_start();
include('../PHP/connection.php');

// Check if the value is sent via AJAX
if (isset($_POST['value'])) {
    // Retrieve the value sent via AJAX
    $value = $_POST['value'];
    $email = $_SESSION['LOGGED_IN_EMAIL'];


    //lets check the account balance first
    include('../PHP/Account_Balance.php');
    $account = $Account_Balance;
    if ($account >= $value) {
        $query = "INSERT INTO support_db (Email_Address,Support_Amount) 
                        VALUES ('$email','$value');";

        if (mysqli_query($mysqli, $query)) {
            // Success message
            echo "You have succesfully participate.The draw will be done on friday 8pm.";
        } else {
            // Error message
            echo "Error!: " . mysqli_error($mysqli);
        }
    } else {
        echo "Sorry!Your Account Balance is Low.";
    }

    // Insert the value into the database
    // Modify the query and table name as per your database structure

} else {
    // Error message if the value is not sent via AJAX
    echo "No value received.";
}

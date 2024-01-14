<?php
session_start();
include('./connection.php');

if (isset($_POST['winnings']) && isset($_SESSION['LOGGED_IN_EMAIL'])) {
    include('../PHP/Account_Balance.php');
    $account = $Account_Balance;
    if ($account > 50) {

        $email = $_SESSION['LOGGED_IN_EMAIL'];
        $winnings = $_POST['winnings'];

        //lets check the user if is in the table

        $query_existence = "SELECT * FROM spinwheel_table
                        WHERE(Email_Address = '$email');";
        $exec_query_existence = mysqli_query($mysqli, $query_existence);
        $spinwheel_Earnings = 0;
        $amountUsed = '';

        if (mysqli_num_rows($exec_query_existence) > 0) {
            //if there, we update by adding into the value.
            // update the table


            while ($row_user_exist = mysqli_fetch_assoc($exec_query_existence)) {
                //pick the earnings
                $spin_earnings = $row_user_exist['Spinwheel_Earnings'];
                $amountUsed = $row_user_exist['Amount_Used'];
            }
            $amountUsed = $amountUsed + 50;
            $spinwheel_Earnings = $spin_earnings + $winnings;
            //update it
            $update_existence = "UPDATE spinwheel_table
        SET Spinwheel_Earnings = '$spinwheel_Earnings', Amount_Used = '$amountUsed'
        WHERE Email_Address = '$email';";

            mysqli_query($mysqli, $update_existence);
        } else {
            //insert the record 
            $query = "INSERT INTO spinwheel_table (Email_Address,Spinwheel_Earnings, Amount_Used) 
    VALUES ('$email','$winnings',50)";
            mysqli_query($mysqli, $query);
        }
    } else {
        echo "<script> alert('Sorry! Insufficient Funds');</script>";
    }
}

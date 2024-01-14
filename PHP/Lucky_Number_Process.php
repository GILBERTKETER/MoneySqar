<?php
session_start();
include('../PHP/connection.php');

if (!isset($_SESSION['LOGGED_IN_EMAIL'])) {
    echo "Please log in first.";
    exit();
}

if (!isset($_POST['guess'])) {
    echo "Invalid request.";
    exit();
}
$Lucky_Number = rand(1, 6);
if (isset($_POST['guess'])) {
    include('../PHP/Account_Balance.php');
    $account = $Account_Balance;
    if ($account > 50) {
        $email = $_SESSION['LOGGED_IN_EMAIL'];
        $userguess = $_POST['guess'];
        if ($userguess == $Lucky_Number) {
            $message = "Congratulations.You won.";
            $Lucky_Number_Earning_now = "SELECT * FROM luckynumber_table
             WHERE(Email_Address = '$email');";
            $exec_Lucky_Number_Earning_now = mysqli_query($mysqli, $Lucky_Number_Earning_now);
            if (mysqli_num_rows($exec_Lucky_Number_Earning_now) > 0) {
                while ($row_Lucky_Number_Earning_now = mysqli_fetch_assoc($exec_Lucky_Number_Earning_now)) {
                    $Current_Lucky_Number_Earning_now = $row_Lucky_Number_Earning_now['Lucky_Number_Earnings'];
                    $amountused = $row_Lucky_Number_Earning_now['Amount_Used'];
                    $new_Lucky_Number_Earnings = $Current_Lucky_Number_Earning_now + 100;
                    $newAmountUsed = $amountused + 50;

                    //update the table
                    $update_Lucky_Number_Earnings = "UPDATE luckynumber_table
                     SET Lucky_Number_Earnings='$new_Lucky_Number_Earnings',Amount_Used = '$newAmountUsed'
                     WHERE(Email_Address='$email');";
                    $exec_update_Lucky_Number_Earnings = mysqli_query($mysqli, $update_Lucky_Number_Earnings);
                }
            } else {
                //lets insert the user into the table
                $Insert_Lucky_Number_User = "INSERT INTO luckynumber_table (Email_Address,Lucky_Number_Earnings,Amount_Used)
                 VALUES('$email',100,50);";
                $exec_Insert_Lucky_Number_User = mysqli_query($mysqli, $Insert_Lucky_Number_User);
            }
            echo $message;
        }
        if ($userguess != $Lucky_Number) {
            //check existence
            $userExists = "SELECT * FROM luckynumber_table WHERE(Email_Address = '$email');";
            $exec_userExists = mysqli_query($mysqli, $userExists);
            $message = "OOPS!You loose!";

            if (mysqli_num_rows($exec_userExists) > 0) {
                while ($rowUserExists = mysqli_fetch_assoc($exec_userExists)) {
                    $existingEarnings = $rowUserExists['Lucky_Number_Earnings'];
                    $exstingUsedAmount = $rowUserExists['Amount_Used'];
                    $newUsedAmount = $exstingUsedAmount + 50;
                    //we update
                    $updateUserExists = "UPDATE luckynumber_table SET Amount_Used = '$newUsedAmount'
                                             WHERE(Email_Address = '$email');";
                    $exec_updateuserExists = mysqli_query($mysqli, $updateUserExists);
                }
            } else {
                //we insert
                $insertUserExists = "INSERT INTO luckynumber_table (Email_Address,Amount_Used)
                                     VALUES('$email',50);";
                $exec_insertUserExists = mysqli_query($mysqli, $insertUserExists);
            }
            echo $message;
        }
    } else {
        echo "Sorry!Your Account Balance is Low.";
    }
}

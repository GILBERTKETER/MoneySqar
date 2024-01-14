<?php

session_start();
include('../PHP/connection.php');
include('../PHP/Account_Balance.php');
$account = $Account_Balance;

$email = $_SESSION['LOGGED_IN_EMAIL'];
$option = $_POST['selectedOption'];
$result = $_POST['result'];
echo "option: " . $option;
echo "result: " . $result;
$message = '';

if ($account >= 50) {

    //lets check if the user exists
    $user = "SELECT * FROM coin_tossing WHERE(Email_Address = '$email');";
    $exec_user = mysqli_query($mysqli, $user);
    if (mysqli_num_rows($exec_user) > 0) {

        while ($rowData = mysqli_fetch_assoc($exec_user)) {
            $tossing_Earnings = $rowData['Tossing_Earnings'];
            $amount_Used = $rowData['Amount_Used'];
            $newTossingEarnings = $tossing_Earnings + 100;
            $newAmount_Used = $amount_Used + 50;
            if ($option == $result) {

                //we update the record
                $updateData = "UPDATE coin_tossing SET Tossing_Earnings  = '$newTossingEarnings' , Amount_Used = '$newAmount_Used';";
                $exec_updateData = mysqli_query($mysqli, $updateData);
                echo "inserted";
                $message = 'You Won';
            } else {
                //we deduct
                $updateDataLost = "UPDATE coin_tossing SET  Amount_Used = '$newAmount_Used';";
                $exec_updateDataLost = mysqli_query($mysqli, $updateDataLost);
                echo "deducted";
                $message = 'You Lost';
            }
        }
    } else {
        //we will insert
        if ($option == $result) {
            //won
            $insertNewRecord = "INSERT INTO coin_tossing (Email_Address,Tossing_Earnings,Amount_Used)
                            VALUES('$email',100,50);";
            $exec_insertNewRecord = mysqli_query($mysqli, $insertNewRecord);
            echo "new record won";
            $message = 'You Won';
        } else {
            //won
            $insertNewRecordlost = "INSERT INTO coin_tossing (Email_Address,Tossing_Earnings,Amount_Used)
         VALUES('$email',0,50);";
            $exec_insertNewRecordlost = mysqli_query($mysqli, $insertNewRecordlost);
            echo "new record lost";
            $message = 'You Lost';
        }
    }
} else {
    echo "<script>alert('Sorry.Your Account is Low');</script>";
}

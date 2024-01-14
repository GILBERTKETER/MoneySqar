<?php
session_start();
include('../PHP/connection.php');

if (isset($_POST['changePass'])) {
    $email = $_SESSION['LOGGED_IN_EMAIL'];
    $new = $_POST['new'];
    $old = $_POST['old'];
    $cfnew = $_POST['conf_new'];


    //lets fetch the real password
    $real_Pass = "SELECT Password FROM moneysqar_registered_users WHERE(Email_Address = '$email');";
    $exec_real_Pass = mysqli_query($mysqli, $real_Pass);
    $row = mysqli_fetch_assoc($exec_real_Pass);
    $password = $row['Password'];

    if (password_verify($old, $password) && $new == $cfnew) {
        $CurrentPassword = password_hash($new, PASSWORD_BCRYPT);
        //we insert
        $insertPass = "UPDATE moneysqar_registered_users SET Password = '$CurrentPassword' WHERE(Email_Address = '$email');";
        $exec_insertPass = mysqli_query($mysqli, $insertPass);

        header("location: ../HTML FILES/my_profile.php");
    } else {
        echo "error";
    }
}

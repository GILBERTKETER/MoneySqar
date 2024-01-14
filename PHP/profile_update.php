<?php
session_start();
include('../PHP/connection.php');

if (isset($_POST['update-info'])) {
    $phone = $_POST['phone-no'];
    $address = $_POST['address'];
    $email = $_SESSION['LOGGED_IN_EMAIL'];
    //check if phone & address is available
    $check_info = "SELECT * FROM moneysqar_registered_users
                                WHERE(Email_Address='$email');";
    $exec_check_info = mysqli_query($mysqli, $check_info);
    if (mysqli_num_rows($exec_check_info) > 0) {
        while ($row_exec_check_info = mysqli_fetch_assoc($exec_check_info)) {
            $phone_no = $row_exec_check_info['Phone_No'];
            $address_in = $row_exec_check_info['Address'];
        }
        if ($phone_no == NULL && $address_in == NULL) {

            //insert
            $Insert_DATA = "UPDATE moneysqar_registered_users
            SET Phone_No = '$phone',
            Address = '$address'
            WHERE(Email_Address = '$email');";
            mysqli_query($mysqli, $Insert_DATA);
            header("Location:../HTML FILES/index.php");
        } else {

            //update
            $update_info = "UPDATE moneysqar_registered_users
                         SET Phone_No = '$phone',
                         Address = '$address'
                         WHERE(Email_Address = '$email');";
            mysqli_query($mysqli, $update_info);
            header("Location:../HTML FILES/index.php");
        }
    }
    exit();
}

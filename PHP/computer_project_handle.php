<?php
session_start();
include('./connection.php');
if (isset($_POST['BuyProject'])) {
    $email = $_SESSION['LOGGED_IN_EMAIL'];
    $Image_url = $_POST['imageURL'];
    $amount = $_POST['amount'];
    include('../PHP/Account_Balance.php');
    $account = $Account_Balance;

    $availability = "SELECT * FROM computerproject 
                        WHERE(Email_Address = '$email');";
    $exec_availability = mysqli_query($mysqli, $availability);


    if (mysqli_num_rows($exec_availability) > 0) {
        //we update
        header("location:../HTML FILES/computer_project.php");
    } else {
        if ($account >= $amount) {
            $insertData = "INSERT INTO computerproject (Email_Address,Image_URL,Amount)
        VALUES('$email','$Image_url','$amount');";
            $exec_insertData = mysqli_query($mysqli, $insertData);
            header("location:../HTML FILES/computer_project.php");

            // echo '<script> alert("successfully inserted");</script>';
        } else {
            echo "<script> alert('Insufficient Balance to purchase This.'); </script>";
        }
    }
}


if (isset($_POST['inquire'])) {
    $userName = $_POST['username'];
    $email_id = $_POST['inquireEmail'];
    $typeOFProject = $_POST['typeOfProject'];
    $amount = $_POST['amount'];


    $availability = "SELECT * FROM computerprojectinquiries 
    WHERE(Email_Address = '$email_id');";
    $exec_availability = mysqli_query($mysqli, $availability);

    if (mysqli_num_rows($exec_availability) > 0) {
        header("location:../HTML FILES/computer_project.php");
    } else {
        include('../PHP/Account_Balance.php');
        $account = $Account_Balance;
        if ($account >= $amount) {
            $currentDate = new DateTime();
            $currentDate->modify('+7 days');

            $dateOfInterview = $currentDate->format('Y-m-d');

            $insertInquiries = "INSERT INTO computerprojectinquiries (Email_Address,User_Name,Type_Of_Project,Date_Of_Interview,Cost)
                        VALUES('$email_id','$userName','$typeOFProject','$dateOfInterview','$amount');";

            $exec_insertInquiries = mysqli_query($mysqli, $insertInquiries);
            // echo '<script> alert("successfully applied");</script>';

            header("location:../HTML FILES/computer_project.php");
        } else {
            echo "<script> alert('Insufficient Balance to Inquire..'); </script>";
        }
    }
}




if (isset($_POST['apply'])) {
    $email = $_POST['email_address'];

    $user_available = "SELECT * FROM  computer_offices_applications WHERE(Email_Address = '$email');";
    $exec_user_available = mysqli_query($mysqli, $user_available);

    if (mysqli_num_rows($exec_user_available) > 0) {
        //we update
        header("location:../HTML FILES/computer_project.php");
    } else {

        include('../PHP/Account_Balance.php');
        $account = $Account_Balance;
        $cost = $_POST['amount'];

        if ($account >= $cost) {

            $username = $_POST['username'];
            $officetype = $_POST['officeType'];

            $currentDate = new DateTime();
            $currentDate->modify('+7 days');

            $dateOfInterviewOffice = $currentDate->format('Y-m-d');

            $insertApplication = "INSERT INTO computer_offices_applications(Email_Address,User_Name,Type_Of_Office,Interview_Date,Cost) VALUES('$email','$username','$officetype','$dateOfInterviewOffice','$cost');";
            $exec_insertApplication = mysqli_query($mysqli, $insertApplication);
            header("location:../HTML FILES/computer_project.php");

            // echo '<script> alert("successfully applied offices");</script>';
        } else {
            echo "<script> alert('Insufficient Balance to Apply..'); </script>";
        }
    }
}


// ==========================


if (isset($_POST['purchaseFile'])) {
    $email = $_SESSION['LOGGED_IN_EMAIL'];
    $fileName = $_POST['file'];
    $cost = $_POST['cost'];

    $check_user_Record = "SELECT * FROM computerprojectfiles WHERE(Email_Address = '$email' AND Document = '$fileName');";
    $exec_check_user_Record = mysqli_query($mysqli, $check_user_Record);

    if (mysqli_num_rows($exec_check_user_Record) > 0) {
        header("location:../HTML FILES/computer_project.php");
    } else {
        include('../PHP/Account_Balance.php');
        $account = $Account_Balance;
        if ($account >= $cost) {

            $insert_The_Record = "INSERT INTO computerprojectfiles(Email_Address,Document,Cost)
                                    VALUES('$email','$fileName','$cost');";
            $exec_insert_The_Record = mysqli_query($mysqli, $insert_The_Record);
            // echo '<script> alert("successfull purchase"); </script>';
            header("location:../HTML FILES/computer_project.php");
        } else {
            echo "<script> alert('Insufficient Balance to purchase the project...'); </script>";
        }
    }
}


// ==========================


if (isset($_POST['purchaseFile2'])) {
    $email = $_SESSION['LOGGED_IN_EMAIL'];
    $fileName2 = $_POST['file2'];
    $cost = $_POST['cost'];

    $check_user_Record2 = "SELECT * FROM computerprojectfiles WHERE(Email_Address = '$email' AND Document = '$fileName2');";
    $exec_check_user_Record2 = mysqli_query($mysqli, $check_user_Record2);

    if (mysqli_num_rows($exec_check_user_Record2) > 0) {
        header("location:../HTML FILES/computer_project.php");
    } else {
        include('../PHP/Account_Balance.php');
        $account = $Account_Balance;
        if ($account >= $cost) {

            $insert_The_Record2 = "INSERT INTO computerprojectfiles(Email_Address,Document,Cost)
                                    VALUES('$email','$fileName2','$cost');";
            $exec_insert_The_Record2 = mysqli_query($mysqli, $insert_The_Record2);
            // echo '<script> alert("successfull purchase"); </script>';
            header("location:../HTML FILES/computer_project.php");
        } else {
            echo "<script> alert('Insufficient Balance to purchase the project...'); </script>";
        }
    }
}




// ==========================


if (isset($_POST['purchaseFile3'])) {
    $email = $_SESSION['LOGGED_IN_EMAIL'];
    $fileName3 = $_POST['file3'];
    $cost = $_POST['cost'];


    $check_user_Record3 = "SELECT * FROM computerprojectfiles WHERE(Email_Address = '$email' AND Document = '$fileName3');";
    $exec_check_user_Record3 = mysqli_query($mysqli, $check_user_Record3);

    if (mysqli_num_rows($exec_check_user_Record3) > 0) {
        header("location:../HTML FILES/computer_project.php");
    } else {
        include('../PHP/Account_Balance.php');
        $account = $Account_Balance;
        if ($account >= $cost) {
            $insert_The_Record3 = "INSERT INTO computerprojectfiles(Email_Address,Document)
                                VALUES('$email','$fileName3');";
            $exec_insert_The_Record3 = mysqli_query($mysqli, $insert_The_Record3);
            // echo '<script> alert("successfull purchase 3"); </script>';
            header("location:../HTML FILES/computer_project.php");
        } else {
            echo "<script> alert('Insufficient Balance to purchase the project...'); </script>";
        }
    }
}

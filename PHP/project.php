<?php
session_start();

include('./connection.php');



if (isset($_POST['mytip'])) {
    include('../PHP/Account_Balance.php');
    $account = $Account_Balance;
    $email_id = $_SESSION['LOGGED_IN_EMAIL'];
    $Tips = $_POST['imageURL'];
    $amountCost = $_POST['amountCost'];


    // lets check if that user exists

    $userAvailable = "SELECT * FROM purchasebettips 
                        WHERE(Email_Address = '$email_id' AND Tip_URL = '$Tips');";
    $exec_userAvailable = mysqli_query($mysqli, $userAvailable);

    if (mysqli_num_rows($exec_userAvailable) > 0) {
        //we update
        // header('location: ../HTML FILES/projectmain.php');
        echo "<script> alert('You have purchased Already'); </script>";
    } else {

        if ($account >= $amountCost) {
            $insertPayementToday = "INSERT INTO purchasebettips (Email_Address,Tip_URL,Amount)
                                     VALUES('$email_id','$Tips','$amountCost');";
            $exec_insertPayementToday = mysqli_query($mysqli, $insertPayementToday);
            // header('location: ../HTML FILES/projectmain.php');
        } else {
            echo "<script> alert('Insufficient Balance!'); </script>";
        }
    }
}
// ===============================================
if (isset($_POST['buy'])) {
    $email_id = $_SESSION['LOGGED_IN_EMAIL'];
    $Tip = $_POST['tip'];
    $amountBuy = $_POST['amount'];

    $check_the_user = "SELECT * FROM purchasebettips WHERE(Email_Address = '$email_id' AND Tip_URL = '$Tip');";
    $exec_check_the_user = mysqli_query($mysqli, $check_the_user);
    if (mysqli_num_rows($exec_check_the_user) > 0) {
        echo "Already Purchased Dude!!!";
        // header("location:../HTML FILES/project.php");
    } else {
        include('../PHP/Account_Balance.php');
        $account = $Account_Balance;
        if ($account >= $amountBuy) {

            //we insert
            $insert_the_user = "INSERT INTO purchasebettips(Email_Address,Tip_URL,Amount) VALUES('$email_id','$Tip','$amountBuy');";
            $exec_insert_the_user = mysqli_query($mysqli, $insert_the_user);
            header("location:../HTML FILES/projectmain.php");
            // echo "<script> alert('purchased!'); </script>";
        } else {
            echo "<script> alert('Insufficient Balance!'); </script>";
        }
    }
}

// ==============================================

if (isset($_POST['delete'])) {
    // Retrieve the image name from the POST data
    $image_name = $_POST['image_name'];

    // Perform the deletion in the database
    $email = $_SESSION['LOGGED_IN_EMAIL'];
    $delete_query = "DELETE FROM bettips_table WHERE Email_Address = '$email' AND Bet_Image LIKE '%$image_name%';";
    $exec_delete = mysqli_query($mysqli, $delete_query);

    if ($exec_delete) {
        // Deletion successful
        header('location: ../HTML FILES/projectmain.php');
    } else {
        // Deletion failed
        echo "Error deleting record: " . mysqli_error($mysqli);
    }
}

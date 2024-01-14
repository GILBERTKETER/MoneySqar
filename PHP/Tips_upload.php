<?php

session_start();
include "../PHP/connection.php";

$email = $_SESSION['LOGGED_IN_EMAIL'];



if (isset($_POST['submit']) && isset($_FILES['my_image'])) {

    echo "<pre>";
    print_r($_FILES['my_image']);
    echo "</pre>";

    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    $date_of_expiry = $_POST['date_of_expiry'];
    $time_of_expiry = $_POST['time_of_expiry'];
    $description = $_POST['description'];
    $Total_odds = $_POST['total_odds'];
    $amount_of_odds = $_POST['cost_of_odds'];

    if ($error === 0) {
        if ($img_size > 125000) {
            $em = "Sorry, your file is too large.";
            header("Location: ../HTML FILES/projectmain.php?error='$em'");
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = '../Bet_Tips/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // Insert into Database
                $sql = "INSERT INTO bettips_table(Email_Address,Bet_Image,Date_Of_Expiry,Time_Of_Expiry,Description,Total_Odds,Cost_of_Odds)
        VALUES('$email','$new_img_name','$date_of_expiry','$time_of_expiry','$description','$Total_odds','$amount_of_odds');";
                mysqli_query($mysqli, $sql);
                header("Location: ../HTML FILES/projectmain.php");
            } else {
                $em = "You can't upload files of this type";
            }
        }
    } else {
        $em = "unknown error occurred!";
        header("Location: ../HTML FILES/projectmain.php?error='$em'");
    }
} else {
    header("Location: ../HTML FILES/projectmain.php");
}

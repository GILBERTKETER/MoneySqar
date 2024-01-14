<?php
session_start();
include "../PHP/connection.php";

$email = $_SESSION['LOGGED_IN_EMAIL'];

$check_image = "SELECT * FROM images
                WHERE (Email_Address = '$email');";
$exec_check_image = mysqli_query($mysqli, $check_image);



if (isset($_POST['submit']) && isset($_FILES['my_image'])) {

    echo "<pre>";
    print_r($_FILES['my_image']);
    echo "</pre>";

    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    if ($error === 0) {
        if ($img_size > 125000) {
            $em = "Sorry, your file is too large.";
            header("Location: ../HTML FILES/index.php?error='$em'");
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = '../uploads/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // Insert into Database
                if (mysqli_num_rows($exec_check_image) > 0) {
                    while ($Row_exec_check_image = mysqli_fetch_assoc($exec_check_image)) {
                        $Email_inside = $Row_exec_check_image['Email_Address'];
                        $update_img = "UPDATE images
                        SET image_url = '$new_img_name'
                        WHERE(Email_Address = '$Email_inside');";
                        mysqli_query($mysqli, $update_img);
                        header("Location: ../HTML FILES/index.php");
                    }
                } else {


                    $sql = "INSERT INTO images(Email_Address,image_url)
        VALUES('$email','$new_img_name')";
                    mysqli_query($mysqli, $sql);
                    header("Location: ../HTML FILES/index.php");
                }
            } else {
                $em = "You can't upload files of this type";
                header("Location: ../HTML FILES/index.php?error='$em'");
            }
        }
    } else {
        $em = "unknown error occurred!";
        header("Location: ../HTML FILES/index.php?error='$em'");
    }
} else {
    header("Location: ../HTML FILES/index.php");
}

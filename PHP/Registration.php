<?php
$EMAIL_ADDRESS = $_POST['email'];
$FIRST_NAME = $_POST['fname'];
$LAST_NAME = $_POST['lname'];
$USER_NAME = $_POST['username'];
$PASSWORD = $_POST['password'];
$CPASSWORD = $_POST['cpassword'];
$rusername = trim($_POST['Refferer_username']);

// Create a new MySQLi object and establish a connection
$mysqli = new mysqli("localhost", "root", "WEB DESIGNER", "Money_Sqar_SNet_Technologies");

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_CheckQuery = "SELECT * FROM moneysqar_registered_users WHERE Email_Address = '$EMAIL_ADDRESS'";
    $userName_CheckQuery = "SELECT * FROM moneysqar_registered_users WHERE User_Name = '$USER_NAME'";
    $results1 = $mysqli->query($email_CheckQuery);
    $results2 = $mysqli->query($userName_CheckQuery);

    if ($results1->num_rows > 0) {
        $error = "Email Is Already Registered!";
        header("Location: ../HTML FILES/Login_systemmain.php?error=" . urlencode($error));
    } else if ($results2->num_rows > 0) {
        $error = "UserName Taken!";
        header("Location: ../HTML FILES/Login_systemmain.php?error=" . urlencode($error));
    } else if ($PASSWORD != $CPASSWORD) {
        $error = "Passwords don't match!";
        header("Location: ../HTML FILES/Login_systemmain.php?error=" . urlencode($error));
    } else {
        $hashed_password = password_hash($PASSWORD, PASSWORD_BCRYPT);
        $sql = "INSERT INTO moneysqar_registered_users (Email_Address, First_Name, Last_Name, User_Name, Password, refferer_UserName) 
                VALUES ('$EMAIL_ADDRESS', '$FIRST_NAME', '$LAST_NAME', '$USER_NAME', '$hashed_password', '$rusername');";

        if ($mysqli->query($sql) === TRUE) {
            header("Location: ../HTML FILES/Login_systemmain.php");
        } else {
            echo ("Error: " . $sql . "<br>" . $mysqli->error);
        }
    }
}

// Close the connection
$mysqli->close();

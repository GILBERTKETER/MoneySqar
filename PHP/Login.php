<?php
session_start();
include('../PHP/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    function sanitize($data)
    {
        global $mysqli;
        return mysqli_real_escape_string($mysqli, $data);
    }

    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);

    $sql = "SELECT * FROM moneysqar_registered_users WHERE Email_Address = '$email'";
    $result = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verify password
        if (password_verify($password, $user['Password'])) {
            $_SESSION['LOGGED_IN_EMAIL'] = $user['Email_Address'];

            header("Location: ../HTML FILES/index.php");
            exit();
        } else {
            $error = "Incorrect password combination!";
            header("Location: ../HTML FILES/Login_systemmain.php?error=" . urlencode($error));
            exit();
        }
    } else {
        $error = "Email is not registered!";
        header("Location: ../HTML FILES/Login_systemmain.php?error=" . urlencode($error));
        exit();
    }
}

// Close the connection
$mysqli->close();

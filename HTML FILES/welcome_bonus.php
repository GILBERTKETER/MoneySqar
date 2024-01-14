<?php
session_start();
include('../PHP/connection.php');
if (!isset($_SESSION['LOGGED_IN_EMAIL'])) {
    header("Location:../HTML FILES/Login_systemmain.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome_Bonus-Money_Sqar_Technologies</title>

    <!--STYLESHEET LINK-->
    <link rel="stylesheet" href="../CSS FILES/style.css">
    <link rel="stylesheet" href="../CSS FILES/welcome_bonus.css">
    <!--MATERIAL ICONS CDN-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!--GOOGLE FONTS(POPPINS)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!--FONT AWESOME LINK-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--FAVICON LINK-->
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon_io/favicon-16x16.png">
    <link rel="manifest" href="../favicon_io/site.webmanifest">

</head>

<body>

    <!--NAV BAR BEGINS-->
    <?php
    include('../PHP/navigation.php');

    ?>
    <!--END OF NAV BAR-->


    <div class="welcome_page">
        <div class="karibu_bonus">
            <h2>Redeem your welcome bonus</h2>

            <div class="downlines-required">
                <h3>Required level 1 downlines</h3>
                <h3>20</h3>
            </div>

            <div class="downlines-activated">
                <h3>activated level 1 downlines</h3>
                <h3><?php
                    include('../PHP//reffer.php');
                    echo $countlevel1; ?></h3>
            </div>

            <div class="redeem-button">
                <p>The Bonus will be automatically added to the wallet once the conditions are met</p>
            </div>

        </div>



        <div class="karibu_bonus">
            <h2>your level downlines</h2>
            <table>
                <thead>
                    <tr>
                        <th>Joined</th>
                        <th>Username</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>

                        <?php


                        //query to check level 1 users who have paid
                        $username = $_SESSION['LOGGED_IN_USERNAME'];

                        $Activated_level1 = "SELECT * FROM moneysqar_registered_users
                                             WHERE (refferer_UserName = '$username' AND Activation_Amount = 500);";

                        $exec_Activated_level1 = mysqli_query($mysqli, $Activated_level1);


                        if (mysqli_num_rows($exec_Activated_level1) > 0) {


                            while ($row = mysqli_fetch_assoc($exec_Activated_level1)) {
                        ?>

                                <td>
                                    <?php
                                    echo $row['Date_Registered'];

                                    ?>
                                </td>

                                <td>
                                    <?php
                                    echo $row['User_Name'];

                                    ?>
                                </td>

                    </tr>

            <?php

                            }
                        }
            ?>

            </tr>
                </tbody>
            </table>

        </div>
    </div>



    <script src="../JS FILES/script.js"></script>

</body>

</html>
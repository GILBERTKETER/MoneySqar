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
    <title>Dormant_Downlines-Money_Sqar_Technologies</title>

    <!--STYLESHEET LINK-->
    <link rel="stylesheet" href="../CSS FILES/style.css">
    <link rel="stylesheet" href="../CSS FILES/dormant_downlines.css">
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

    <div class="dormant_downlines">
        <div class="dormant-list">
            <h3>Dormant level 1 downlines</h3>
            <table>
                <thead>
                    <tr>
                        <th>Joined</th>
                        <th>username</th>
                        <th>phone no</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php


                        include('../PHP/DormantDownlinesquery.php');


                        if (mysqli_num_rows($Query_sql) > 0) {


                            while ($row = mysqli_fetch_assoc($Query_sql)) {
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
                                <td>
                                    <?php
                                    echo $row['Phone_No'];

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

        <?php
        ?>
    </div>

    <script src="../JS FILES/script.js"></script>

</body>

</html>
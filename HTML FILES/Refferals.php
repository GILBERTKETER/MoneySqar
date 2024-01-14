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
    <title>Refferals-Money_Sqar_Technologies</title>

    <!--STYLESHEET LINK-->
    <link rel="stylesheet" href="../CSS FILES/style.css">
    <link rel="stylesheet" href="../CSS FILES/Refferals.css">
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




    <div class="refferals-body">


        <div class="refferals">
            <div class="refferals-container">


                <div class="refferals-card">
                    <div class="card-top">
                        <h3>level 1</h3>
                        <?php

                        include('../PHP/reffer.php');

                        ?>

                        <h2>
                            <?php
                            include('../PHP/reffer.php');

                            echo $countlevel1;
                            $Total_Level1_Downlines = intval($countlevel1);
                            ?>
                        </h2>
                        <small>view all</small>
                    </div>
                </div>

                <div class="refferals-card">
                    <div class="card-top">
                        <h3>level 2 </h3>
                        <h2>

                            <?php

                            $email_id = $_SESSION['LOGGED_IN_EMAIL'];
                            $username = $_SESSION['LOGGED_IN_USERNAME'];

                            include('../PHP/reffer.php');


                            echo $Total_Level2_Downlines;

                            ?>

                        </h2>
                        <small>view all</small>
                    </div>
                </div>

                <div class="refferals-card">
                    <div class="card-top">
                        <h3>level 3</h3>
                        <h2>
                            <?php

                            include('../PHP/reffer.php');

                            ?>
                            <?php
                            //print_r($level22_User_Names);

                            echo $Total_Level3_downlines;
                            ?>

                        </h2>
                        <small>view all</small>
                    </div>
                </div>

                <div class="refferals-card">
                    <div class="card-top">
                        <h3>Total l1-l3 active Downlines</h3>
                        <?php
                        $total_active = $Total_Level2_Downlines + $Total_Level3_downlines + $countlevel1;
                        $_SESSION['TOTAL_ACTIVE'] = $total_active;
                        ?>

                        <h2>
                            <?php echo $total_active; ?>
                        </h2>
                    </div>
                </div>

                <?php
                include('../PHP/Login.php');

                ?>
            </div>
        </div>
    </div>

    <script src="../JS FILES/script.js"></script>

</body>

</html>
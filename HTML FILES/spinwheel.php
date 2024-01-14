<?php
session_start();
include('../PHP/connection.php');


if (!isset($_SESSION['LOGGED_IN_EMAIL'])) {
    header("Location:../HTML FILES/Login_systemmain.php");
    exit();
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS FILES/spinwheel.css">
    <title>Spin Wheel-MoneySqar_Technologies</title>
    <link rel="stylesheet" href="../CSS FILES/style.css">

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

    <style>
        .container .highlight {
            border-color: red;
        }
    </style>

</head>

<body>



    <!--NAV BAR BEGINS-->
    <?php
    include('../PHP/navigation.php');
    ?>
    <!--END OF NAV BAR-->
    <!-- Assuming you have an element with the ID "account-balance" -->


    <div class="body" id="body-2">
        <span id="account-balance" hidden><?php
                                            include('../PHP/Account_Balance.php');
                                            echo $Account_Balance;
                                            ?></span>

        <!-- <form action="../PHP/Spin_insert.php"> -->
        <button name="spin" id="spin">Spin</button>
        <!-- </form> -->
        <span class="arrow"></span>
        <div class="container">
            <div class="one">
                <h4>KSH. 500</h4>
            </div>
            <div class="two">
                <h4>KSH. 1</h4>
            </div>
            <div class="three">
                <h4>KSH. 0</h4>
            </div>
            <div class="four">
                <h4>KSH. 100</h4>
            </div>
            <div class="five">
                <h4>KSH. 5</h4>
            </div>
            <div class="six">
                <h4>KSH. 50</h4>
            </div>
            <div class="seven">
                <h4>KSH. 10</h4>
            </div>
            <div class="eight">
                <h4>KSH. 1</h4>
            </div>
        </div>
    </div>

    <script src="../JS FILES/spinwheel.js"></script>
    <script src="../JS FILES/script.js"></script>
</body>

</html>
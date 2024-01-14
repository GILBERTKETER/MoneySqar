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
    <title>Get_Help-MoneySqar_Technologies</title>

    <!--STYLESHEET LINK-->
    <link rel="stylesheet" href="../CSS FILES/style.css">
    <link rel="stylesheet" href="../CSS FILES/get_help.css">
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

<body class="get-help-body">



    <!--NAV BAR BEGINS-->
    <?php
    include('../PHP/navigation.php');
    ?>
    <!--END OF NAV BAR-->


    <div class="help-section">
        <div class="help-page">
            <div getclass="help">
                <h3>welcome to money sqar help page</h3>
                <p class="p">please chat the admin to get help in the button below

                    thank you so much for visiting our customer care page. Please contact the admin below and be
                    patient. Requests shall be responded to you upon 24hrs
                    <br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, voluptatem aliquam cum, at,
                    blanditiis perferendis deleniti eligendi officiis debitis nulla eaque! Similique, magnam doloribus.
                    Veritatis natus nemo labore deleniti voluptatem.
                </p>
                <div class="flex-area">
                    <input type="textarea" placeholder="Enter your Issue">
                    <!-- <a href="mail:gilbertketer759@gmail.com" id="chat_btn">chat admin</button> -->
                    <a href = "mailto: gilbertketer759@gmail.com">Chat Admin</a>

                </div>


            </div>
        </div>


        <!-- chat section starts  -->
    </div>



    <script src="../JS FILES/script.js"></script>
</body>

</html>
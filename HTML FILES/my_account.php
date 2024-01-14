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
    <title>My_Account-Money_Sqar_Technologies</title>

    <!--STYLESHEET LINK-->
    <link rel="stylesheet" href="../CSS FILES/style.css">
    <link rel="stylesheet" href="../CSS FILES/my_account.css">
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



    <div class="profile">

        <div class="my-profile">
            <h2>my Account Details</h2>

            <div class="details">
                <?php
                $email = $_SESSION['LOGGED_IN_EMAIL'];

                //getting the tossing earnings
                $Tossing = "SELECT * FROM coin_tossing
                               WHERE(Email_Address = '$email');";
                $exec_Tossing = mysqli_query($mysqli, $Tossing);

                if (mysqli_num_rows($exec_Tossing) > 0) {
                    while ($Row_exec_Tossing = mysqli_fetch_assoc($exec_Tossing)) {
                        $Tossing_Earnings = $Row_exec_Tossing['Tossing_Earnings'];
                    }
                } else {
                    $Tossing_Earnings = 0;
                }

                //getting the trivia earnings
                $Trivia = "SELECT * FROM trivia_table
                                WHERE(Email_Address = '$email');";
                $exec_Trivia = mysqli_query($mysqli, $Trivia);
                $Trivia_Earnings = 0;
                if (mysqli_num_rows($exec_Trivia) > 0) {

                    while ($Row_exec_Trivia = mysqli_fetch_assoc($exec_Trivia)) {
                        $Trivia_Earnings = $Row_exec_Trivia['Trivia_Earnings'];
                    }
                } else {
                    $Trivia_Earnings = 0;
                }

                //getting the spinwheel earnings
                $Spinwheel = "SELECT * FROM spinwheel_table
                                 WHERE(Email_Address = '$email');";
                $exec_Spinwheel = mysqli_query($mysqli, $Spinwheel);
                if (mysqli_num_rows($exec_Spinwheel) > 0) {
                    while ($Row_exec_Spinwheel = mysqli_fetch_assoc($exec_Spinwheel)) {

                        $Spinwheel_Earnings = $Row_exec_Spinwheel['Spinwheel_Earnings'];
                    }
                } else {
                    $Spinwheel_Earnings = 0;
                }

                //getting the Lucky_Number earnings
                $Lucky_Number = "SELECT * FROM luckynumber_table
          WHERE(Email_Address = '$email');";
                $exec_Lucky_Number = mysqli_query($mysqli, $Lucky_Number);

                if (mysqli_num_rows($exec_Lucky_Number) > 0) {
                    while ($Row_exec_Lucky_Number = mysqli_fetch_assoc($exec_Lucky_Number)) {
                        $Lucky_Number_Earnings = $Row_exec_Lucky_Number['Lucky_Number_Earnings'];
                    }
                } else {
                    $Lucky_Number_Earnings = 0;
                }

                //getting the  Video_Earnings earnings
                $Video_Earnings = "SELECT * FROM video_earnings
        WHERE(Email_Address = '$email');";
                $exec_Video_Earnings = mysqli_query($mysqli, $Video_Earnings);

                if (mysqli_num_rows($exec_Video_Earnings) > 0) {
                    while ($Row_exec_Video_Earnings = mysqli_fetch_assoc($exec_Video_Earnings)) {
                        $Video_Earnings_Now = $Row_exec_Video_Earnings['Total_Earnings'];
                    }
                } else {
                    $Video_Earnings_Now = 0;
                }

                //getting the  refferals earnings
                $Refferals_Earnings = "SELECT * FROM refferals_earnings
         WHERE(Email_Address = '$email');";
                $exec_Refferals_Earnings = mysqli_query($mysqli, $Refferals_Earnings);

                if (mysqli_num_rows($exec_Refferals_Earnings) > 0) {
                    while ($Row_exec_Refferals_Earnings = mysqli_fetch_assoc($exec_Refferals_Earnings)) {
                        $Refferals_Earnings_Now = $Row_exec_Refferals_Earnings['Total_Earnings'];
                    }
                } else {
                    $Refferals_Earnings_Now = 0;
                }

                //getting the  welcome bonus earnings
                $Welcome_Bonus = "SELECT * FROM moneysqar_registered_users
           WHERE(Email_Address = '$email');";
                $exec_Welcome_Bonus = mysqli_query($mysqli, $Welcome_Bonus);

                if (mysqli_num_rows($exec_Welcome_Bonus) > 0) {
                    while ($Row_exec_Welcome_Bonus = mysqli_fetch_assoc($exec_Welcome_Bonus)) {
                        $Welcome_Bonus_Earnings = $Row_exec_Welcome_Bonus['Welcome_Bonus'];
                    }
                } else {
                    $Welcome_Bonus_Earnings = 0;
                }


                ?>

                <div class="flex">
                    <h4>Trivia Earnings</h4>
                    <h4>
                        <?php
                        echo $Trivia_Earnings;
                        ?>
                    </h4>
                </div>

                <div class="flex">
                    <h4>spinwheel earnings</h4>
                    <h4>
                        <?php
                        echo $Spinwheel_Earnings;
                        ?>
                    </h4>
                </div>

                <div class="flex">
                    <h4>Coin Tossing</h4>
                    <h4><?php echo $Tossing_Earnings; ?></h4>
                </div>

                <div class="flex">
                    <h4>lucky number draw</h4>
                    <h4><?php echo $Lucky_Number_Earnings; ?></h4>
                </div>

                <div class="flex">
                    <h4>video earnings</h4>
                    <h4><?php echo $Video_Earnings_Now; ?></h4>
                </div>

                <div class="flex">
                    <h4>Refferals Earnings</h4>
                    <h4><?php echo $Refferals_Earnings_Now; ?></h4>
                </div>
                <div class="flex">
                    <h4>welcome bonus</h4>
                    <h4><?php echo $Welcome_Bonus_Earnings; ?></h4>
                </div>
                <div class="flex">
                    <h4>Total profit</h4>
                    <h4><?php
                        $total_profit = $Trivia_Earnings + $Spinwheel_Earnings + $Tossing_Earnings + $Lucky_Number_Earnings + $Video_Earnings_Now + $Refferals_Earnings_Now;
                        echo $total_profit;
                        ?></h4>
                </div>
            </div>
        </div>


        <script src="../JS FILES/script.js"></script>
</body>

</html>
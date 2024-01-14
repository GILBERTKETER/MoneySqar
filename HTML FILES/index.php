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
    <meta name="color" content="rgb(16, 72, 190)">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneySqar_Softnet_Technologies</title>
    <!--STYLESHEET LINK-->
    <link rel="stylesheet" href="../CSS FILES/main.css">
    <!--MATERIAL ICONS CDN-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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

<body id="body">

    <!--NAV BAR BEGINS-->
    <?php
    include('../PHP/navigation.php');


    ?>
    <!--END OF NAV BAR-->





    <!--BEGINING OF MENU LIST-->

    <aside>
        <div class="menu-bar opac" id="menu-bar">
            <div class="top-level">
                <img src="../ASSETS/logo-4.png" alt="">
                <h3 id="logo-name">MONEY SQAR</h3>

            </div>
            <hr>


            <div class="menu-list">
                <ul class="my-list">
                    <li class="list" id="dash"><span class="material-symbols-outlined">
                            dashboard
                        </span>Dashboard</li>


                    <li id="list-22" class="list"><span class="material-symbols-outlined">
                            money
                        </span>Recharge <span class="material-symbols-sharp">
                            chevron_right
                        </span>

                        <ul id="list-2" class="sub-list">

                            <h3>Top Up</h3>
                            <a href="../HTML FILES/Recharge.php">
                                <li style="color:var(--color-gray-light);">Deposit funds</li>
                            </a>
                            <a href="../HTML FILES/Recharge-history.php">
                                <li style="color:var(--color-gray-light);">recharge history</li>
                            </a>
                        </ul>
                    </li>





                    <li id="list-33" class="list"><span class="material-symbols-outlined">
                            redeem
                        </span>Withdraw <span class="material-symbols-sharp">
                            chevron_right
                        </span>

                        <ul class="sub-list" id="list-3">

                            <a href="../HTML FILES/withdraw_funds.php">
                                <li style="color: var(--color-gray-light);">withdraw funds</li>
                            </a>
                            <a href="../HTML FILES/withdrawal_history.php">
                                <li style="color: var(--color-gray-light);">withdrawal history</li>
                            </a>

                        </ul>
                    </li>


                    <a href="../HTML FILES/my_account.php">
                        <li class="list"><span class="material-symbols-outlined">
                                account_balance
                            </span>my account</li>
                    </a>



                    <li class="list" id="list-44"><span class="material-symbols-outlined">
                            hub
                        </span>Referals <span class="material-symbols-sharp">
                            chevron_right
                        </span>

                        <ul class="sub-list" id="list-4">
                            <h3 style="text-transform: capitalize;">refferal summary</h3>
                            <a href="../HTML FILES/Refferals.php">
                                <li style="color: var(--color-gray-light);">Activated downlines</li>
                            </a>
                            <a href="../HTML FILES/dormant_downlines.php">
                                <li style="color: var(--color-gray-light);">pending downlines</li>
                            </a>
                        </ul>
                    </li>



                    <a href="../HTML FILES/Trivia_MoneySqar.php">
                        <li class="list"><span class="material-symbols-outlined">
                                quiz
                            </span>Trivia quiz</li>
                    </a>




                    <a href="../HTML FILES/welcome_bonus.php">
                        <li class="list"><span class="material-symbols-outlined">
                                waving_hand
                            </span>welcome bonus </li>
                    </a>




                    <a href="../HTML FILES/computer_project.php">
                        <li class="list"><span class="material-symbols-outlined">
                                sell
                            </span>Computer Project </li>
                    </a>


                    <li class="list" id="list-55"><span class="material-symbols-outlined">
                            casino
                        </span>casino <span class="material-symbols-sharp">
                            chevron_right
                        </span>


                        <ul class="sub-list" id="list-5">

                            <li id="list-555">spinwheel
                                <span class="material-symbols-sharp">
                                    chevron_right
                                </span>

                                <ul class="sub-sub-list">
                                    <a href="./spinwheel.php" style="color:var(--color-white);">
                                        <li>welcome bonus</li>
                                    </a>
                                    <a href="./spinwheel.php" style="color:var(--color-white);">
                                        <li>kes 50/spin</li>
                                    </a>

                                </ul>
                            </li>

                            <a href="../HTML FILES/Lucky_Number_Original.php">
                                <li style="color:var(--color-gray-light); ">lucky number</li>
                            </a>

                            <a href="../HTML FILES/coin_tossing_original.php" style="color:var(--color-white);">
                                <li style="color:var(--color-gray-light); ">coin tossing</li>
                            </a>

                            <a href="../HTML FILES/projectmain.php" style="color: var(--color-gray-light);">
                                <li>Trade your bet tips</li>
                            </a>
                        </ul>
                    </li>



                    <li class="list"><span class="material-symbols-outlined">
                            insights
                        </span>Advertisements</li>



                    <li class="list" id="list-66"><span class="material-symbols-outlined">
                            sports_esports
                        </span>games <span class="material-symbols-sharp">
                            chevron_right
                        </span>


                        <ul class="sub-list" id="list-6">
                            <h3 style="text-align: left;">multi-user games</h3>

                            <a href="../chess/chess.php">
                                <li style="color: var(--color-gray-light);">chess</li>
                            </a>
                            <a href="../Checkers/checkers.php">
                                <li style="color: var(--color-gray-light);">draughts</li>
                            </a>
                        </ul>
                    </li>


                    <li class="list" id="list-77"><span class="material-symbols-outlined">
                            play_circle
                        </span>videos <span class="material-symbols-sharp">
                            chevron_right
                        </span>

                        <ul class="sub-list" id="list-7">
                            <a href="../HTML FILES/youtube.php">
                                <li style="color: var(--color-gray-light);">youtube</li>
                            </a>
                            <a href="../HTML FILES/tiktok_videos.php">
                                <li style="color: var(--color-gray-light);">tiktok</li>
                            </a>
                        </ul>
                    </li>



                    <a href="../HTML FILES/my_profile.php">
                        <li class="list"><span class="material-symbols-outlined">
                                person
                            </span>my profile</li>
                    </a>

                    <a href="../HTML FILES/support_us.php">
                        <li class="list"><span class="material-symbols-outlined">
                                support
                            </span>support us</li>
                    </a>
                    <a href="../HTML FILES/get_help.php" style="color: var(--color-gray-dark-light);">
                        <li class="list"><span class="material-symbols-outlined">
                                help
                            </span> get help</li>
                    </a>

                </ul>
            </div>


        </div>
    </aside>

    <!--END OF MENU LIST-->
    <section class="body-section">
        <div class="user-cards" id="user-cards">



            <div class="card">
                <div class="left">
                    <h3>expenses</h3>
                    <?php
                    $email = $_SESSION['LOGGED_IN_EMAIL'];
                    $expense_Amount = "SELECT * FROM moneysqar_registered_users
                                        WHERE (Email_Address = '$email');";

                    $exec_expense_Amount = mysqli_query($mysqli, $expense_Amount);
                    if (mysqli_num_rows($exec_expense_Amount) != NULL) {
                        while ($row_exec_epense_Amount = mysqli_fetch_assoc($exec_expense_Amount)) {
                            $expenses = intval($row_exec_epense_Amount['Activation_Amount']);
                        }
                    } else {
                        $expenses = NULL;
                    }



                    ?>
                    <h2><?php echo "Ksh. " . $expenses; ?></h2>
                </div>

                <div class="right">
                    <h3>Total profit</h3>
                    <h2><?php include('../PHP/Account_Balance.php');
                        echo "Ksh. " . $_expense_To_Profits;
                        ?></h2>
                    <a href="../HTML FILES/my_account.php"><small>show more</small></a>
                </div>

            </div>


            <div class="card">
                <div class="left">
                    <h3>total withdrawals</h3>
                    <h2>
                        <?php
                        $email = $_SESSION['LOGGED_IN_EMAIL'];
                        $Number_Of_withdrawals = "SELECT SUM(Amount) AS AMOUNTS FROM withdrawals_table
                                                WHERE(Email_Address = '$email');";
                        $exec_Number_Of_withdrawals = mysqli_query($mysqli, $Number_Of_withdrawals);
                        $Withdrawal_number = 0;
                        if (mysqli_num_rows($exec_Number_Of_withdrawals) > 0) {
                            while ($row_exec_Number_Of_withdrawals = mysqli_fetch_assoc($exec_Number_Of_withdrawals)) {
                                $Withdrawal_number = $Withdrawal_number + intval($row_exec_Number_Of_withdrawals['AMOUNTS']);
                            }
                        } else {
                            $Withdrawal_number = 0;
                        }



                        ?>
                        <?php
                        print_r("Ksh. " . $Withdrawal_number);
                        //echo $Total_withdrawals;
                        ?>


                    </h2>
                    <a href="../HTML FILES/withdrawal_history.php"><small>show more</small></a>
                </div>
                <div class="right">

                </div>

            </div>
            <div class="card">
                <div class="left">
                    <h3>welcome bonus</h3>
                    <h2><?php
                        $welcome_bonus_check = "SELECT * FROM moneysqar_registered_users
                                                    WHERE(Email_Address= '$email');";
                        $exec_Welcome_bonus_check = mysqli_query($mysqli, $welcome_bonus_check);
                        while ($row_exec_Welcome_bonus_check = mysqli_fetch_assoc($exec_Welcome_bonus_check)) {
                            $bonus = $row_exec_Welcome_bonus_check['Welcome_Bonus'];
                        }

                        echo "Ksh. " . $bonus;
                        ?></h2>
                    <a href="../HTML FILES/welcome_bonus.php"><small>show more</small></a>
                </div>

                <div class="right">

                </div>

            </div>
            <div class="card">
                <div class="left">
                    <h3>trivia earnings</h3>
                    <?php
                    $Trivia = "SELECT SUM(Trivia_Earnings) AS Trivia FROM trivia_table
                         WHERE(Email_Address = '$email');";
                    $exec_Trivia = mysqli_query($mysqli, $Trivia);

                    if (mysqli_num_rows($exec_Trivia) > 0) {
                        while ($row_exec_Trivia = mysqli_fetch_assoc($exec_Trivia)) {
                            $Trivia_number = intval($row_exec_Trivia['Trivia']);
                        }
                    } else {
                        $Trivia_number = 0;
                    }

                    ?>
                    <h2><?php echo "Ksh. " . $Trivia_number; ?></h2>
                </div>

                <div class="right">
                    <h3>profit</h3>

                    <?php
                    $email = $_SESSION['LOGGED_IN_EMAIL'];
                    //number of trivia done
                    $Trivia_Done = "SELECT COUNT(*) AS TRIVIAS_DONE FROM trivia_table
                                    WHERE(Email_Address= '$email');";
                    $exec_Trivia_Done = mysqli_query($mysqli, $Trivia_Done);
                    while ($row_exec_Trivia_Done = mysqli_fetch_assoc($exec_Trivia_Done)) {
                        $number_Trivia_Done = $row_exec_Trivia_Done['TRIVIAS_DONE'];
                    }
                    $trivia_profit = $Trivia_number - ($number_Trivia_Done * 50);

                    ?>
                    <h2><?php echo "Ksh. " . $trivia_profit; ?></h2>
                    <a href="../HTML FILES/Trivia_quiz.php"><small>show more</small></a>
                </div>

            </div>

            <div class="card">
                <div class="left">
                    <h3 id="video_earnings">video earnings</h3>
                    <div class="youtube">
                        <h3>youtube</h3>

                        <?php
                        //select the youtube earnings
                        $Youtube_Earnins = "SELECT SUM(Amount_Earned) AS EARNED FROM youtube_video
                                            WHERE(Email_Address = '$email');";
                        $exec_Youtube_Earnings = mysqli_query($mysqli, $Youtube_Earnins);
                        //fetch it

                        if (mysqli_num_rows($exec_Youtube_Earnings) > 0) {
                            while ($row_exec_Youtube_Earnings = mysqli_fetch_assoc($exec_Youtube_Earnings)) {
                                $Earnings_Youtube = intval($row_exec_Youtube_Earnings['EARNED']);
                            }
                        } else {
                            $Earnings_Youtube = 0;
                        }




                        ?>
                        <h2><?php echo "Ksh. " . $Earnings_Youtube; ?></h2>

                    </div>


                </div>
                <div class="right">
                    <h3 id="short_videos">short videos</h3>
                    <div class="tiktok">
                        <h3>tiktok</h3>
                        <?php
                        //select the tiktok earnings
                        $Tiktok_Earnings = "SELECT SUM(Amount_Earned) AS earned FROM tiktok_earnings
                                            WHERE(Email_Address = '$email');";
                        $exec_Tiktok_Earnings = mysqli_query($mysqli, $Tiktok_Earnings);
                        //fetch it

                        if (mysqli_num_rows($exec_Tiktok_Earnings) > 0) {
                            while ($row_exec_Tiktok_Earnings = mysqli_fetch_assoc($exec_Tiktok_Earnings)) {
                                $Earnings_Tiktok = intval($row_exec_Tiktok_Earnings['earned']);
                            }
                        } else {
                            $Earnings_Tiktok = 0;
                        }




                        ?>
                        <h2><?php echo "Ksh. " . $Earnings_Tiktok; ?></h2>
                    </div>
                </div>

            </div>
            <div class="card">
                <div class="left">
                    <h3 id="referal_earnings">refferal earnings</h3>
                    <h2>

                        <?php
                        $refferal_Earnings = "SELECT * FROM refferals_earnings
                                                WHERE(Email_Address = '$email');";
                        $exec_refferal_Earnings = mysqli_query($mysqli, $refferal_Earnings);
                        if (mysqli_num_rows($exec_refferal_Earnings) > 0) {
                            while ($row_exec_refferal_Earnings = mysqli_fetch_assoc($exec_refferal_Earnings)) {
                                $Earnings = $row_exec_refferal_Earnings['Total_Earnings'];
                            }
                        } else {
                            $Earnings = 0;
                        }
                        echo "Ksh. " . $Earnings;
                        ?>



                    </h2>
                    <h6>
                        <?php
                        include('../PHP/reffer.php');

                        echo $activ_lvls . " " . " Three-Level Refferals";
                        ?>
                    </h6>
                </div>

                <div class="right">
                    <h3 id="profits">profits made</h3>
                    <h2><?php
                        $active = 0;
                        $checkActivation = "SELECT * FROM moneysqar_registered_users WHERE(Email_Address = '$email');";
                        $exec_checkActivation = mysqli_query($mysqli, $checkActivation);
                        while ($row = mysqli_fetch_assoc($exec_checkActivation)) {
                            $active = $row['Activation_Amount'];
                        }

                        echo "Ksh " . ($Earnings - $active) ?></h2>
                    <a href="../HTML FILES/Refferals.php"><small id="small">show more</small></a>
                </div>
            </div>

            <div class="card" id="last_card">

                <div class="middle" id="middle">
                    <div class="spinwheel">
                        <h3 id="spinwheel">spinwheel</h3>

                        <?php
                        $spinwheel = "SELECT * FROM spinwheel_table
                                        WHERE(Email_Address = '$email');";
                        $exec_spinwheel = mysqli_query($mysqli, $spinwheel);
                        if (mysqli_num_rows($exec_spinwheel) > 0) {
                            while ($row_exec_spinwheel = mysqli_fetch_assoc($exec_spinwheel)) {
                                $spin_Earnings = $row_exec_spinwheel['Spinwheel_Earnings'];
                            }
                        } else {
                            $spin_Earnings = 0;
                        }





                        ?>
                        <h2><?php echo "Ksh. " . $spin_Earnings; ?></h2>
                    </div>
                </div>

                <div class="middle-end" id="middle-end">
                    <div class="coin-tossing">
                        <h3 id="tossing">tossing</h3>

                        <?php

                        //fetch the data
                        $Tossing = "SELECT * FROM coin_tossing  
                                    WHERE(Email_Address = '$email');";
                        $exec_Tossing = mysqli_query($mysqli, $Tossing);
                        if (mysqli_num_rows($exec_Tossing) > 0) {
                            while ($row_exec_Tossing = mysqli_fetch_assoc($exec_Tossing)) {
                                $Toss_Earnings = $row_exec_Tossing['Tossing_Earnings'];
                            }
                        } else {
                            $Toss_Earnings = 0;
                        }


                        ?>
                        <h2><?php echo "Ksh. " . $Toss_Earnings; ?></h2>
                    </div>
                </div>

                <div class="right" id="right">
                    <div class="lucky-number">
                        <h3 id="lucky">luckynumber</h3>

                        <?php

                        $lucky_Earnings = "SELECT * FROM  luckynumber_table
                                            WHERE(Email_Address = '$email');";
                        $exec_lucky_Earnings = mysqli_query($mysqli, $lucky_Earnings);

                        if (mysqli_num_rows($exec_lucky_Earnings) > 0) {
                            while ($row_exec_lucky_Earnings = mysqli_fetch_assoc($exec_lucky_Earnings)) {
                                $Lucky_number_Earnings = $row_exec_lucky_Earnings['Lucky_Number_Earnings'];
                            }
                        } else {
                            $Lucky_number_Earnings = 0;
                        }

                        ?>
                        <h2><?php echo "Ksh. " . $Lucky_number_Earnings; ?></h2>
                        <small>show more</small>
                    </div>
                </div>

            </div>
            <div class="card">
                <div class="left">
                    <h3>Bet Tips Earnings</h3>
                    <h2><?php
                        $earns = 0;
                        $_BetTipsEarnings = "SELECT SUM(Total_Earned) AS BetTipsEarnings FROM bettips_table
                    WHERE(Email_Address = '$email');";
                        $execute_earnings = mysqli_query($mysqli, $_BetTipsEarnings);
                        if (mysqli_num_rows($execute_earnings) > 0) {
                            while ($row_Bets = mysqli_fetch_assoc($execute_earnings)) {
                                $earns = $earns + intval($row_Bets['BetTipsEarnings']);
                            }
                        } else {
                            $earns = 0;
                        }
                        echo "Ksh. " . $earns;

                        ?></h2>
                </div>

                <div class="right">
                    <h3>profit</h3>
                    <h2>ksh 344</h2>
                    <small>show more</small>
                </div>

            </div>
            <div class="card">
                <div class="left">
                    <h3>Account balance</h3>
                    <h2><?php include('../PHP/Account_Balance.php');

                        echo "Ksh." . $Account_Balance;
                        ?></h2>
                </div>

                <div class="right">
                    <h3>profit</h3>
                    <h2><?php include('../PHP/Account_Balance.php');
                        echo "Ksh. " . $profits;
                        ?></h2>
                    <a href="../HTML FILES/my_account.php"><small>show more</small></a>
                </div>

            </div>

        </div>








        <!--GRAPH SECTION BEGINS-->
        <div class="graph-area" id="graph-area">
            <div id="chart">
                <h2>Your progress</h2>
                <div id="chart_div">
                    <canvas id="myChart"></canvas>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            </div>
        </div>

        <!--GRAPH SECTION ENDS-->



        <!--referals begins-->
        <div class="referal-link" id="referal-link">
            <div class="reffer">
                <?php
                $email_id = $_SESSION['LOGGED_IN_EMAIL'];

                $QueryUsername = "SELECT User_Name FROM  moneysqar_registered_users
                                 WHERE(Email_Address = '$email_id');";
                $reffererusername = mysqli_query($mysqli, $QueryUsername);
                if ($reffererusername) {
                    if ($row = $reffererusername->fetch_assoc()) {
                        $username = $row['User_Name'];
                    } else {
                        $username = '';
                    }
                    $reffererusername->free();
                } else {
                    die('Error');
                }
                $baseURL = "http://localhost//DEVELOPMENT%20PROJECTS/MONEYSQAR%20TECHNOLOGIES/HTML%20FILES/Login_systemmain.php";
                $Refferal_Link = $baseURL . '?ref=' . urlencode($username);
                ?>
                <h4>referal link</h4>
                <input type="text" id="link" class="link" value="<?php echo htmlspecialchars($Refferal_Link); ?>" placeholder="" readonly>
                <button class="copy-link" onclick="copycontent()">copy</button>
            </div>
        </div>
        <!--referals ends-->


        <div class="find_us" id="findus">

            <div class="flex">
                <h2><i class="fa-solid fa-user-plus" style="margin-right: 20px; color:var(--color-gray-light);"></i>
                    Develeopment Team</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore laboriosam a impedit. A ex
                    ducimus tempore rem accusamus eius illum, totam temporibus voluptate laborum doloribus consectetur
                    enim fuga iure ut.</p>

                <small>show more</small>

            </div>

            <div class="flex">
                <h2> <i class="fa-solid fa-link" style="margin-right: 20px; color:var(--color-gray-light);"></i>quick
                    links</h2>

                <div class="links">
                    <i class="fa-solid fa-house" style="color: var(--color-orange);"></i>
                    <i class="fa-brands fa-twitter" style="color:  rgb(30, 94, 214)"></i>
                    <i class="fa-brands fa-youtube" style="color: red;"></i>
                </div>

            </div>

            <div class="flex">
                <h2><i class="fa-regular fa-id-card" style="margin-right: 20px; color:var(--color-gray-light);"></i>
                    contact us</h2>

                <div class="links" id="links">
                    <a href="">gilbertketer759@gmail.com</a>
                    <a href="">0743890320932</a>

                </div>



            </div>

        </div>

        <div class="aside" id="aside">


            <!--UPDATES SECTION BEGINS-->



            <div class="updates-section">
                <div class="top">
                    <hr>
                    <i class="fa-sharp fa-solid fa-timer"></i> Updates
                    <hr>
                </div>

                <div class="activity">

                    <p>Request for change of password for this account
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae reiciendis quo dolorum
                        adipisci
                        amet, provident doloremque aperiam aut repellat! Magnam nesciunt commodi cupiditate
                        sapiente.
                        Magni sit odit sapiente aliquid quos.
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. </p>
                </div>


            </div>




            <!--UPDATES SECTION ENDS-->


            <div class="whatsapp-groups">

                <i class="fa-brands fa-whatsapp"></i>
                <h2>WhatsApp groups</h2>
                <hr id="hori">
                <div class="groups">
                    <div class="card">
                        <h2>group one</h2>
                        <input type="text" value="https://chat.whatsaap.com/" readonly>
                        <button>join group</button>
                    </div>

                    <div class="card">
                        <h2>group two</h2>
                        <input type="text" value="https://chat.whatsaap.com/" readonly>
                        <button>join group</button>
                    </div>

                    <div class="card">
                        <h2>group three</h2>
                        <input type="text" value="https://chat.whatsaap.com/" readonly>
                        <button>join group</button>
                    </div>
                </div>


            </div>
            <!--end of whatsapp groups-->

            <!--package area-->
            <div class="package-area">
                <h3>Package level</h3>
                <hr id="horiz">

                <div class="outer">
                    <div class="inner">
                        <div id="number">

                        </div>

                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="160px" height="160px">
                        <defs>
                            <linearGradient id="GradientColor">
                                <stop offset="0%" stop-color="#e91e63" />
                                <stop offset="100%" stop-color="#673ab7" />
                            </linearGradient>
                        </defs>
                        <circle cx="80" cy="80" r="70" stroke-linecap="round" />
                    </svg>
                </div>
                <h3 id="package">gold</h3>
            </div>
            <!--package area ends-->

        </div>
        <input type="hidden" name="MyUsername" value="
        <?php

        $email = $_SESSION['LOGGED_IN_EMAIL'];
        $Username_sql = "SELECT * FROM moneysqar_registered_users WHERE(Email_Address = '$email');";
        $execute = mysqli_query($mysqli, $Username_sql);
        if (mysqli_num_rows($execute) > 0) {
            while ($row = mysqli_fetch_assoc($execute)) {
                $realUserName = $row['User_Name'];
            }
        }
        echo trim($realUserName);
        $_SESSION['LOGGED_IN_USERNAME'] = $realUserName;

        ?>
        
        ">
    </section>
    <!--END OF MENU LIST-->


    <script>
        let number = document.getElementById("number");
        let counter = 0;

        setInterval(() => {
            if (counter == 65) {
                clearInterval();
            } else {
                counter += 1;
                number.innerHTML = counter + "%";
            }

        }, 30)
    </script>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['MON', 'TUE', 'WED', 'THUR', 'FRI', 'SAT', 'SUN'],
                datasets: [{
                    label: 'PROGRESS',
                    data: [12, 19, 3, 5, 2, 3, 2],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>

    </script>

    <script>
        function shows() {
            let info = document.getElementById("infos");

            info.classList.toggle("shows");


        }
    </script>

    <script>
        // Swipe detection variables
        let swipeStartX = 0;
        let swipeEndX = 0;

        // Minimum swipe distance (in pixels) to register as a swipe
        const minSwipeDistance = 50;

        // Add an event listener to the document for touch events
        document.addEventListener('touchstart', handleTouchStart, false);
        document.addEventListener('touchend', handleTouchEnd, false);

        // Function to handle the touchstart event
        function handleTouchStart(event) {
            swipeStartX = event.touches[0].clientX;
        }

        // Function to handle the touchend event
        function handleTouchEnd(event) {
            swipeEndX = event.changedTouches[0].clientX;
            handleSwipe();
        }

        // Function to handle the swipe gesture
        function handleSwipe() {
            const swipeDistance = swipeEndX - swipeStartX;

            if (Math.abs(swipeDistance) >= minSwipeDistance) {
                if (swipeDistance > 0) {
                    // Right swipe
                    document.querySelector(".user-cards").classList.toggle("move-right");
                    document.getElementById("menu-bar").classList.toggle("opaci");
                    document.getElementById("findus").classList.toggle("move-right");


                    if (window.screen.width > 630) {
                        document.querySelector(".graph-area").classList.toggle("mov");
                        document.getElementById("referal-link").classList.toggle("mov");


                    }


                    if (window.screen.width < 630) {
                        document.getElementById("referal-link").classList.remove("move-right");
                        document.getElementById("findus").classList.remove("move-right");
                    }

                } else {
                    // Left swipe

                    document.getElementById("aside").classList.toggle("aside-show");
                    document.querySelector(".user-cards").classList.toggle("move-left");


                    if (document.getElementsByClassName("menu-bar").classList = "opaci") {
                        //document.getElementById("menu-bar").classList.remove("opaci");
                        document.getElementById("menu-bar").classList.remove("opaci");
                        //document.getElementById("menu-bar").classList.toggle("opac");
                    }
                    if (window.screen.width > 630) {
                        document.querySelector(".graph-area").classList.toggle("mov1");
                        document.getElementById("referal-link").classList.toggle("mov1");


                    }
                }
            }
        }
    </script>

    <script>

    </script>

    <script>
        document.querySelector('html').style.transform = 'scale(1)';
        console.log(theme);
    </script>
    <script src="../JS FILES/script.js"></script>
    <script src="../JS FILES/show.js"></script>
</body>

</html>
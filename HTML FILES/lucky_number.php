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

    <title>Lucky_Number-Money_Sqar_Technologies</title>

    <!--STYLESHEET LINK-->
    <link rel="stylesheet" href="../CSS FILES/style.css">
    <link rel="stylesheet" href="../CSS FILES/lucky_number.css">
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


    <div class="lucky_body">

        <div class="container_body">
            <h2>Welcome to lucky number draw</h2>
            <div class="container">
                <p>Please note that the draw takes 30 seconds and will force a deduction of Ksh. 50 from your account
                    balance. Press the play button below to start and choose a number between 1 and 6. Good luck.</p>
                <div class="box-container">
                    <div class="play_button">
                        <button type="submit" id="play">play</button>
                    </div>

                    <div class="lucky-content">
                        <p>choose a number between 1 and 6</p>
                        <form action="" method="POST">
                            <div class="lucky">

                                <?php
                                $Lucky_Number = rand(1, 6);
                                if (isset($_POST['guess'])) {
                                    $email = $_SESSION['LOGGED_IN_EMAIL'];
                                    $userguess = $_POST['guess'];
                                    if ($userguess == $Lucky_Number) {
                                        $message = "Congratulations.You won.";
                                        $Lucky_Number_Earning_now = "SELECT * FROM luckynumber_table
                                        WHERE(Email_Address = '$email');";
                                        $exec_Lucky_Number_Earning_now = mysqli_query($mysqli, $Lucky_Number_Earning_now);
                                        if (mysqli_num_rows($exec_Lucky_Number_Earning_now) > 0) {
                                            while ($row_Lucky_Number_Earning_now = mysqli_fetch_assoc($exec_Lucky_Number_Earning_now)) {
                                                $Current_Lucky_Number_Earning_now = $row_Lucky_Number_Earning_now['Lucky_Number_Earnings'];
                                                $amountused = $row_Lucky_Number_Earning_now['Amount_Used'];
                                                $new_Lucky_Number_Earnings = $Current_Lucky_Number_Earning_now + 100;
                                                $newAmountUsed = $amountused + 50;

                                                //update the table
                                                $update_Lucky_Number_Earnings = "UPDATE luckynumber_table
                                                SET Lucky_Number_Earnings='$new_Lucky_Number_Earnings',Amount_Used = '$newAmountUsed'
                                                WHERE(Email_Address='$email');";
                                                $exec_update_Lucky_Number_Earnings = mysqli_query($mysqli, $update_Lucky_Number_Earnings);
                                            }
                                        } else {
                                            //lets insert the user into the table
                                            $Insert_Lucky_Number_User = "INSERT INTO luckynumber_table (Email_Address,Lucky_Number_Earnings,Amount_Used)
                                            VALUES('$email',100,50);";
                                            $exec_Insert_Lucky_Number_User = mysqli_query($mysqli, $Insert_Lucky_Number_User);
                                        }
                                    }
                                    if ($userguess != $Lucky_Number) {
                                        //check existence
                                        $userExists = "SELECT * FROM luckynumber_table WHERE(Email_Address = '$email');";
                                        $exec_userExists = mysqli_query($mysqli, $userExists);
                                        $message = "OOPS!You loose!";

                                        if (mysqli_num_rows($exec_userExists) > 0) {
                                            while ($rowUserExists = mysqli_fetch_assoc($exec_userExists)) {
                                                $existingEarnings = $rowUserExists['Lucky_Number_Earnings'];
                                                $exstingUsedAmount = $rowUserExists['Amount_Used'];
                                                $newUsedAmount = $exstingUsedAmount + 50;
                                                //we update
                                                $updateUserExists = "UPDATE luckynumber_table SET Amount_Used = '$newUsedAmount'
                                                                        WHERE(Email_Address = '$email');";
                                                $exec_updateuserExists = mysqli_query($mysqli, $updateUserExists);
                                            }
                                        } else {
                                            //we insert
                                            $insertUserExists = "INSERT INTO luckynumber_table (Email_Address,Amount_Used)
                                                                VALUES('$email',50);";
                                            $exec_insertUserExists = mysqli_query($mysqli, $insertUserExists);
                                        }
                                    }
                                }

                                ?>

                                <input type="number" placeholder="Enter Your Lucky Number" id="userInput" name="guess" required>

                                <button type="submit" id="guess">Guess the number</button>

                            </div>
                        </form>

                        <?php ?>
                        <h5 id="outputText"><?php if (isset($message)) {
                                                echo $message;
                                            } else {
                                                echo "guess your number";
                                            }
                                            ?></h5>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="../JS FILES/script.js"></script>

</body>

</html>
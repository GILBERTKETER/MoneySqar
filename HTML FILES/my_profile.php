<?php
// session_start();
include('../PHP/connection.php');
// if (!isset($_SESSION['LOGGED_IN_EMAIL'])) {
//     header("Location:../HTML FILES/Login_systemmain.php");
//     exit();
// }
include('../PHP/My_profile_retriver.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My_Profile-Money_Sqar_Techno;ogies</title>

    <!--STYLESHEET LINK-->
    <link rel="stylesheet" href="../CSS FILES/style.css">
    <link rel="stylesheet" href="../CSS FILES/my_profile.css">
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
            <h2>my profile</h2>

            <?php
            //getting the username,email,phone no,refferer, date joined,and activation fee
            $email = $_SESSION['LOGGED_IN_EMAIL'];
            $Get_User_Info = "SELECT * FROM moneysqar_registered_users
                               WHERE(Email_Address = '$email');";
            $exec_Get_User_Info = mysqli_query($mysqli, $Get_User_Info);

            while ($Row_exec_Get_User_Info = mysqli_fetch_assoc($exec_Get_User_Info)) {
                $username = $Row_exec_Get_User_Info['User_Name'];
                $phone_no = $Row_exec_Get_User_Info['Phone_No'];
                $refferer = $Row_exec_Get_User_Info['refferer_UserName'];
                $Joined = $Row_exec_Get_User_Info['Date_Registered'];
                $Activation_Amount = $Row_exec_Get_User_Info['Activation_Amount'];
            }

            ?>


            <div class="details">
                <div class="flex">
                    <h4>username</h4>
                    <h4>

                        <?php
                        echo $username;
                        ?>
                    </h4>
                </div>

                <div class="flex">
                    <h4>Email</h4>
                    <h4>
                        <?php
                        echo strtolower($email);
                        ?>
                    </h4>
                </div>

                <div class="flex">
                    <h4>country</h4>
                    <h4>Kenya</h4>
                </div>

                <div class="flex">
                    <h4>phone no</h4>
                    <h4>
                        <?php

                        if ($phone_no != 0) {
                            echo $phone_no;
                        } else {
                            echo "Not Set";
                        }
                        ?>
                    </h4>
                </div>

                <div class="flex">
                    <h4>Account balance</h4>
                    <h4><?php
                        include('../PHP/Account_Balance.php');
                        echo "Ksh. " . $Account_Balance;
                        ?></h4>
                </div>

                <div class="flex">
                    <h4>Refferer</h4>
                    <h4>
                        <?php
                        if ($refferer != NULL) {
                            echo $refferer;
                        } else {
                            echo "Admin";
                        }
                        ?>
                    </h4>
                </div>
                <div class="flex">
                    <h4>joined</h4>
                    <h4>
                        <?php
                        echo $Joined;

                        ?>
                    </h4>
                </div>
                <div class="flex">
                    <h4>status</h4>
                    <h4 id="active"><?php
                                    if ($Activation_Amount == 500) {
                                        echo "Active";
                                    } else {
                                        echo "Dormant";
                                    }

                                    ?></h4>
                </div>
            </div>

        </div>

        <div class="my-profile">
            <h2>Change Password</h2>

            <div class="password-manager">

                <form action="../PHP/My_profile_retriver.php" method="POST">

                    <div class="flex" id="flex1">
                        <label for="old">Old Password</label>
                        <input type="password" placeholder="Enter Old Password" id="oldER" name="old" required>

                    </div>

                    <div class="flex" id="flex2">
                        <label for="new">New Password</label>
                        <input type="password" placeholder="Enter New Password" id="new" name="new" required>

                    </div>

                    <div class="flex" id="flex3">
                        <label for="conf_new">Confirm Password</label>
                        <input type="password" placeholder="Confirm New Password" id="conf_new" name="conf_new" required>

                    </div>
                    <div class="change_password_area">
                        <button type="submit" name="changePass">Change Password</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="../JS FILES/script.js"></script>
</body>

</html>
<?php

include('../PHP/Login.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<meta name="color" content="rgb(16, 72, 100)">-->
    <meta name="theme-color" content="#ffffff" />
    <meta name="apple-mobile-web-app-status-bar-style" content="rgb(4, 34, 49)">

    <title>Sign_in-MoneySqar_Technologies</title>

    <link rel="stylesheet" href="../CSS FILES/Login-system.css">
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon_io//apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon_io//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon_io//favicon-16x16.png">
    <link rel="manifest" href="../favicon_io/site.webmanifest">

</head>

<body>


    <div>
        <div class="top">
            <div class="logo">
                <img src="../ASSETS/logo-4.png" alt="" id="home-img">
                <div class="text">
                    <h2>MONEYSQAR-TECHNOLOGIES</h2>
                </div>
            </div>

            <div class="support">
                <a href="../HTML files/support.html">
                    <button>chat us</button>
                </a>
            </div>
        </div>
    </div>

    <main class="login-signup-details">

        <div class="login-details" id="login-details" style="display: none;">

            <form action="../PHP/Login.php" method="post">
                <h2>Enter your credentials below.</h2>
                <h2 id="login-message">
                    <?php if (isset($_GET['error'])) {
                        echo $_GET['error'];
                    }
                    ?>
                </h2>


                <div class="input-areas">
                    <input type="mail" name="email" placeholder="Enter Email Address" required>
                    <input type="password" name="password" placeholder="Enter Password" required>

                </div>
                <div class="login-btn">
                    <button type="submit" name="login">Sign in</button>
                </div>
                <h3>Dont have an Account?<a href="#" id="regester-here">Register here</a></h3>

            </form>
        </div>

        <div class="signup-details" id="signup-details" style="display:none">


            <form action="../PHP/Registration.php" method="post">
                <h2>Enter your credentials below.</h2>
                <h2 id="signup-message">
                    <?php if (isset($_GET['error'])) {
                        echo $_GET['error'];
                    }
                    ?>
                </h2>

                <div class="input-areas">
                    <input type="mail" name="email" placeholder="Enter Email Address" required>
                    <input type="text" name="fname" placeholder="Enter FirstName" required>
                    <input type="text" name="lname" placeholder="Enter LastName" required>
                    <input type="text" name="username" placeholder="Enter UserName" required>
                    <input type="password" name="password" placeholder="Enter Password" required>
                    <input type="password" name="cpassword" placeholder="Confirm Password" required>
                    <input type="hidden" name="Refferer_username" value="">
                    

                    <!-- <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="password" name="conf_password" placeholder="Confirm your password" required>
                </div> -->
                >



        </div>
        <div class="login-btn">
            <button type="submit">Register</button>
        </div>
        <h3>Already have an Account?<a href="#" id="signin-here">Signin here</a></h3>

        </form>


        </div>

    </main>

    <div class="home" id="home">
        <div class="contents">
            <small>Welcome to Soft-Earn-Technologies</small>
            <h1>where you can earn more than <br>10$ a day through investing, mining among others!</h1>
            <div class="ways-to-earn">
                <small id="addition">Apart from the ones stated, there are more ways to earn money on money sqar.
                    <br>Give it
                    a try and you'll
                    never regret joining us. Click <a href="#">here</a> to view more. Deposits are only made
                    through: <img src="../ASSETS/lipa-na-mpesa.png" alt="">


                </small>
            </div>
            <!--  <p id="continue">To continue, click;
                <button type="submit" id="sign-up" onclick="signupnow()">Sign up</button>
                or
                <button type="submit" id="signin">Sign in</button>  </p>-->
            <div class="login-content">
                <div class="switch">

                    <button id="signin" class="btn">login</button>
                    <hr>
                    <button id="sign-up" class="btn2">sign up</button>

                </div>

            </div>




        </div>
    </div>
    <div class="bottom">
        <p id="bottoms">If you continue to surf this website, you agree to the <span>terms and conditions</span> for its
            use. copywrite soft - earn technologies 2023.</p>
    </div>





    <script src="../JS FILES/login-system.js"></script>

    <script>
        /* document.getElementById("h3").onclick = function () {
             var styling = `
     background-Color: red;
     color:green;
 `;
             document.getElementById("sign-in").style.cssText = styling;
             document.getElementById("sign-up").removeAttribute("style");
 
         }
 
         document.getElementById("sign-up").onclick = function () {
             var styling = `
     background-Color: red;
     color:green;
 `;
             document.getElementById("sign-up").style.cssText = styling;
             document.getElementById("sign-in").removeAttribute("style");
 
 
         }
 */


        document.getElementById("signin").onclick = function() {
            document.getElementById("login-details").style.display = "block";
            document.getElementById("home").style.display = "none";
        }

        document.getElementById("sign-up").onclick = function() {
            document.getElementById("signup-details").style.display = "block";
            document.getElementById("home").style.display = "none";

        }


        document.getElementById("signin-here").addEventListener('click', () => {
            document.getElementById("signup-details").style.display = "none";
            document.getElementById("login-details").style.display = "block";
        });
        document.getElementById("regester-here").addEventListener('click', () => {
            document.getElementById("signup-details").style.display = "block";
            document.getElementById("login-details").style.display = "none";

        });


        /////


        document.getElementById("home-img").addEventListener('click', () => {
            window.location.href = "../HTML FILES/Login_system.html";
        });
    </script>
</body>

</html>
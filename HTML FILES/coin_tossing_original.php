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
    <title>Coin_Tossing-MoneySqar_Technologies</title>
    <!--STYLESHEET LINK-->
    <link rel="stylesheet" href="../CSS FILES/style.css">
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


    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: "Rubik", sans-serif;
        }

        body {
            height: 100%;
            background: var(--color-home);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            background-color: #ffffff;
            width: 400px;
            padding: 35px;
            position: absolute;
            transform: translateY(20%);
            top: 50%;
            /* left: 50%; */
            box-shadow: 15px 30px 35px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            -webkit-perspective: 300px;
            perspective: 300px;
        }

        .stats {
            display: flex;
            color: #101020;
            font-weight: 500;
            padding: 20px;
            margin-bottom: 40px;
            margin-top: 55px;
            box-shadow: 0 0 20px rgba(0, 139, 253, 0.25);

        }

        .stats p:nth-last-child(1) {
            margin-left: 50%;
        }

        .coin {
            height: 150px;
            width: 150px;
            position: relative;
            margin: 32px auto;
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
        }

        .coin img {
            width: 145px;
        }

        .heads,
        .tails {
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }

        .tails {
            transform: rotateX(180deg);
        }

        @keyframes spin-tails {
            0% {
                transform: rotateX(0);
            }

            100% {
                transform: rotateX(1980deg);
            }
        }

        @keyframes spin-heads {
            0% {
                transform: rotateX(0);
            }

            100% {
                transform: rotateX(2160deg);
            }
        }

        .buttons {
            display: flex;
            justify-content: space-between;
        }

        button {
            width: 150px;
            padding: 15px 0;
            border: none;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        #flip-button {
            background-color: #053469;
            color: #ffffff;
        }

        #flip-button:disabled {
            background-color: #e1e0ee;
            border-color: #e1e0ee;
            color: #101020;
        }

        #reset-button {
            background-color: #674706;
            color: white;
        }

        select {
            width: 100%;
            height: 40px;
            outline: none;
            border: 1px solid gray;
            border-radius: 5px;
            font-weight: bolder;

        }
    </style>
</head>

<body>
    <?php include('../PHP/navigation.php'); ?>

    <div class="container">
        <input type="hidden" id="account-balance" value="<?php include('../PHP/Account_Balance.php');
                                                            echo $Account_Balance; ?>">


        <div class="coin" id="coin">
            <div class="heads">
                <img src="https://coin-brothers.com/photos/Kenya_Shillings_10/2005-2009_09.03.2018_19.01_01.jpg" alt="seems the image did not load correctly">
            </div>
            <div class="tails">
                <img src="https://lms.kec.ac.ke/adapted/HI/Grade%202/Games/Maths%20G2%20HI%202/pics/Images/10.png" alt="seems the image did not load correctly">
            </div>
        </div>
        <p style="text-transform:capitalize;">If the flip button is disabled,Your account balance is insufficient.It cost ksh 50 to flip and you earn 100 if you win.</p>
        <div class="stats">
            <p id="heads-count">Heads: 0</p>
            <p id="tails-count">Tails: 0</p>
        </div>
        <div class="stats">
            <select title="selectOption" required>
                <option value="heads">Head</option>
                <option value="tails">Tail</option>

            </select>
        </div>

        <div class="buttons">
            <button id="flip-button" name="flip">
                Flip Coin
            </button>
            <button id="reset-button">
                Reset
            </button>
        </div>
    </div>
    <!--Script-->
    <script type="text/javascript">
        let heads = 0;
        let tails = 0;
        let coin = document.querySelector(".coin");
        let flipBtn = document.querySelector("#flip-button");
        let resetBtn = document.querySelector("#reset-button");
        let selectOption = document.querySelector("select");

        flipBtn.addEventListener("click", () => {
            let i = Math.floor(Math.random() * 2);
            coin.style.animation = "none";
            if (i) {
                setTimeout(function() {
                    coin.style.animation = "spin-heads 3s forwards";
                    sendFlipResult("heads");
                }, 100);
                heads++;
            } else {
                setTimeout(function() {
                    coin.style.animation = "spin-tails 3s forwards";
                    sendFlipResult("tails");
                }, 100);
                tails++;
            }
            setTimeout(updateStats, 3000);
            disableButton();
        });

        function updateStats() {
            document.querySelector("#heads-count").textContent = `Heads: ${heads}`;
            document.querySelector("#tails-count").textContent = `Tails: ${tails}`;
        }

        function disableButton() {
            flipBtn.disabled = true;
            setTimeout(function() {
                flipBtn.disabled = false;
            }, 3000);
        }

        function sendFlipResult(result) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "../PHP/coin_tossing_php.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText);
                }
            };
            xhr.send("selectedOption=" + encodeURIComponent(selectOption.value) + "&result=" + encodeURIComponent(result));
        }

        resetBtn.addEventListener("click", () => {
            coin.style.animation = "none";
            heads = 0;
            tails = 0;
            updateStats();
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Retrieve the account balance from the hidden input element
            let accountBalanceElement = document.getElementById("account-balance");
            let accountBalance = parseInt(accountBalanceElement.value);

            // Retrieve the flip button element
            let flipBtn = document.getElementById("flip-button");

            // Check if the account balance is less than 50
            if (accountBalance < 50) {
                flipBtn.disabled = true;
            } else {
                flipBtn.disabled = false;
            }
        });
    </script>
    <script src="../JS FILES/script.js"></script>
</body>

</html>
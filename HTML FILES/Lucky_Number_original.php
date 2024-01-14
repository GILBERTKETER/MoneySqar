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
    <!-- STYLESHEET LINK -->
    <link rel="stylesheet" href="../CSS FILES/style.css">
    <link rel="stylesheet" href="../CSS FILES/lucky_number.css">
    <!-- MATERIAL ICONS CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!-- GOOGLE FONTS (POPPINS) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- FONT AWESOME LINK -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- FAVICON LINK -->
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon_io/favicon-16x16.png">
    <link rel="manifest" href="../favicon_io/site.webmanifest">
</head>

<body>
    <!-- NAV BAR BEGINS -->
    <?php
    include('../PHP/navigation.php');
    ?>
    <!-- END OF NAV BAR -->

    <div class="lucky_body">
        <div class="container_body">
            <h2>Welcome to lucky number draw</h2>
            <div class="container">
                <p>Please note that the draw takes 30 seconds and will deduct Ksh. 50 from your account balance. Press the play button below to start and choose a number between 1 and 6. Good luck.</p>
                <div class="box-container">
                    <div class="play_button">
                        <button type="submit" id="play">Play</button>
                    </div>

                    <div class="lucky-content">
                        <p>Choose a number between 1 and 6</p>
                        <div class="lucky">
                            <input type="number" placeholder="Enter Your Lucky Number" id="userInput" required>
                            <button type="button" id="guess">Guess the number</button>
                        </div>
                        <h5 id="outputText">Guess your number</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#guess").click(function() {
                var guess = $("#userInput").val();
                $.ajax({
                    url: "../PHP/Lucky_Number_Process.php",
                    method: "POST",
                    data: {
                        guess: guess
                    },
                    success: function(data) {
                        $("#outputText").text(data);
                    }
                });
            });
        });
    </script>
    <script src="../JS FILES/script.js"></script>
</body>

</html>
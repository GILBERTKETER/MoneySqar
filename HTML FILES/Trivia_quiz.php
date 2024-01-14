<?php
session_start();
include('../PHP/connection.php');
if (!isset($_SESSION['LOGGED_IN_EMAIL'])) {
    header("Location:../HTML FILES/Login_systemmain.php");
    exit();
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trivia_Quiz_MoneySqar_Technologies</title>
    <link rel="stylesheet" href="../CSS FILES/Trivia_quiz.css">


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

</head>

<body>
    <!--NAV BAR BEGINS-->
    <?php
    include('../PHP/navigation.php');
    ?>
    <!--END OF NAV BAR-->

    <div class="body">

        <input type="radio" name="a-0" class="correct" id="a-0-c" /><input type="radio" name="a-0" id="a-0-i-0" /><input type="radio" name="a-0" id="a-0-i-1" /><input type="radio" name="a-0" id="a-0-i-2" />
        <input type="radio" name="a-1" class="correct" id="a-1-c" /><input type="radio" name="a-1" id="a-1-i-0" /><input type="radio" name="a-1" id="a-1-i-1" /><input type="radio" name="a-1" id="a-1-i-2" />
        <input type="radio" name="a-2" class="correct" id="a-2-c" /><input type="radio" name="a-2" id="a-2-i-0" /><input type="radio" name="a-2" id="a-2-i-1" /><input type="radio" name="a-2" id="a-2-i-2" />
        <input type="radio" name="a-3" class="correct" id="a-3-c" /><input type="radio" name="a-3" id="a-3-i-0" /><input type="radio" name="a-3" id="a-3-i-1" /><input type="radio" name="a-3" id="a-3-i-2" />
        <input type="radio" name="a-4" class="correct" id="a-4-c" /><input type="radio" name="a-4" id="a-4-i-0" /><input type="radio" name="a-4" id="a-4-i-1" /><input type="radio" name="a-4" id="a-4-i-2" />

        <div id="results" class="box">
            <div class="results"><span id="result"></span> correct answers</div>
            <p><a href="#">Restart the game</a></p>
            <div>CSS Trivia developed by Alvaro Montoro</div>
        </div>

        <div class="options box" id="q-4">
            <div class="question">How many lines of JavaScript code are there in this web game?</div>
            <label for="a-4-c">0</label>
            <label for="a-4-i-0">About 3.50</label>
            <label for="a-4-i-1">42</label>
            <label for="a-4-i-2">734</label>
            <a href="#results">Complete Test</a>
        </div>

        <div class="options box" id="q-3">
            <div class="question">Can a trivia game be developed only using HTML and CSS (no JS)?</div>
            <label for="a-3-c">Yes</label>
            <label for="a-3-i-0">No</label>
            <label for="a-3-i-1">Maybe</label>
            <label for="a-3-i-2">Inconceivable</label>
            <a href="#q-4">Confirm Answer</a>
        </div>

        <div class="options box" id="q-2">
            <div class="question">Which of these selectors is correct?</div>
            <label for="a-2-i-0">#class</label>
            <label for="a-2-i-1">.id</label>
            <label for="a-2-i-2">Both are wrong</label>
            <label for="a-2-c">Both are correct</label>
            <a href="#q-3">Confirm Answer</a>
        </div>

        <div class="options box" id="q-1">
            <div class="question">What does CSS stand for?</div>
            <label for="a-1-i-0">CSS Style Sheet</label>
            <label for="a-1-c">Cascading Style Sheet</label>
            <label for="a-1-i-1">Casual Style Sheet</label>
            <label for="a-1-i-2">Classy Style Sheets</label>
            <a href="#q-2">Confirm Answer</a>
        </div>

        <div class="options box" id="q-0">
            <div class="question">What year was CSS first released?</div>
            <label for="a-0-i-0">1988</label>
            <label for="a-0-i-1">1992</label>
            <label for="a-0-c">1996</label>
            <label for="a-0-i-2">2000</label>
            <a href="#q-1">Confirm Answer</a>
        </div>

        <div class="box" id="welcome">
            <h2>Money_Sqar Trivia</h2>
            <p>Welcome Money sqar trivia quiz. Each Quiz earns you 15 ksh.</p>
            <a href="#q-0">Start Game</a>
        </div>

    </div>

    <script src="../JS FILES/script.js"></script>
</body>

</html>
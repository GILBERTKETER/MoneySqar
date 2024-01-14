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
    <title>Chess_Multiplayer_Game-MoneySqar_Technologies</title>

    <!--STYLESHEET LINK-->
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

    <link rel="stylesheet" href="Chess.css">

    <title>Chess</title>
</head>


<body>

    <?php

    include('../PHP/navigation.php');
    ?>
    <p id="chess-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi, accusamus tempore laboriosam nesciunt corporis distinctio suscipit neque eius, cupiditate fugiat quae unde magnam exercitationem architecto modi consequuntur dolore deserunt! Magni tenetur, facere ex voluptates laboriosam consectetur ipsam accusamus ad placeat hic totam nesciunt officiis delectus et adipisci, rerum doloribus? Consequatur!</p>
    <h2 id="tog">White's Turn</h2>

    <div class="chess">


        <ul>

            <div class="divv" id="row8">
                <li class="box" id="b801">Brook</li>
                <li class="box" id="b802">Bknight</li>
                <li class="box" id="b803">Bbishop</li>
                <li class="box" id="b804">Bqueen</li>
                <li class="box" id="b805">Bking</li>
                <li class="box" id="b806">Bbishop</li>
                <li class="box" id="b807">Bknight</li>
                <li class="box" id="b808">Brook</li>
            </div>
            <div class="divv" id="row7">
                <li class="box" id="b701">Bpawn</li>
                <li class="box" id="b702">Bpawn</li>
                <li class="box" id="b703">Bpawn</li>
                <li class="box" id="b704">Bpawn</li>
                <li class="box" id="b705">Bpawn</li>
                <li class="box" id="b706">Bpawn</li>
                <li class="box" id="b707">Bpawn</li>
                <li class="box" id="b708">Bpawn</li>
            </div>
            <div class="divv" id="row6">
                <li class="box" id="b601"></li>
                <li class="box" id="b602"></li>
                <li class="box" id="b603"></li>
                <li class="box" id="b604"></li>
                <li class="box" id="b605"></li>
                <li class="box" id="b606"></li>
                <li class="box" id="b607"></li>
                <li class="box" id="b608"></li>
            </div>
            <div class="divv" id="row5">
                <li class="box" id="b501"></li>
                <li class="box" id="b502"></li>
                <li class="box" id="b503"></li>
                <li class="box" id="b504"></li>
                <li class="box" id="b505"></li>
                <li class="box" id="b506"></li>
                <li class="box" id="b507"></li>
                <li class="box" id="b508"></li>
            </div>
            <div class="divv" id="row4">
                <li class="box" id="b401"></li>
                <li class="box" id="b402"></li>
                <li class="box" id="b403"></li>
                <li class="box" id="b404"></li>
                <li class="box" id="b405"></li>
                <li class="box" id="b406"></li>
                <li class="box" id="b407"></li>
                <li class="box" id="b408"></li>
            </div>
            <div class="divv" id="row3">
                <li class="box" id="b301"></li>
                <li class="box" id="b302"></li>
                <li class="box" id="b303"></li>
                <li class="box" id="b304"></li>
                <li class="box" id="b305"></li>
                <li class="box" id="b306"></li>
                <li class="box" id="b307"></li>
                <li class="box" id="b308"></li>
            </div>

            <div class="divv" id="row2">
                <li class="box Wpawn" id="b201">Wpawn</li>
                <li class="box Wpawn" id="b202">Wpawn</li>
                <li class="box Wpawn" id="b203">Wpawn</li>
                <li class="box Wpawn" id="b204">Wpawn</li>
                <li class="box Wpawn" id="b205">Wpawn</li>
                <li class="box Wpawn" id="b206">Wpawn</li>
                <li class="box Wpawn" id="b207">Wpawn</li>
                <li class="box Wpawn" id="b208">Wpawn</li>
            </div>
            <div class="divv" id="row1">
                <li class="box" id="b101">Wrook</li>
                <li class="box" id="b102">Wknight</li>
                <li class="box" id="b103">Wbishop</li>
                <li class="box" id="b104">Wqueen</li>
                <li class="box" id="b105">Wking</li>
                <li class="box" id="b106">Wbishop</li>
                <li class="box" id="b107">Wknight</li>
                <li class="box" id="b108">Wrook</li>
            </div>

        </ul>
    </div>
    <script src="Chess.js"></script>
    <script src="../JS FILES/script.js"></script>
</body>

<script>



</script>

</html>
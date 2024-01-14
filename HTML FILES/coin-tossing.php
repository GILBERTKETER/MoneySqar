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
  <title>MoneySqar_Softnet_Technologies</title>
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
  <link rel="stylesheet" href="../CSS FILES/coin-tssing.css">

</head>

<body>

  <!--NAV BAR BEGINS-->
  <?php
  include('../PHP/navigation.php');
  ?>


  <!--END OF NAV BAR-->


  <div class="tossing-body">


    <div class='container'>
      <h2>Confused about your life decision? Just flip this coin!</h2>
      <h2>Btw, don't forget to assign something to both sides.</h2>
      <p>And don't take your life decision based on this stupid coin flip. I was kidding.</p>
      <div id="coin" class=''>
        <div id="heads" class="heads"></div>
        <div id="tails" class="tails"></div>
      </div>
      <form method="POST" id="coin-toss">
        <div class="select">
          <select name="selectedOption">
            <option value="1" selected>Head</option>
            <option value="0">Tail</option>
          </select>
        </div>

        <h2>
         
        </h2>
          <button id="flip" name="flip">Flip the coin</button>

      <p>Heads: <span id="headsCount">0</span> Tails: <span id="tailsCount">0</span></p>
    </div>

  </div>
  <script src="../JS FILES/script.js"></script>
  <script src="../JS FILES/coin-tossing.js"></script>
</body>

</html>
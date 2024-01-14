<?php
session_start();
include('../PHP/connection.php');
if (!isset($_SESSION['LOGGED_IN_EMAIL'])) {
  header("Location:../HTML FILES/Login_systemmain.php");
  exit();
}
?>
<!DOCTYPE html>
<html ng-app='ngCheckers'>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkers_Multiplayer_Game-MoneySqar_Softnet_Technologies</title>
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

  <link rel="stylesheet" type="text/css" href="ngCheckers.css">
</head>

<body ng-controller="checkersCtrl">

  <!--NAV BAR BEGINS-->
  <?php
  include('../PHP/navigation.php');
  ?>


  <!--END OF NAV BAR-->
  <div class="overall_body"> comment
    <h3>Checker Game</h3>
    <div> comment
      <div id="gameContainer">
        <div>
          <div class="row" ng-repeat="row in board">
            <div class="square" ng-style="setClass(square)" ng-repeat="square in row track by $index" ng-click="select(square)">
              <div ng-style="setStyling(square)" class="circle">
                <span>{{square.isKing ? 'K' : ''}}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div>Player Turn : {{player}}</div>
  <div>Red Score : {{redScore}}</div>
  <div>Black Score : {{blackScore}}</div>


  <script src="../JS FILES/script.js"></script>
  <script src="angular.min.js"></script>
  <script src="ngCheckers.js"></script>
</body>

</html>
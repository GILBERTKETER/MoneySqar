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
  <title>Notifications_MoneySqar_Softnet_Technologies</title>
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


  <link rel="stylesheet" href="../CSS FILES/notification.css" />
</head>

<body>

  <!--NAV BAR BEGINS-->
  <?php include('../PHP/navigation.php'); ?>

  <!--END OF NAV BAR-->

  <div class="notifications-today">

    <div class="container">
      <header>
        <div class="notif_box">
          <h2 class="title">Notifications</h2>
          <span id="notifes"></span>
        </div>
        <p id="mark_all">Mark all as read</p>
      </header>
      <main>
        <div class="notif_card unread">
          <img src="./assets/images/avatar-mark-webber.webp" alt="avatar" />
          <div class="description">
            <p class="user_activity">
              <strong>Mark Webber</strong> reacted to your recent post
              <b>My first tournament today!</b>
            </p>
            <p class="time">1m ago</p>
          </div>
        </div>
        <div class="notif_card unread">
          <img src="./assets/images/avatar-angela-gray.webp" alt="avatar" />
          <div class="description">
            <p class="user_activity">
              <strong>Angela Gray</strong> followed you
            </p>
            <p class="time">5m ago</p>
          </div>
        </div>
        <div class="notif_card unread">
          <img src="./assets/images/avatar-jacob-thompson.webp" alt="avatar" />
          <div class="description">
            <p class="user_activity">
              <strong>Jacob Thompson</strong> has joined your group
              <strong class="link">Chess Club</strong>
            </p>
            <p class="time">1 day ago</p>
          </div>
        </div>
        <div>
          <div class="notif_card">
            <div class="message_card">
              <img src="./assets/images/avatar-rizky-hasanuddin.webp" alt="avatar" />
              <div class="description">
                <p class="user_activity">
                  <strong>Rizky Hasanuddin</strong> sent you a private message
                </p>
                <p class="time">5 days ago</p>
              </div>
            </div>
          </div>
          <div class="message">
            <p>
              Hello, thanks for setting up the Chess Club. I've been a member
              for a few weeks now and I'm already having lots of fun and
              improving my game.
            </p>
          </div>
        </div>

        <div class="notif_card">
          <img src="./assets/images/avatar-kimberly-smith.webp" alt="avatar" />
          <div class="description">
            <p class="user_activity">
              <strong>Kimberly Smith</strong> commented on your picture
            </p>
            <p class="time">1 week ago</p>
          </div>
          <img src="./assets/images/image-chess.webp" class="chess_img" alt="chess" />
        </div>
        <div class="notif_card">
          <img src="./assets/images/avatar-nathan-peterson.webp" alt="avatar" />
          <div class="description">
            <p class="user_activity">
              <strong>Nathan Pererson</strong> reacted to your recent post
              <b>5 end-game strategies to increase your win rate</b>
            </p>
            <p class="time">2 weeks ago</p>
          </div>
        </div>
        <div class="notif_card">
          <img src="./assets/images/avatar-anna-kim.webp" alt="avatar" />
          <div class="description">
            <p class="user_activity">
              <strong>Anna Kim</strong> left the group
              <strong class="link">Chess Club</strong>
            </p>
            <p class="time">2 weeks ago</p>
          </div>
        </div>
      </main>
    </div>

  </div>
  <script src="../JS FILES/app.js"></script>
  <script src="../JS FILES/script.js"></script>
</body>

</html>
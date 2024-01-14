<?php
session_start();
$_SESSION = array();

session_destroy();
echo "<script>window.location.href='../HTML FILES/Login_systemmain.php';</script>";
exit();

<?php
session_start();
unset($_SESSION['USER_LOGIN']);
unset($_SESSION['USERID']);
unset($_SESSION['USER_NAME']);
session_destroy();
header('location:login.php');
die();
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tecnics";
$connection = new mysqli($servername, $username, $password, $dbname);
?>

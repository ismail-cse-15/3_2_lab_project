<?php



require_once("config.php");
session_start();
unset($_SESSION['email']);
header("Location:home.php");
 ?>

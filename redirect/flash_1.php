<?php
session_start();
$_SESSION['flash'] = "Привет!";
header('Location: flash_2.php');
die();
?>
<?php
session_start();
$_SESSION['flash'][] = "Hello";
header('Location:flash_arr_2.php');
die();
?>
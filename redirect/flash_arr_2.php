<?php
session_start();
$_SESSION['flash'][] = "World";
header('Location:flash_arr_3.php');
?>
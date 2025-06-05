<?php
session_start();
unset($_SESSION['auth_2_1']);
header('location:../index.php#auth_2_1');
?>
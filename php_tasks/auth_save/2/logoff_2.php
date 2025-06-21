<?php
session_start();
unset($_SESSION['user_2']);
header('location:../../../index.php#save_reg_2');
?>
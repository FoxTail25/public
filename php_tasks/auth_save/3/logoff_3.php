<?php
session_start();
unset($_SESSION['user_3']);
header('location:../../../index.php#save_reg_3');
?>
<?php
session_start();
$sess_num = 'auth_'. $_GET['auth'];
$_SESSION[$sess_num] = null;
header('location: ../../index.php#'. $sess_num);
?>


// session_destroy();
// unset($_SESSION['auth_2_1']);
// unset($_SESSION['auth_2_3']);
// $_SESSION['auth_2_1'] = null;
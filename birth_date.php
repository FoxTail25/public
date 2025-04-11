<?php if($_POST){
     $year = $_POST['year'];
     $month = $_POST['month'];
     $day = $_POST['day'];
$birthDay = date('w' , mktime(0,0,0,$day,$month,$year));
echo $birthDay;
} 
?>
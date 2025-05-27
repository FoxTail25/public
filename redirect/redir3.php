<?php
if(!isset($_GET['test'])){
header('Location: redir4.php');
die();
} 
file_put_contents('111.txt', '11111111');

?>
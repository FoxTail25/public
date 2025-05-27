<?php
if(isset($_GET['yes'])){
    header('Location:../index.php?success="yes"#redir_5');
    die();
} else {
    header('Location:../index.php#redir_5');
}
?>
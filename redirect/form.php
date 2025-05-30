<?php
if(!empty($_POST)){
	file_put_contents('111test.txt', $_POST['test1']);
	file_put_contents('222test.txt', $_POST['test2']);
    header('location:form.php');
    // echo "da!";
}
?>
<form method="POST" style="display:grid; width:50%;">
тест1
<input name="test1">
тест2
<input name="test2">
<input type="submit">
</form>
<?php
session_start();
if(!empty($_POST)) {
	var_dump($_POST);
}
?>





<form method="post" style="display: grid; width:300px;">
	login:
	<input type="text" name="login">
	password:
	<input type="password" name="password">
	confirm password:
	<input type="password" name="confirm">
	<br/>
	<input type="submit">
</form>
<a href="../../../index.php#save_reg_1">на главную</a>
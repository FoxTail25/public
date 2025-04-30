<?php 
	if (!empty($_POST)) {
		// тут будет код обработки формы
        $name = $_POST['name'];
        $age = $_POST['age'];
        $salary = $_POST['salary'];
        $query = "INSERT INTO users SET name='$name', age='$age', 
		salary='$salary'";
        mysqli_query($link, $query) or die(mysqli_error($link));
	}
?>


<form action="" method="POST">
	<input name="name">
	<input name="age">
	<input name="salary">
	<input type="submit">
</form>
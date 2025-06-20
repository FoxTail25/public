<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="/favicon.ico">
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<title>Изучение PHP</title>
	<style>
		p,
		pre,
		code {
			margin: 0;
			padding: 0;
		}

		;
	</style>
</head>

<body>

	<h3 class="text-left redT">code 1</h3>
	<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 'on');
	mb_internal_encoding('UTF-8');

	include './php/code.php';
	include './php/helpFunc.php';
	?>


	<!-- <h3 class="text-left redT m-2">Math function</h3>
	<div class="text-left ms-4 mb-4">
		<?php //include './php/mathFunc.php';	
		?> 
	</div> -->


	<!-- <h3 class="text-left redT m-2">String function</h3>
	<div class="text-left ms-4 mb-4">
		<?php //include './php/strFunc.php'; 
		?>
	</div> -->

	<!-- <h3 class="text-left redT m-2">Array function</h3>
	<div class="text-left ms-4 mb-4">
		<?php //include './php/arrFunc.php'; 
		?>
	</div> -->
	<!-- <h3 class="text-left redT m-2">Time function</h3>
	<div class="text-left ms-4 mb-4">
		<?php //include './php/timeFunc.php'; 
		?>
	</div> -->
	<!-- <h3 class="text-left redT m-2">Practice</h3>
	<div class="text-left ms-4 mb-4">
		<?php //include './php/practice.php'; 
		?>
	</div>  -->
	<!-- <h3 class="text-left redT m-2">function</h3>
	<div class="text-left ms-4 mb-4">
		<?php //include './php/function.php'; 
		?>
	</div>  -->
	<!-- <h3 class="text-left redT m-2">variable link</h3>
	<div class="text-left ms-4 mb-4">
		<?php //include './php/varlink.php'; 
		?>
	</div>  -->
	<!-- <h3 class="text-left redT m-2">Recursion</h3>
	<div class="text-left ms-4 mb-4">
		<?php // include './php/recurs.php'; 
		?>
	</div>  -->
	<!-- <h3 class="text-left redT m-2">Regular</h3>
	<div class="text-left ms-4 mb-4">
		<?php //include './php/regular.php'; 
		?>
	</div>  -->
	<!-- <h3 class="text-center redT m-2">Формирование строк</h3>
	<div class="text-left ms-4 mb-4">
		<?php //include './php/inc_var_in_str.php'; 
		?>
	</div>  -->
	<!-- <h3 class="text-center redT m-2">Основы работы с формами PHP</h3>
	<div class="text-left ms-4 mb-4">
		<?php //include './php/form.php'; 
		?>
	</div>  -->
	<!-- <h3 class="text-center redT m-2">GET запросы в PHP</h3>
	<div class="text-left ms-4 mb-4">
		<?php //include './php/get_rec.php'; 
		?>
	</div> -->
	<!-- <h3 class="text-center redT m-2">Практика на формы в PHP</h3>
	<div class="text-left ms-4 mb-4">
		<?php // include './php/get_rec_pract.php'; 
		?>
	</div> -->
	<!-- <h3 class="text-center redT m-2">Сессии в PHP</h3>
	<div class="text-left ms-4 mb-4">
		<?php //include './php/session.php'; 
		?>
	</div> -->
	<!-- <h3 class="text-center redT m-2">Введение в работу с куками в PHP (Coockies)</h3>
	<div class="text-left ms-4 mb-4">
		<?php //include './php/coockies.php'; 
		?>
	</div> -->
	<!-- <h3 class="text-center redT m-2">Работа с файлами в PHP </h3>
	<div class="text-left ms-4 mb-4">
		<?php //include './php/file.php'; 
		?>
	</div> -->
	<!-- <h3 class="text-center redT m-2">Работа с MySQL PHP </h3>
	<div class="text-left ms-4 mb-4">
		<?php // include './php/mysql.php'; 
		?>
	</div> -->
	<!-- <h3 class="text-center redT m-2">Организация базы данных </h3>
	<div class="text-left ms-4 mb-4">
		<?php //include './php/db_org.php'; 
		?>
	</div> -->
	<!-- <h3 class="text-center redT m-2">Практика на Базы данных </h3>
	<div class="text-left ms-4 mb-4">
		<?php //include './php/db_pract.php'; 
		?>
	</div> -->
	<!-- <h3 class="text-center redT m-2">Протокол HTTP в PHP</h3>
	<div class="text-left ms-4 mb-4">
		<?php //include './php/http_prot.php'; 
		?>
	</div> -->
	<!-- <h3 class="text-center redT m-2">Редирект в PHP</h3>
	<div class="text-left ms-4 mb-4">
		<?php //include './php/redirect.php'; 
		?>
	</div> -->
	<!-- <h3 class="text-center redT m-2">Введение в аутентификацию на PHP</h3>
	<div class="text-left ms-4 mb-4">
		<?php //include './php/auth.php'; 
		?>
	</div> -->
	<h3 class="text-center redT m-2">Безопасность хранения пароля</h3>
	<div class="text-left ms-4 mb-4">
		<?php include './php/authSave.php'; 
		?>
	</div>

	<script src="./js.js"></script>
</body>

</html>
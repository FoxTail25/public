<html lang="ru">

<head>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body class="ps-4">

	<p>На этой странице размещён следующий PHP код:</p>

	<code>
		<pre>

	&lt?php
	session_start();
	echo $_SESSION['sess_test']; // читаем из сессии
	?>
		</pre>
	</code>


	<?php
	session_start();
	echo "Результат выполнения кода: " . $_SESSION['sess_test']; // читаем из сессии
	?>
	<p>
		<a class="ps-4" href="../index.php">вернуться к изучению</a>
	</p>
	<p class="fw-bold mt-5">Задача:</p>
	<p>Сделайте два файла. При запуске первого файла запишите в сессию два числа, а при запуске второго файла - выведите на экран сумму этих чисел.</p>
	<p class="fw-bold mt-5">Решение:</p>
	<code>
		<pre>
		&lt?php
		$num1 = $_SESSION['num1']; // Извлекаем данные из сессии
		$num2 = $_SESSION['num2']; // Извлекаем данные из сессии
		echo $num1 + $num2;
		?></pre>
	</code>
	<p class="fw-bold">Результат:</p>
	<?php
	$num1 = $_SESSION['num1']; // Извлекаем данные из сессии
	$num2 = $_SESSION['num2']; // Извлекаем данные из сессии
	echo $num1 + $num2;
	?>


</body>

</html>
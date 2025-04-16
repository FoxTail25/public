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
	$_SESSION['sess_test'] = 'abcde'; // пишем в сессию
	?>
		</pre>
	</code>


	<p>
		<a href="/session/sess_2.php">ссылка на файл /session/sess_2.php</a>
	</p>

	<?php
	session_start();
	$_SESSION['sess_test'] = 'abcde'; // пишем в сессию
	?>
	<p class="fw-bold mt-5">Задача:</p>
	<p>Сделайте два файла. При запуске первого файла запишите в сессию два числа, а при запуске второго файла - выведите на экран сумму этих чисел.</p>
	<p class="fw-bold">Решение:</p>
	<code>
		<pre>
		&lt?php
		$_SESSION['num1'] = 20; // пишем в сессию
		$_SESSION['num2'] = 40; // пишем в сессию
		?></pre>
	</code>
	<!-- <p class="fw-bold">Результат:</p> -->
	<p class="ps-4">
		<a href="/session/sess_2.php">ссылка на файл /session/sess_2.php</a>
	</p>
	<?php
	$_SESSION['num1'] = 20; // пишем в сессию
	$_SESSION['num2'] = 40; // пишем в сессию
	?>


</body>

</html>
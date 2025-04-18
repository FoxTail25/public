<?php
$task1 = $_COOKIE['task_1'];
?>
<html lang="ru">

<head>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body class="ps-4">
<p class="fw-bold">Результат:</p>
<p>Вот что записано в coockie под именем 'task_1': <?=$task1?></p>
<p>А вот код который читает coockie:</p>
<code>
    <pre>
    &lt?php
    $task1 = $_COOKIE['task_1'];
    ?>
    </pre>
</code>
<a class="mt-5" href="../index.php">Вернуться к учёбе</a>

</body>
</html>
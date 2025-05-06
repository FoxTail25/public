<h3 class="fw-bold mt-5">Протокол HTTP в PHP</h3>
<p>Предпологается что мы уже хорошо знаем базу протокола HTTP (Hyper Text Transport Protokol). Если это не так, то освежить и дополнить знания можно вот <a target="_blank" href="https://code.mu/ru/internet/protocol/http/">code.mu/HTTP</a></p>

<h3 class="fw-bold mt-5">Метод HTTP запроса в PHP</h3>
<p>В PHP можно определить HTTP метод, которым был осуществлен запрос. Для этого нужно прочитать следующее значение:</p>
<code>
<pre>	&lt?php
		$method = $_SERVER['REQUEST_METHOD'];
		var_dump($method); // 'GET' или 'POST'
	 ?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
	$method = $_SERVER['REQUEST_METHOD'];
	var_dump($method);
?>
<p class="fw-bold mt-3">Задача 1</p>
<p>Сделайте страницу, на которую вы будете отправлять запрос либо методом GET, либо методом POST.</p>
<p class="fw-bold">Решение:</p>
<p class="fw-bold">Результат:</p>
<a href="http_prot/getMethod.php">show query method</a>

<!-- 
    <p class="fw-bold mt-3">Задача 1</p>
    <p>Пусть в корне вашего сайта лежит папка dir, а в ней какие-то текстовые файлы. Выведите на экран столбец имен этих файлов.</p>
    <p class="fw-bold">Решение:</p>
    <p class="fw-bold">Результат:</p>

-->



<!-- 
<h3 class="fw-bold mt-5">Практические задачи</h3>
 -->

<?php
// $arr = ['a', 'b', 'c'];

// if (isset($_GET['key']) and in_array($_GET['key'], array_keys($arr))) {
// 	$key = $_GET['key'];
// 	echo $arr[$key];
// } else {
// 	header('HTTP/1.1 404 Not Found');
// 	echo"Нет такой страницы";
// }

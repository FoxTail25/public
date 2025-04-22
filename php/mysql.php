<h3 class="fw-bold mt-5">Подготовительные манипуляции для работы с SQL в PHP</h3>
<p>Давайте теперь научимся работать с базами данных через PHP. Для этого прежде всего необходимо установить соединение с сервером базы данных.<br />
	Делается это с помощью функции mysql_connect, которая принимает 3 параметра: имя хоста (сервера), имя пользователя, под которым мы работаем с базой и пароль для этого пользователя.<br />
	Если вы работаете на своем компьютере, то это будут localhost, root и пароль в виде пустой строки (на некоторых серверах он тоже может быть root). Если ваша база данных в интернете - то эти данные выдает вам хостинг.
	<br />
	Итак, давайте установим соединение с базой данных:
</p>

<code>
	<pre>
		&lt?php
		$host = 'localhost'; // имя хоста
		$user = 'root';      // имя пользователя
		$pass = '';          // пароль
		$name = 'mydb';      // имя базы данных

		$link = mysqli_connect($host, $user, $pass, $name);
		?></pre>
</code>
<p>Если указанные нами доступы правильные, то установится соединение к базе данных. При этом в переменную $link запишется специальный объект соединения, который мы будем использовать в дальнейшем для всех обращений к нашей базе данных.</p>
<meta charset="utf-8">
<?php
$host = 'MySQL-8.0'; // имя хоста
$user = 'root';      // имя пользователя
$pass = '';          // пароль
$name = 'mydb';      // имя базы данных

$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
?>

<h3 class="fw-bold mt-5">Отправка запросов к базе данных</h3>
<p>После соединения с базой к ней можно отправлять запросы. Это делается с помощью функции <b>mysqli_query</b>. Первым параметром эта функция принимает принимает переменную, в которую мы записали результат <b>mysqli_connect</b>, а вторым - строку с SQL запросом.<br />
	К примеру, выполним запрос, который достанет все записи из таблицы users:</p>
<code>
	<pre>
		&lt?php
		$res = mysqli_query($link, 'SELECT * FROM users');
		?></pre>
</code>
<p>Текст запроса не обязательно писать прямо в параметре функции mysqli_query. Давайте вынесем его в переменную:</p>
<code>
	<pre>
		&lt?php
		$query = 'SELECT * FROM users';
		$res = mysqli_query($link, $query);
		?></pre>
</code>

<h3 class="fw-bold mt-5">Поиск ошибок в базе данных</h3>
<p>Как вы уже знаете, в PHP вывод ошибок на экран включается с помощью функции <b>error_reporting</b>. Эта функция, однако, не включает вывод ошибок, допущенных в тексте SQL запроса.<br />
	Чтобы вывести ошибки SQL команд, следует пользоваться функцией <b>mysqli_error</b>, которую необходимо добавлять к каждому запросу к БД, вот так:</p>

<code>
	<pre>
		&lt?php
		$query = 'SELECT * FROM users';
		$res = mysqli_query($link, $query) or die(mysqli_error($link));
		?></pre>
</code>

<p>Пока не будем разбираться с тем, как работает эта конструкция. Просто добавляйте ее и, в случае ошибочного SQL запроса, вы увидите сообщение об этом в окне браузера.</p>
<p><i><b>Скорее всего это работает так: либо срабатывает запрос, либо репорт об ошибке :)</b></i></p>
<?php

$query = 'SELECT * FROM users';
$res = mysqli_query($link, $query) or die(mysqli_error($link));
var_dump($res);

?>

<h3 class="fw-bold mt-5">Проблемы с кодировками при работе с SQL в PHP</h3>
<p>Как правило, если не сделать дополнительных действий, то русский текст при получении из базы данных будет выводится абракадаброй или вопросиками. Для избежания таких проблем следует описанных ниже правил.</p>
<p class="fw-bold text-center">Правило 1</p>
<p>База данных и таблицы в ней должны быть в кодировке utf8_general_ci.</p>
<p class="fw-bold text-center">Правило 2</p>
<p>Сам PHP файл должен быть в кодировке utf8.</p>
<p class="fw-bold text-center">Правило 3</p>
<p>В начале PHP файла должен быть следующий HTML тег:</p>
<code>
	<pre>&ltmeta charset="utf-8"></pre>
</code>
<p class="fw-bold text-center">Правило 4</p>
<p>На всякий случай сразу после команды <b>mysqli_connect</b> добавьте такое запрос:</p>
<code>
	<pre>
		&lt?php
		mysqli_query($link, "SET NAMES 'utf8'");
		?>
	</pre>
</code>

<h3 class="fw-bold mt-5">Полный тестовый код для проверки работоспособности коннекта PHP с MySQL</h3>

<code>
	<pre>
	&ltmeta charset="utf-8">
	&lt?php
	$host = 'localhost'; // имя хоста
	$user = 'root';      // имя пользователя
	$pass = '';          // пароль
	$name = 'mydb';      // имя базы данных

	$link = mysqli_connect($host, $user, $pass, $name);
	mysqli_query($link, "SET NAMES 'utf8'");

	$query = 'SELECT * FROM users';
	$res = mysqli_query($link, $query) or die(mysqli_error($link));
	var_dump($res);
	?></pre>
</code>

<h3 class="fw-bold mt-5">Получение результата при SQL запросе в PHP</h3>
<p>В предыдущем уроке мы сделали тестовый код. Напомню его существенную часть, выполняющую запрос к базе:</p>
<code>
	<pre>
	&lt?php
	$query = 'SELECT * FROM users';
	$res = mysqli_query($link, $query) or die(mysqli_error($link));
	var_dump($res);
	?></pre>
</code>


<p>Как вы видите, после того, как произойдет запрос к базе, в переменной <b>$res</b> будет лежать результат этого действия. Однако лежит он не в той форме, которая нам нужна в PHP, а в той форме, в которой его прислала нам база.<br />
	Для того, чтобы получить результат в привычной нам форме, необходимо воспользоваться функцией <b>mysqli_fetch_assoc</b>, извлекающей из результата одну строку.<br />
	Давайте попробуем:</p>

<code>
	<pre>
	&lt?php
	$row = mysqli_fetch_assoc($res);
	var_dump($row);
	?></pre>
</code>
<p>В результате var_dump выведет массив с первым работником:</p>
<code>
	<pre>
	&lt?php
	['id' => 1, 'name' => 'user1', 'age' => 23, 'salary' => 400]
	?></pre>
</code>
<p>При этом из переменной $res первый работник исчезнет, и следующий вызов mysqli_fetch_assoc получит уже следующего работника.</p>
<p>И так можно можно вызывать нашу функцию до тех пор, пока работники не закончатся. Как только это произойдет, то следующий вызов функции вернет false.<br />
	Давайте попробуем:</p>

<code>
	<pre>
	&lt?php
	$row1 = mysqli_fetch_assoc($res);
	var_dump($row1); // работник номер 1
    echo '&ltbr/>';
	$row2 = mysqli_fetch_assoc($res);
	var_dump($row2); // работник номер 2
    echo '&ltbr/>';
	$row3 = mysqli_fetch_assoc($res);
	var_dump($row3); // работник номер 3
    echo '&ltbr/>';
	$row4 = mysqli_fetch_assoc($res);
	var_dump($row4); // работник номер 4
    echo '&ltbr/>';
	$row5 = mysqli_fetch_assoc($res);
	var_dump($row5); // работник номер 5
    echo '&ltbr/>';
	$row6 = mysqli_fetch_assoc($res);
	var_dump($row6); // работник номер 6
    echo '&ltbr/>';
	$row7 = mysqli_fetch_assoc($res);
	var_dump($row7); // выведет NULL - работники кончились
	?></pre>
</code>
<?php
$row1 = mysqli_fetch_assoc($res);
var_dump($row1); // работник номер 1
echo '<br/>';
$row2 = mysqli_fetch_assoc($res);
var_dump($row2); // работник номер 2
echo '<br/>';
$row3 = mysqli_fetch_assoc($res);
var_dump($row3); // работник номер 3
echo '<br/>';
$row4 = mysqli_fetch_assoc($res);
var_dump($row4); // работник номер 4
echo '<br/>';
$row5 = mysqli_fetch_assoc($res);
var_dump($row5); // работник номер 5
echo '<br/>';
$row6 = mysqli_fetch_assoc($res);
var_dump($row6); // работник номер 6
echo '<br/>';
$row7 = mysqli_fetch_assoc($res);
var_dump($row7); // выведет NULL - работники кончились
?>

<h3 class="fw-bold mt-5">Получение результата в виде массива при SQL запросе в PHP</h3>
<p>При считывании по рядам можно не выводить каждого работника, а записывать их в какой-нибудь массив:</p>

<code>
	<pre>
		&lt?php
		$row1 = mysqli_fetch_assoc($res);
		$data[] = $row1;

		$row2 = mysqli_fetch_assoc($res);
		$data[] = $row2;

		$row3 = mysqli_fetch_assoc($res);
		$data[] = $row3;

		$row4 = mysqli_fetch_assoc($res);
		$data[] = $row4;

		$row5 = mysqli_fetch_assoc($res);
		$data[] = $row5;

		$row6 = mysqli_fetch_assoc($res);
		$data[] = $row6;
		?>
	</pre>
</code>
<p>В результате в переменной $data получится следующий двухмерный массив:</p>
<code>
	<pre>
		&lt?php
		[
			['id' => 1, 'name' => 'user1', 'age' => 23, 'salary' => 400],
			['id' => 2, 'name' => 'user2', 'age' => 25, 'salary' => 500],
			['id' => 3, 'name' => 'user3', 'age' => 23, 'salary' => 500],
			['id' => 4, 'name' => 'user4', 'age' => 30, 'salary' => 900],
			['id' => 5, 'name' => 'user5', 'age' => 27, 'salary' => 500],
			['id' => 6, 'name' => 'user6', 'age' => 28, 'salary' => 900],
		]
		?>
	</pre>
</code>

<h3 class="fw-bold mt-5">Формирование массива в цикле при SQL запросе в PHP</h3>
<p>Конечно же, в ручную перебирать всех работников не очень удобно. Пусть лучше за нас это сделает цикл:</p>

<code>
	<pre>
		&lt?php
		for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
		var_dump($data); // здесь будет массив с результатом
		?>
	</pre>
</code>

<p>Давайте разберемся, как работает этот цикл.<br />

	В каждой итерации цикла функция mysqli_fetch_assoc последовательно считывает каждую строку результата, записывая его в массив $data.<br />

	Как только в $res закончатся строки, то mysqli_fetch_assoc вернет NULL и цикл закончит свою работу. А полученный результат будет лежать в двухмерном массиве $data.
</p>

<!-- <h3 class="fw-bold mt-5">Вставка файлов в PHP</h3>
<p>Пусть у нас есть один файл:</p> -->



<!-- <p class="fw-bold mt-5">Задача 1</p>
<p>Пусть в корне вашего сайта лежит папка dir, а в ней какие-то текстовые файлы. Выведите на экран столбец имен этих файлов.</p>
<p class="fw-bold">Решение:</p>
<p class="fw-bold">Результат:</p> -->
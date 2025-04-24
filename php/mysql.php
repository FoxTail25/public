<?php
require 'func/func.php';
?>
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

<p class="fw-bold mt-5">Задача 1</p>
<p>С помощью описанного цикла получите и выведите на экран таблицу всех работников.</p>

<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$select_query = 'select * from users';
	$res = mysqli_query($link, $select_query);
	for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
	?>
	&ltstyle>
		td,th {
			border: 1px solid black;
			padding: 5px;
			text-align: center;
		}
	&lt/style>
	&lttable>
	&lttr>
		&ltth>id&lt/th>
		&ltth>name&lt/th>
		&ltth>age&lt/th>
		&ltth>salary&lt/th>
	&lt/tr>
	&lt?php foreach ($data as $row): ?>
		&lttr>
			&lttd>&lt?= $row['id'] ?>&lt/td>
			&lttd>&lt?= $row['name'] ?>&lt/td>
			&lttd>&lt?= $row['age'] ?>&lt/td>
			&lttd>&lt?= $row['salary'] ?>&lt/td>
		&lt/tr>
		&lt?php endforeach ?>
	&lt/table></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$select_query = 'select * from users';
$res = mysqli_query($link, $select_query);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
?>
<style>
	td,
	th {
		border: 1px solid black;
		padding: 5px;
		text-align: center;
	}
</style>
<table>
	<tr>
		<th>id</th>
		<th>name</th>
		<th>age</th>
		<th>salary</th>
	</tr>
	<?php foreach ($data as $row): ?>
		<tr>
			<td><?= $row['id'] ?></td>
			<td><?= $row['name'] ?></td>
			<td><?= $row['age'] ?></td>
			<td><?= $row['salary'] ?></td>
		</tr>
	<?php endforeach ?>
</table>


<p class="fw-bold mt-5">Задача 2</p>
<p>Из полученного результата получите первого работника. Через echo выведите на экран его имя.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&ltp>Имя первого работника: &lt?= $data[0]['name'] ?>&lt/p></pre>
</code>
<p class="fw-bold">Результат:</p>
<p>Имя первого работника: <?= $data[0]['name'] ?></p>

<p class="fw-bold mt-5">Задача 3</p>
<p>Из полученного результата получите второго работника. Через echo выведите на экран его имя и возраст.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&ltp>Второй работник имя: &lt?= $data[1]['name'] ?> возраст: &lt?= $data[1]['age'] ?>&lt/p></pre>
</code>
<p class="fw-bold">Результат:</p>
<p>Второй работник имя: <?= $data[1]['name'] ?> возраст: <?= $data[1]['age'] ?></p>

<p class="fw-bold mt-5">Задача 4</p>
<p>Из полученного результата получите третьего работника. Через echo выведите на экран его имя, возраст и зарплату.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&ltp>Второй работник имя: &lt?=$data[2]['name']?> возраст: &lt?=$data[2]['age']?> зарплата: &lt?=$data[2]['salary']?>&lt/p></pre>
</code>
<p class="fw-bold">Результат:</p>
<p>Второй работник имя: <?= $data[2]['name'] ?> возраст: <?= $data[2]['age'] ?> зарплата: <?= $data[2]['salary'] ?> </p>

<h3 class="fw-bold mt-5">Выборка записей при SQL запросе к базе в PHP</h3>
<p>В тестовом коде вы уже видели команду SELECT, выполняющую выборку данных из БД. Давайте теперь подробнее разберемся с ее синтаксисом. Вот он:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM таблица WHERE условие";
		?></pre>
</code>
<p>Как вы видите, после имени таблицы можно еще дописать команду WHERE, в которой можно писать ограничение на выбираемые записи. В условии допустимы следующие операции сравнения: =, !=, <>, <,>, <=,>=.<br />
				Давайте посмотрим их применение на примерах.
</p>

<p class="fw-bold">Пример 1</p>
<p>Выберем юзера с id, равным 2:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users WHERE id=2";
		?></pre>
</code>
<p class="fw-bold">Пример 2</p>
<p>Выберем юзеров с id, большим 2:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users WHERE id>2";
		?></pre>
</code>
<p class="fw-bold">Пример 3</p>
<p>Выберем юзеров с id, большим или равным 2:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users WHERE id>=2";
		?></pre>
</code>
<p class="fw-bold">Пример 4</p>
<p>Выберем юзеров с id, не равным 2:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users WHERE id!=2";
		?></pre>
</code>
<p class="fw-bold">Пример 5</p>
<p>Вместо команды != можно писать команду <>:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users WHERE id<>2";
		?></pre>
</code>
<p class="fw-bold">Пример 6</p>
<p>Выберем юзеров возрастом 23 года:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users WHERE age=23";
		?></pre>
</code>
<p class="fw-bold">Пример 7</p>
<p>Выберем юзеров с зарплатой 500:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users WHERE salary=500";
		?></pre>
</code>
<p class="fw-bold">Пример 8</p>
<p>Выберем юзера с именем 'user1'. Здесь нас поджидает важный нюанс: так как имя является строкой, то его необходимо взять в кавычки:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users WHERE name='user1'";
		?></pre>
</code>
<p class="fw-bold">Пример 9</p>
<p>Если команда WHERE отсутствует, то выберутся все записи из таблицы. Давайте выберем всех работников:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users";
		?></pre>
</code>


<h3 class="fw-bold mt-5">Практические задачи</h3>
<p><i>Что бы "красиво" выводить полученные данные добавим в файл func/func/php вот такой код:</i></p>
<code>
	<pre>
	&lt?php
	function getTable($data)
	{
		$res = "&ltstyle>
		td,
		th {
			border: 1px solid black;
			padding: 5px;
			text-align: center;
		}
		&lt/style>
		&lttable>
		&lttr>
			&ltth>id&lt/th>
			&ltth>name&lt/th>
			&ltth>age&lt/th>
			&ltth>salary&lt/th>
		&lt/tr>";
		foreach ($data as $row) {

			$res .= "&lttr>";
			$res .= "&lttd>$row[id]&lt/td>";
			$res .= "&lttd>$row[name]&lt/td>";
			$res .= "&lttd>$row[age]&lt/td>";
			$res .= "&lttd>$row[salary]&lt/td>";
			$res .= "&lt/tr>";
		}
		$res .= "&lt/table>";
		return $res;
	}
	?></pre>
</code>
<p>теперь подключим его к нашему файлу с помощью
	&lt?php
	require 'func/func.php';
	?>
</p>
<p><i>Теперь мы можем кравиво выводить (в виде таблицы) результаты SQL запросов к базе данных используя функци <b>getTable</b></i></p>
<p class="fw-bold mt-5">Задача 1</p>
<p>Выберите юзера с id, равным 3.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
		$query_id3 = "select * from users where id = '3'";
		$res = mysqli_query($link, $query_id3);
		for($data = [];	$row = mysqli_fetch_assoc($res); $data[] = $row);
		echo getTable($data);
	?>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_id3 = "select * from users where id = '3'";
$res = mysqli_query($link, $query_id3);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);

echo getTable($data);
?>

<p class="fw-bold mt-5">Задача 2</p>
<p>Выберите юзеров с зарплатой 900.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
		$query_salary900 = "select * from users where salary ='900'";
		$res = mysqli_query($link, $query_salary900);
		for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
		echo getTable($data);
	?>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_salary900 = "select * from users where salary ='900'";
$res = mysqli_query($link, $query_salary900);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
echo getTable($data);
?>

<p class="fw-bold mt-5">Задача 3</p>
<p>Выберите юзеров в возрасте 23 года.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_age23 = "select * from users where age ='23'";
	$res = mysqli_query($link, $query_age23);
	for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
	echo getTable($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_age23 = "select * from users where age ='23'";
$res = mysqli_query($link, $query_age23);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
echo getTable($data);
?>

<p class="fw-bold mt-5">Задача 4</p>
<p>Выберите юзеров с зарплатой более 400.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_salayUp400= "select * from users where salary > '400'";
	$res = mysqli_query($link, $query_salayUp400) or die(mysqli_error($link));
	for($data = []; $row = mysqli_fetch_assoc($res); $data[]=$row);
	echo getTable($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_salayUp400 = "select * from users where salary > '400'";
$res = mysqli_query($link, $query_salayUp400) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
echo getTable($data);
?>

<p class="fw-bold mt-5">Задача 5</p>
<p>Выберите юзеров с зарплатой равной или большей 500.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_salaryUp500 = "select * from users where salary >='500'";
	$res = mysqli_query($link, $query_salaryUp500);
	for($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
	echo getTable($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_salaryUp500 = "select * from users where salary >='500'";
$res = mysqli_query($link, $query_salaryUp500);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
echo getTable($data);
?>
<p class="fw-bold mt-5">Задача 6</p>
<p>Выберите юзеров с зарплатой НЕ равной 500.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_salaryNot500 = "select * from users where salary != 500";
	$res = mysqli_query($link, $query_salaryNot500);
	for($data=[]; $row = mysqli_fetch_assoc($res); $data[]=$row);
	echo getTable($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_salaryNot500 = "select * from users where salary != 500";
$res = mysqli_query($link, $query_salaryNot500);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
echo getTable($data);
?>

<p class="fw-bold mt-5">Задача 7</p>
<p>Выберите юзеров с зарплатой равной или меньшей 500.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_salaryDownOr500 = "select * from users where salary <= 500";
	$res = mysqli_query($link, $query_salaryDownOr500);
	for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
	echo getTable($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_salaryDownOr500 = "select * from users where salary <= 500";
$res = mysqli_query($link, $query_salaryDownOr500);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
echo getTable($data);
?>


<h3 class="fw-bold mt-5">Логические операции в SQL запросе в PHP</h3>
<p>В условии выборки можно делать более сложные комбинации с помощью команд OR и AND. Работают они так же, как и их аналоги в PHP конструкции if. Давайте посмотрим на примерах.</p>
<p class="fw-bold">Пример 1</p>
<p>Выберем юзеров с зарплатой 500 И возрастом 23 года:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users WHERE salary=500 AND age=23";
		?></pre>
</code>
<p class="fw-bold">Пример 2</p>
<p>Выберем юзеров с зарплатой 500 ИЛИ возрастом 23 года:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users WHERE salary=500 OR age=23";
		?></pre>
</code>
<p class="fw-bold">Пример 3</p>
<p>Выберем юзеров с зарплатой от 450 до 900:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users WHERE salary>450 AND salary&lt900";
		?></pre>
</code>
<p class="fw-bold">Пример 4</p>
<p>Выберем юзеров с возрастом от 23 до 27 лет включительно:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users WHERE age=>23 AND age&lt=27";
		?></pre>
</code>
<p class="fw-bold">Пример 5</p>
<p>Сложные комбинации команд OR и AND можно группировать с помощью круглых скобок, чтобы показать приоритет условий:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users WHERE (age=>20 AND age&lt=27) OR (salary>300 AND salary&lt500)";
		?></pre>
</code>

<h3 class="fw-bold mt-5">Практические задачи</h3>

<p class="fw-bold mt-5">Задача 1</p>
<p>Выберите юзеров в возрасте от 25 (не включительно) до 28 лет (включительно).</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_age25and28 = 'select * from users where age > 25 and age <= 28';
	$res = mysqli_query($link, $query_age25and28);
	for($data=[]; $row=mysqli_fetch_assoc($res); $data[]=$row);
	echo getTable($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_age25and28 = 'select * from users where age > 25 and age <= 28';
$res = mysqli_query($link, $query_age25and28);
for($data=[]; $row=mysqli_fetch_assoc($res); $data[]=$row);
echo getTable($data);
?>

<p class="fw-bold mt-5">Задача 2</p>
<p>Выберите юзера user1.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_user1 = "select * from users where name = 'user1'";
	$res = mysqli_query($link, $query_user1);
	for($data=[];$row=mysqli_fetch_assoc($res);$data[]=$row);
	echo getTable($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_user1 = "select * from users where name = 'user1'";
$res = mysqli_query($link, $query_user1);
for($data=[];$row=mysqli_fetch_assoc($res);$data[]=$row);
echo getTable($data);
?>

<p class="fw-bold mt-5">Задача 3</p>
<p>Выберите юзеров user1 и user2.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_user1and2 = "select * from users where (name = 'user1' AND name = 'user2')";
$res = mysqli_query($link, $query_user1and2);
for($data; $row = mysqli_fetch_assoc($res); $data[]=$row);
echo getTable($data);

?>




<!-- <h3 class="fw-bold mt-5">Практические задачи</h3> -->

<!-- <p class="fw-bold mt-5">Задача 1</p>
<p>Пусть в корне вашего сайта лежит папка dir, а в ней какие-то текстовые файлы. Выведите на экран столбец имен этих файлов.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	?></pre>
</code>
<p class="fw-bold">Результат:</p> -->
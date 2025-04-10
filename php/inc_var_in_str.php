<h3 class="mt-5 text-left">
	Вставка переменных в строки в PHP
</h3>
<p>
	В PHP одинарные и двойные кавычки для строк на самом деле не совсем эквиваленты. Дело в том, что в строки в двойных кавычках можно вставлять переменные - и вместо этих переменных подставится их значение.
	Давайте попробуем на практике. Пусть у нас есть некоторая переменная:
</p>
<p class="m-2">
	Давайте для начала выполним вставку этой переменной в какую-нибудь строку через операцию конкатенации:
</p>
<code>
	$str = 'aaa';
	<br />
	echo 'xxx ' . $str . ' yyy';
</code>
<?php
$str = 'aaa';
echo 'xxx ' . $str . ' yyy<br/>';
?>
<p class="m-2">
	А теперь изменим кавычки нашей строки на двойные и выполним в нее вставку переменной:
</p>
<code>
	$str = 'bbb';
	<br />
	echo "xxx $str yyy";
</code>
<?php
$str = 'bbb';
echo "xxx $str yyy<br/>";
?>
<p class="m-2 mt-5 fw-bold">
	Задача
</p>
<p class="m-2">
	Упростите следующий код:
</p>

<code>
	$name = 'user';
	<br />
	echo 'hello, ' . $name . '!' =
</code>

<?php $name = 'user';
echo 'hello, ' . $name . '!';
?>
<br />
<p class="m-2 fw-bold">
	Решение:
</p>
<code>
	$name = 'user';
	<br />
	echo "hello, $name! =
</code>
<?php $name = 'user';
echo "hello, $name!";
?>
<h3 class="mt-5 text-left">
	Вставка элементов массива в PHP
</h3>
<p>
	Можно также выполнять вставку элементов массива:
</p>
<code>
	$arr = ['a', 'b', 'c'];
	<br />
	echo "xxx $arr[0] yyy";
</code>
<?php
$arr = ['a', 'b', 'c'];
echo "xxx $arr[0] yyy";
?>
<p class="m-2 mt-5 fw-bold">
	Задача
</p>
<p class="m-2">
	Упростите следующий код:
</p>
<code>
	$arr = ['1', '2', '3'];
	<br />
	echo 'aaa ' . $arr[0] . ' bbb ' . $arr[1];
</code>
<p class="m-2 fw-bold">
	Решение:
</p>
<code>
	echo "aaa $arr[0] bbb $arr[1]";
</code>
<?php
echo "aaa $arr[0] bbb $arr[1]";
?>
<h3 class="mt-5 text-left">
	Вставка элементов ассоциативных массивов в PHP
</h3>
<p class="m-1">
	А вот вставка элементов ассоциативных массивов просто так работать не будет:
</p>
<p class="m-1">
	<code>
		$arr = ['a'=>1, 'b'=>2, 'c'=>3];
		<br />
		echo "xxx $arr['a'] yyy"; // не работает
	</code>
</p>
<p class="m-1">
	Для вставки таких элементов их необходимо обернуть в фигурные скобки:
</p>
<p class="m-1">
	<code>
		$arr = ['a'=>1, 'b'=>2, 'c'=>3];
		<br />
		echo "xxx {$arr['a']} yyy"
	</code>
	<?php
	$arr = ['a' => 1, 'b' => 2, 'c' => 3];
	echo " = xxx {$arr['a']} yyy";
	?>
</p>
<p class="m-1">
	Либо можно снять одинарные кавычки с ключа при вставке:
</p>
<p class="m-1">
	<code>
		$arr = ['a'=>1, 'b'=2, 'c'=3];
		<br />
		echo "xxx $arr[a] yyy";
	</code>
	<?php
	echo " = xxx $arr[a] yyy";
	?>
</p>
<p class="m-1">
	Иногда имеет смысл тупо записать элемент массива в переменную, чтобы затем без проблем выполнить вставку переменной в строку:
</p>
<p class="m-1">
	<code>
		$arr = ['a', 'b', 'c'];
		<br />
		$elem = $arr['a'];
		<br />
		echo "xxx $elem yyy";
	</code>
	<?php
	$elem = $arr['a'];
	echo " = xxx $elem yyy";
	?>
</p>

<p class="m-2 mt-5 fw-bold">
	Задача
</p>
<p class="m-2">
	Упростите следующий код:
</p>
<code>
	$arr = ['a' => 1, 'b' => 2, 'c' => 3];
	<br />
	echo 'text ' . $arr['a'] . ' text ' . $arr['b'] . ' text';
</code>
<p class="m-2 fw-bold">
	Решение:
</p>
<code>
	echo "text {$arr['a']} text {$arr['b']} text"
</code>
<?php
echo " = text {$arr['a']} text {$arr['b']} text";
?>

<h3 class="mt-5 text-left">
	Цикл и вставка переменных в PHP
</h3>
<p class="m-1">
	Вставку переменных в строки также удобно проделывать в циклах:
</p>
<code>
	for ($i = 1; $i
	<= 5; $i++) {
		<br />
	echo "xxx $i yyy" ;
	<br />
	}
</code>
<p class="m-2 mt-5 fw-bold">
	Задача
</p>
<p class="m-2">
	Упростите следующий код:
</p>
<code>
	<pre>
	for ($i = 1; $i &l= 10; $i++) {
		for ($j=1; $j &l=10; $j++) {
			echo 'nums: ' . $i . ' ' . $j . '&ltbr>' ;
		}
	}
	</pre>
</code>
<p class="m-2 fw-bold">
	Решение:
</p>
<code>
	<pre>
	for ($i = 1; $i &l= 10; $i++) {
		for ($j=1; $j &l=10; $j++) {
			echo "nums: $i $j &ltbr>";
		}
	}
	</pre>
</code>
<?php
// for ($i = 1; $i <= 10; $i++) {
// 	for ($j = 1; $j <= 10; $j++) {
// 		echo "nums: $i $j <br>";
// 	}
// }
?>
<h3 class="mt-5 text-left">
	Вставка элементов массивов в цикле в PHP
</h3>
<p class="m-1">
	Можно также вставлять элементы при переборе массивов циклом:
</p>
<code>
	<pre>
	$arr = [1, 2, 3, 4, 5];
	foreach ($arr as $elem) {
		echo " xxx $elem yyy ";
	}
	</pre>
</code>
<?php
$arr = [1, 2, 3, 4, 5];
foreach ($arr as $elem) {
	echo " xxx $elem yyy ";
}
?>
<p class="m-2 mt-5 fw-bold">
	Задача
</p>
<p class="m-2">
	Упростите следующий код:
</p>
<code>
	<pre>
	$arr = ['a' => 1, 'b' => 2, 'c' => 3];

	foreach ($arr as $key => $elem) {
		echo 'pair: ' . $elem . ' ' . $key . '&ltbr>';
	}
	</pre>
</code>
<p class="m-2 fw-bold">
	Решение:
</p>
<code>
	<pre>
	$arr = ['a' => 1, 'b' => 2, 'c' => 3];

	foreach ($arr as $key => $elem) {
		echo "pair: $elem $key&ltbr>";
	}
	</pre>
</code>
<?php
$arr = ['a' => 1, 'b' => 2, 'c' => 3];
foreach ($arr as $key => $elem) {
	echo "pair: $elem $key<br>";
}
?>


<h3 class="mt-5 text-left">
	Вставка элементов многомерных массивов в цикле в PHP
</h3>
<p class="m-1">
	Давайте посмотрим, как выполняются вставки при переборе многомерных массивов. Пусть, к примеру, у нас есть вот такой массив:
</p>
<code>
	<pre>
$users = [
	[
	    'name' => 'user1',
	    'age'  => 30,
		],
		[
			'name' => 'user2',
			'age'  => 31,
	   ],
 	   [
	    'name' => 'user3',
	    'age'  => 32,
	   ],
	 ];
	</pre>
</code>
<p class="m-1">
	Давайте переберем его циклом и сформируем строки из его элементов:
</p>
<code>
	<pre>
		foreach ($users as $user) {
			echo $user['name'] . ': ' . $user['age'] . '&ltbr>';
		}
	</pre>
</code>
<p class="m-1">
	Упростим наш код, используя вставки переменных:
</p>
<code>
	<pre>
		foreach ($users as $user) {
			echo "{$user['name']}: {$user['age']}&ltbr>";
		}
	</pre>
</code>
<p class="m-1">
	Упростим еще больше, убрав кавычки с ключей:
</p>
<code>
	<pre>
		foreach ($users as $user) {
			echo "$user[name]: $user[age]&ltbr>";
		}
	</pre>
</code>
<?php
$users = [
	[
		'name' => 'user1',
		'age'  => 30,
	],
	[
		'name' => 'user2',
		'age'  => 31,
	],
	[
		'name' => 'user3',
		'age'  => 32,
	],
];
foreach ($users as $user) {
	echo "$user[name]: $user[age]<br>";
}
?>
<p class="m-2 mt-5 fw-bold">
	Задача
</p>
<p class="m-2">
	Дан следующий массив:
</p>
<code>
	<pre>
		$products = [
			[
				'name'   => 'product1',
			'price'  => 100,
			'amount' => 5,
		],
		[
			'name'   => 'product2',
			'price'  => 200,
			'amount' => 6,
			],
		[
			'name'   => 'product3',
			'price'  => 300,
			'amount' => 7,
		],
	];
</pre>
</code>
<p class="m-2">
	Выведите с помощью этого массива столбец продуктов в каком-нибудь придуманном вами формате.
</p>
<p class="m-2 fw-bold">
	Решение:
</p>
<code>
	<pre>
	foreach ($products as $elem) {
		echo "$elem[name]: $elem[amount] $elem[price]&ltbr>";
	}
</pre>
</code>
<p class="m-2 fw-bold">
	Результат:
</p>
<?php
$products = [
	[
		'name'   => 'product1',
		'price'  => 100,
		'amount' => 5,
	],
	[
		'name'   => 'product2',
		'price'  => 200,
		'amount' => 6,
	],
	[
		'name'   => 'product3',
		'price'  => 300,
		'amount' => 7,
	],
];
foreach ($products as $elem) {
	echo "$elem[name]: $elem[amount] $elem[price]<br>";
}
?>

<h3 class="mt-5 text-left">
	Генерация тегов в PHP
</h3>
<p class="m-1">
	Давайте теперь научимся формировать теги с использованием переменных. Пусть, к примеру, у нас есть следующая переменная:
</p>
<code>
	<pre>
	$text = 'aaa';
	</pre>
</code>
<p class="m-2">
	Выведем текст этой переменной в абзаце:
</p>
<code>
	<pre>
		$text = 'aaa';
		echo '&ltp>' . $text . '&lt/p>';
	</pre>
</code>
<p class="m-2">
	Упростим код, используя вставку переменной:
</p>
<code>
	<pre>
		$text = 'aaa';
		echo "&ltp>$text&lt/p>";
	</pre>
</code>
<p class="m-2 mt-5 fw-bold">
	Задача
</p>
<p class="m-2">
	Даны три переменные:
</p>
<code>
	<pre>
		$text1 = 'aaa';
		$text2 = 'bbb';
		$text3 = 'ccc';</pre>
</code>
<p class="m-2">
	Выведите каждую из этих переменных в отдельном абзаце.
</p>
<p class="m-2 fw-bold">
	Решение:
</p>
<code>
	<pre>
	echo "&ltp>$text1&lt/p>";
	echo "&ltp>$text2&lt/p>";
	echo "&ltp>$text3&lt/p>";</pre>
</code>
<p class="m-2 fw-bold">
	Результат:
</p>
<?php
$text1 = 'aaa';
$text2 = 'bbb';
$text3 = 'ccc';

echo "<p>$text1</p>";
echo "<p>$text2</p>";
echo "<p>$text3</p>";
?>
<h3 class="mt-5 text-left">
	Генерация тегов с атрибутами в PHP
</h3>
<p class="m-1">
	Давайте теперь научимся формировать теги с атрибутами. Пусть для примера мы хотим сделать ссылку. При этом текст и адрес ссылки будут хранится в соответствующих переменных:
</p>
<code>
	<pre>
	$text = 'link';
	$href = 'index.html';</pre>
</code>
<p>Давайте сформируем наш тег путем конкатенации переменных:</p>
<code>
	<pre>
	echo '&lta href="' . $href . '">' . $text . '&lt/a>'; 
	</pre>
</code>
<p>Давайте теперь сформируем наш тег путем вставки переменных. В этом случае, однако, нас ждет проблема. Дело в том, что для вставки переменных мы должны сделать кавычки строки двойными. Но кавычки от атрибутов тегов тоже двойные и нас ждет конфликт:</p>
<code>
	<pre>
	echo "&lta href="$href">$text&lt/a>"; // не будет работать 
	</pre>
</code>
<p>Самый простой вариант решения проблемы - это заменить кавычки атрибута с двойных на одинарные:</p>
<code>
	<pre>
	echo "&lta href='$href'>$text&lt/a>"; 
	</pre>
</code>
<p>Это, однако, не очень красиво - ведь кавычки атрибутов принято делать двойными. Поэтому исправим проблему, заэкранировав кавычки атрибутов обратными слешами:</p>
<code>
	<pre>
	echo "&lta href=\"$href\">$text&lt/a>";
	</pre>
</code>

<p class="m-2 mt-5 fw-bold">
	Задача
</p>
<p class="m-2">
	Даны три переменные:
</p>
<code>
	<pre>
	$src1 = '1.png';
	$src2 = '2.png';
	$src3 = '3.png';
	</pre>
</code>
<p class="m-2 fw-bold">
	Решение:
</p>
<code>
	<pre>
$src1 = 'https://img.freepik.com/free-photo/beautiful-landscape-mother-nature_23-2148992406.jpg';
$src2 = 'https://img.freepik.com/free-photo/weather-effects-collage-concept_23-2150062068.jpg';
$src3 = 'https://img.freepik.com/free-photo/beautiful-landscape-mother-nature_23-2148992403.jpg';

echo "&ltimg width=\"300\" src=\"$src1\">/>";
echo "&ltimg width=\"300\" src=\"$src2\">/>";
echo "&ltimg width=\"300\" src=\"$src3\">/>";
</pre>
</code>
<p class="m-2 fw-bold">
	Результат:
</p>
<?php
$src1 = 'https://img.freepik.com/free-photo/beautiful-landscape-mother-nature_23-2148992406.jpg';
$src2 = 'https://img.freepik.com/free-photo/weather-effects-collage-concept_23-2150062068.jpg';
$src3 = 'https://img.freepik.com/free-photo/beautiful-landscape-mother-nature_23-2148992403.jpg';

echo "<img width=\"300\" src=\"$src1\"/>";
echo "<img width=\"300\" src=\"$src2\"/>";
echo "<img width=\"300\" src=\"$src3\"/>";
?>
<h3 class="mt-5 text-left">
	Цикл и генерация тегов в PHP
</h3>
<p class="m-1">
	Давайте теперь научимся формировать теги в цикле. К примеру, давайте сделаем пять абзацев, заполнив их числами по возрастанию:
</p>
<code>
	<pre>
	for ($i = 1; $i <= 5; $i++) {
		echo '&ltp>' . $i . '&lt/p>';
	}
	</pre>
</code>
<p>Перепишем наш код с использованием вставки переменных:</p>
<code>
	<pre>
	for ($i = 1; $i <= 5; $i++) {
		echo "&ltp>$i&lt/p>";
	}
	</pre>
</code>
<p class="m-2 mt-5 fw-bold">
	Задача
</p>
<p class="m-2">
	С помощью цикла сформируйте следующий HTML код:
</p>
<code>
	<pre>
	&ltul>
	  &ltli>1&lt/li>
	  &ltli>2&lt/li>
	  &ltli>3&lt/li>
	  &ltli>4&lt/li>
	  &ltli>5&lt/li>
	&lt/ul>
	</pre>
</code>
<p class="m-2 fw-bold">
	Решение:
</p>
<code>
	<pre>
echo "&ltul>";
for($i = 1;$i < 6; $i++){
	echo"&ltli>$i&lt/li>";
}
echo "&lt/ul>";
	</pre>
</code>

<p class="m-2 fw-bold">
	Результат:
</p>
<?php
echo "<ul>";
for ($i = 1; $i < 6; $i++) {
	echo "<li>$i</li>";
}
echo "</ul>";
?>

<h3 class="mt-5 text-left">
	Цикл и генерация тегов из массивов в PHP
</h3>
<p class="m-1">
	Давайте теперь сформируем теги, взяв их тексты из массива:
</p>
<code>
	<pre>
	$arr = [1, 2, 3, 4, 5];
	
	foreach ($arr as $elem) {
		echo '&ltp>' . $elem . '&lt/p>';
	}
	</pre>
</code>
<p class="m-1">
	Перепишем наш код через вставку переменных:
</p>
<code>
	<pre>
	$arr = [1, 2, 3, 4, 5];
	
	foreach ($arr as $elem) {
		echo "&ltp> $elem &lt/p>";
	}
	</pre>
</code>

<p class="m-2 mt-5 fw-bold">
	Задача
</p>
<p class="m-2">
	Дан массив:
</p>
<code>
	<pre>
	$arr = ['text1', 'text2', 'text3'];
	</pre>
</code>
<p>Сформируйте с его помощью следующий HTML код:</p>
<code>
	<pre>
&ltselect>
	&ltoption>text1&lt/option>
	&ltoption>text2&lt/option>
	&ltoption>text3&lt/option>
&lt/select>
	</pre>
</code>
<p class="m-2 fw-bold">
	Решение:
</p>
<code>
	<pre>
	$arr = ['text1', 'text2', 'text3'];
	echo "&ltselect>";
	foreach($arr as $el){
		echo"&ltoption>$el&lt/option>";
	}
	echo "&lt/select>";
	</pre>
</code>

<p class="m-2 fw-bold">
	Результат:
</p>
<?php
$arr = ['text1', 'text2', 'text3'];
echo "<select>";
foreach ($arr as $el) {
	echo "<option>$el</option>";
}
echo "</select>";
?>

<h3 class="mt-5 text-left">
	Цикл и генерация тегов и атрибутов в PHP
</h3>
<p class="m-1">
	Давайте теперь научимся формировать в цикле теги не только с текстом, но и с атрибутами. Пусть, к примеру, у нас есть следующий массив с адресами и текстами ссылок:
</p>
<code>
	<pre>
	$arr = [
		['href'=>'1.html', 'text'=>'link1'],
		['href'=>'2.html', 'text'=>'link2'],
		['href'=>'3.html', 'text'=>'link3'],
	];
	</pre>
</code>
<p>Давайте с помощью этого массива сформируем ссылки:</p>
<code>
	<pre>
	foreach ($arr as $elem) {
		echo '&lta href="' . $elem['href'] . '">' . $elem['text'] . '&lt/a>&ltbr>';
	}
	</pre>
</code>
<p>Можно переписать этот код с более коротко</p>
<code>
	<pre>
	foreach ($arr as $elem) {
		echo "&lta href=\"$elem[href]\">$elem[text]&lt/a>&ltbr>";
	}
	</pre>
</code>
<p class="m-2 mt-5 fw-bold">
	Задача
</p>
<p class="m-2">
	Дан массив:
</p>
<code>
	<pre>
	$arr = [
	  ['href' => 'page1.html', 'text' => 'text1'],
	  ['href' => 'page2.html', 'text' => 'text2'],
	  ['href' => 'page3.html', 'text' => 'text3'],
	];
	</pre>
</code>
<p>Сформируйте с его помощью следующий HTML код:</p>
<code>
	<pre>
	&ltul>
	  &ltli>&lta href="page1.html">text1&lt/a>&lt/li>
	  &ltli>&lta href="page2.html">text2&lt/a>&lt/li>
	  &ltli>&lta href="page3.html">text3&lt/a>&lt/li>
	&lt/ul>
	</pre>
</code>
<p class="m-2 fw-bold">
	Решение:
</p>
<code>
	<pre>
	$arr = [
	  ['href' => 'page1.html', 'text' => 'text1'],
	  ['href' => 'page2.html', 'text' => 'text2'],
	  ['href' => 'page3.html', 'text' => 'text3'],
	];
	foreach ($arr as $elem) {
	echo "&lta href=\"$elem[href]\">$elem[text]&lt/a>&ltbr>";
	}
	</pre>
</code>
<p class="m-2 fw-bold">
	Результат:
</p>
<?php
$arr = [
	['href' => 'page1.html', 'text' => 'text1'],
	['href' => 'page2.html', 'text' => 'text2'],
	['href' => 'page3.html', 'text' => 'text3'],
];
foreach ($arr as $elem) {
	echo "<a href=\"$elem[href]\">$elem[text]</a><br>";
}
?>
<p class="m-2 mt-5 fw-bold">
	Задача
</p>
<p class="m-2">
	Дан массив:
</p>
<code>
	<pre>
	$arr = [
	  ['value' => '1', 'text' => 'text1'],
	  ['value' => '2', 'text' => 'text2'],
	  ['value' => '3', 'text' => 'text3'],
	];
	</pre>
</code>
<p>Сформируйте с его помощью следующий HTML код:</p>
<code>
	<pre>
	&ltselect>
	  &ltoption value="1">text1&lt/option>
	  &ltoption value="2">text2&lt/option>
	  &ltoption value="3">text3&lt/option>
	&lt/select>
	</pre>
</code>
<p class="m-2 fw-bold">
	Решение:
</p>
<code>
	<pre>
	$arr = [
	  ['value' => '1', 'text' => 'text1'],
	  ['value' => '2', 'text' => 'text2'],
	  ['value' => '3', 'text' => 'text3'],
	];
	echo '&ltselect>';
	foreach ($arr as $elem) {
		echo "&ltoption value=\"$elem[value]\">$elem[text]&lt/option>";
	}
	echo '&lt/select>';
	</pre>
</code>
<p class="m-2 fw-bold">
	Результат:
</p>
<?php
$arr = [
	['value' => '1', 'text' => 'text1'],
	['value' => '2', 'text' => 'text2'],
	['value' => '3', 'text' => 'text3'],
];
echo '<select>';
foreach ($arr as $elem) {
	echo "<option value=\"$elem[value]\">$elem[text]</option>";
}
echo '<select>';
?>

<h3 class="mt-5 text-left">
	Цикл и генерация HTML таблиц на PHP
</h3>
<p class="m-1">
	Давайте теперь научимся формировать таблицы. Пусть у нас дан следующий массив, содержащий тексты ячеек таблицы:
</p>
<code>
	<pre>
		$arr = [
			['name' => 'user1', 'age' => 30, 'salary' => 500],
			['name' => 'user2', 'age' => 31, 'salary' => 600],
			['name' => 'user3', 'age' => 32, 'salary' => 700],
			];
	</pre>
</code>
<p class="m-1">
	Давайте с помощью цикла сформируем из этого массива следующий код:
</p>
<code>
	<pre>
&lttable>
	&lttr>
		&lttd>user1&lt/td>
		&lttd>30&lt/td>
		&lttd>500&lt/td>
	&lt/tr>
	&lttr>
		&lttd>user2&lt/td>
		&lttd>31&lt/td>
		&lttd>600&lt/td>
	&lt/tr>
	&lttr>
		&lttd>user3&lt/td>
		&lttd>32&lt/td>
		&lttd>700&lt/td>
	&lt/tr>
&lt/table>
	</pre>
</code>
<p>Сформируем таблицу с помощью одного цикла, вручную записав в теги td элементы подмассива:</p>
<code>
	<pre>
	echo '&lttable>';
	foreach ($arr as $user) {
		echo '&lttr>';
		
		echo "&lttd>{$user['name']}&lt/td>";
		echo "&lttd>{$user['age']}&lt/td>";
		echo "&lttd>{$user['salary']}&lt/td>";
		
		echo '&lt/tr>';
	}
	echo '&lt/table>';
	</pre>
</code>
<p>Такой способ даст нам более полный контроль, как над порядком ячеек, так и над возможностью в каждую ячейку добавить какие-то дополнительные данные, например, вот так:</p>
<code>
	<pre>
	echo '&lttable>';
	foreach ($arr as $user) {
		echo '&lttr>';
		
		echo "&lttd>{$user['name']}&lt/td>";
		echo "&lttd>{$user['age']} years&lt/td>";
		echo "&lttd>{$user['salary']} dollars&lt/td>";
		
		echo '&lt/tr>';
	}
	echo '&lt/table>';
	</pre>
</code>
<p>Давайте сформируем нашу таблицу с помощью двух вложенных циклов:</p>
<code>
	<pre>
	echo '&lttable>';
	foreach ($arr as $row) {
		echo '&lttr>';
		foreach ($row as $cell) {
			echo "&lttd>$cell&lt/td>";
		}
		echo '&lt/tr>';
	}
	echo '&lt/table>';
	</pre>
</code>
<p>Такой способ удобен тем, что не нужно прописывать каждую ячейку таблицы отдельно. Однако, недостатком такого подхода становится потеря контроля.<br />
	Впрочем, контроль можно вернуть с помощью условий, вот так:</p>
<code>
	<pre>
				echo '&lttable>';
	foreach ($arr as $row) {
		echo '&lttr>';
		foreach ($row as $key => $cell) {
			if ($key === 'salary') {
				echo "&lttd>$cell dollars&lt/td>";
			} else {
				echo "&lttd>$cell&lt/td>";
			}
		}
		echo '&lt/tr>';
	}
	echo '&lt/table>';
		</pre>
</code>
<p>Можно упросить наш код следующим образом:</p>
<code>
	<pre>
			echo '&lttable>';
	foreach ($arr as $row) {
		echo '&lttr>';
		foreach ($row as $key => $cell) {
			if ($key === 'salary') {
				$cell .= ' dollars';
			}
			
			echo "&lttd>$cell&lt/td>";
		}
		echo '&lt/tr>';
	}
	echo '&lt/table>';
	</pre>
</code>


<p class="m-2 mt-5 fw-bold">
	Задача
</p>
<p class="m-2">
	Дан массив:
</p>
<code>
	<pre>
	$products = [
		[
			'name'   => 'product1',
			'price'  => 100,
			'amount' => 5,
		],
		[
			'name'   => 'product2',
			'price'  => 200,
			'amount' => 6,
		],
		[
			'name'   => 'product3',
			'price'  => 300,
			'amount' => 7,
		],
	];
	</pre>
</code>
<p>Сформируйте с его помощью следующий HTML таблицу</p>
<code>
	<pre>
	<!-- &ltselect>
	  &ltoption value="1">text1&lt/option>
	  &ltoption value="2">text2&lt/option>
	  &ltoption value="3">text3&lt/option>
	&lt/select> -->
	</pre>
</code>
<p class="m-2 fw-bold">
	Решение:
</p>
<code>
	<pre>
$products = [
	[
		'name'   => 'product1',
		'price'  => 100,
		'amount' => 5,
	],
	[
		'name'   => 'product2',
		'price'  => 200,
		'amount' => 6,
	],
	[
		'name'   => 'product3',
		'price'  => 300,
		'amount' => 7,
	],
];
echo '&lttable style="border: 1px solid black;">';
foreach($products as $row){
	echo'&lttr>';
		echo"&lttd style=\"border: 1px solid black;\">$row[name]&lt/td>";
		echo"&lttd style=\"border: 1px solid black;\">$row[price]&lt/td>";
		echo"&lttd style=\"border: 1px solid black;\">$row[amount]&lt/td>";
	echo'&lt/tr>';
}
echo '&lt/table>';
	</pre>
</code>
<p class="m-2 fw-bold">
	Результат:
</p>
<?php
$products = [
	[
		'name'   => 'product1',
		'price'  => 100,
		'amount' => 5,
	],
	[
		'name'   => 'product2',
		'price'  => 200,
		'amount' => 6,
	],
	[
		'name'   => 'product3',
		'price'  => 300,
		'amount' => 7,
	],
];
echo '<table style="border: 1px solid black;">';
foreach ($products as $row) {
	echo '<tr>';
	echo "<td style=\"border: 1px solid black;\">$row[name]</td>";
	echo "<td style=\"border: 1px solid black;\">$row[price]</td>";
	echo "<td style=\"border: 1px solid black;\">$row[amount]</td>";
	echo '</tr>';
}
echo '</table>';

?>


<h3 class="mt-5 text-left">
	Вставка PHP кода в HTML
</h3>
<p class="m-1">
	Пусть у нас есть некоторый HTML код:
</p>
<code>
	<pre>
		&ltp>text&lt/p>
	</pre>
</code>
<p class="m-1">
	Мы можем внутри этого кода делать вставки PHP кода:
</p>
<code>
	<pre>
		&ltp>&lt?php 'любой код' ?>&lt/p>
	</pre>
</code>
<p class="m-1">
	Давайте, например, выведем какой-нибудь текст:
</p>
<code>
	<pre>
		&ltp>&lt?php echo 'text'; ?>&lt/p>
	</pre>
</code>
<p class="m-1">
	А теперь результат работы функции:
</p>
<code>
	<pre>
		&ltp>&lt?php echo sqrt(4); ?>&lt/p>
	</pre>
</code>
<p class="m-2 mt-5 fw-bold">
	Задача
</p>
<p class="m-2">
	Дан абзац:
</p>
<code>
	<pre>
	&ltp>&lt/p>
	</pre>
</code>
<p>Выведите в него текущую дату в формате год-месяц-день.</p>
<p class="m-2 fw-bold">
	Решение:
</p>
<code>
	<pre>
	&ltp>&lt?php echo date('Y-m-d') ?>&lt/p>
	</pre>
</code>
<p class="m-2 fw-bold">
	Результат:
</p>
<p>
	<?php
	echo date('Y-m-d')
	?>
</p>


<h3 class="mt-5 text-left">
	Короткая команда echo в PHP
</h3>
<p class="m-1">
	Существует специальная короткая форма команды echo. Давайте посмотрим как она выглядит. Пусть у нас есть вывод данных в верстку:
</p>
<code>
	<pre>
	&ltp>&lt?php echo 'text'; ?>&lt/p>
	</pre>
</code>
<p class="m-1">
	Можно сократить вывод, используя специальный короткий тег PHP (при его использовании команду <b>echo</b> указывать не надо):
</p>
<code>
	<pre>
	&ltp>&lt?= 'text' ?>&lt/p>
	</pre>
</code>
<p class="m-1 fw-bold">
	Задача
</p>
<p class="m-2">
	Упростите следующий код:
</p>
<code>
	<pre>
	&ltp>&lt?php echo date('w'); ?>&lt/p>
	</pre>
</code>
<p class="m-1 fw-bold">
	Решение:
</p>
<code>
	<pre>
		&ltp>&lt?= date('w'); ?>&lt/p>
	</pre>
</code>
<p class="m-1 fw-bold">
	Результат:
</p>
<p><?= date('w'); ?></p>

<h3 class="mt-5 text-left">
	Вставка PHP переменной в HTML код
</h3>
<p class="m-1">
	Пусть теперь у нас есть некоторый абзац, выше которого определена переменная PHP:
</p>
<code>
	<pre>
	&lt?php
	$str = 'text';
	?>
	&ltp>text&lt/p></pre>
</code>
<p>Мы можем выполнить вставку нашей переменной вовнутрь абзаца:</p>
<code>
	<pre>
	&lt?php
	$str = 'text';
	?>
	&ltp>&lt?php echo $str?>&lt/p></pre>
</code>
<p>А можем упросить вставку переменной, используя короткий PHP тег:</p>
<code>
	<pre>
	&lt?php
	$str = 'text';
	?>
	&ltp>&lt?= $str?>&lt/p></pre>
</code>
<p class="fw-bold">Задача</p>
<code>
	<pre>
	Даны три переменные:
	&lt?php
	$str1 = 'text1';
	$str2 = 'text2';
	$str3 = 'text3';
	?>
	Также даны три абзаца:
	&ltp>&lt/p>
	&ltp>&lt/p>
	&ltp>&lt/p>
	Выполните вставку текста переменных в соответствующие абзацы.
	</pre>
</code>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	Даны три переменные:
	&lt?php
	$str1 = 'text1';
	$str2 = 'text2';
	$str3 = 'text3';
	?>
	Также даны три абзаца:
	&ltp>&lt?=$str1?>&lt/p>
	&ltp>&lt?=$str2?>&lt/p>
	&ltp>&lt?=$str3?>&lt/p>
	Выполните вставку текста переменных в соответствующие абзацы.
	</pre>
</code>
<p class="fw-bold">Результат:</p>

<?php
$str1 = 'text1';
$str2 = 'text2';
$str3 = 'text3';
?>
<p class="ps-5 ms-5"><?= $str1 ?></p>
<p class="ps-5 ms-5"><?= $str2 ?></p>
<p class="ps-5 ms-5"><?= $str3 ?></p>

<h3 class="mt-5 text-left">
	Вставка элементов массива в HTML код
</h3>
<p class="m-1">
	Можно также вставлять элементы массива. Давайте посмотрим, как это делается. Пусть у нас дан следующий массив:
</p>
<code>
	<pre>$arr = [1, 2, 3, 4, 5];</pre>
</code>
<p>Вставим каждый его элемент в отдельный абзац:</p>
<code>
	<pre>
	&ltp>&lt?= $arr[0] ?>&lt/p>
	&ltp>&lt?= $arr[1] ?>&lt/p>
	&ltp>&lt?= $arr[2] ?>&lt/p>
	&ltp>&lt?= $arr[3] ?>&lt/p>
	&ltp>&lt?= $arr[4] ?>&lt/p>
	</pre>
</code>
<p class="fw-bold">Задача</p>
<code>
	<pre>
		Дан массив:
	$arr = ['a' => 1, 'b' => 2, 'c' => 3];
	Также даны три абзаца:
	&ltp>&lt/p>
	&ltp>&lt/p>
	&ltp>&lt/p>
	Выполните вставку элементов массива в соответствующие абзацы.
</pre>
</code>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		$arr = ['a' => 1, 'b' => 2, 'c' => 3];
		&ltp>&lt?=$arr['a']?>&lt/p>
		&ltp>&lt?=$arr['b']?>&lt/p>
		&ltp>&lt?=$arr['c']?>&lt/p>
	</pre>
</code>
<p class="fw-bold">Результат:</p>

<?php
$arr = ['a' => 1, 'b' => 2, 'c' => 3];
?>
<p class="ps-5 ms-5"><?= $arr['a'] ?></p>
<p class="ps-5 ms-5"><?= $arr['b'] ?></p>
<p class="ps-5 ms-5"><?= $arr['c'] ?></p>


<h3 class="mt-5 text-left">
	Условия и разрыв PHP кода
</h3>
<p class="m-1">
	Пусть у нас есть некоторая переменная:
</p>
<code>
	<pre>	$test = true;</pre>
</code>
<p>Давайте выведем какой-нибудь кусочек HTML кода, если наша переменная равна true:</p>
<code>
	<pre>
		&lt?php
		if ($test) {
			echo '&ltp>text&lt/p>';
		}
		?></pre>
</code>
<p>Можем переделать этот код на следующий, с разрывом PHP скобок:</p>
<code>
	<pre>
	&lt?php if ($test) { ?>
		&ltp>text&lt/p>
	&lt?php } ?></pre>
</code>
<p>Такое можно упростить еще больше, если воспользоваться альтернативным синтаксисом if:</p>
<code>
	<pre>
	&lt?php if ($test): ?>
		&ltp>text&lt/p>
	&lt?php endif; ?></pre>
</code>
<p class="fw-bold">Задача</p>
<code>
	<pre>Дана переменная:
&lt?php
	$show = true;
?>
Дан код:

&ltdiv>
	&ltp>text1&lt/p>
	&ltp>text2&lt/p>
	&ltp>text3&lt/p>
&lt/div>
Выведите приведенный HTML код, если переменная show равна true.</pre>
</code>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
&lt?php $show = true ?>

&lt?php if($show) {?>
	&ltdiv>show&lt/div>
&lt?php } ?>
	
&lt?php if($show):?>
	&ltdiv>show2&lt/div>
&lt?php endif ?>
	</pre>
</code>
<p class="fw-bold">Результат:</p>

<?php $show = true ?>

<?php if ($show) { ?>
	<div>show</div>
<?php } ?>

<?php if ($show): ?>
	<div>show2</div>
<?php endif ?>

<h3 class="mt-5 text-left">
	Блок else в условиях для разрыва PHP кода
</h3>
<p class="m-1">
	Пусть теперь у нас также есть и блок else:
</p>
<code>
	<pre>
	&lt?php if ($test) { ?>
		&ltp>+++&lt/p>
	&lt?php } else { ?>
		&ltp>---&lt/p>
	&lt?php } ?>
	</pre>
</code>
<p class="m-1">
	Можем и его переписать через альтернативный синтаксис:
</p>
<code>
	<pre>
	&lt?php if ($test): ?>
		&ltp>+++&lt/p>
	&lt?php else: ?>
		&ltp>---&lt/p>
	&lt?php endif ?>
	</pre>
</code>
<p class="fw-bold">Задача:</p>
<code>
	<pre>
	Дана переменная:
	&lt?php
	$show = true;
	?>
	Дан код:
	&ltdiv>
		&ltp>text+&lt/p>
		&ltp>text+&lt/p>
		&ltp>text+&lt/p>
	&lt/div>
	&ltdiv>
		&ltp>text-&lt/p>
		&ltp>text-&lt/p>
		&ltp>text-&lt/p>
	&lt/div>
	Выведите первый див, если переменная show равна true, и второй див, если переменная равна false.
	</pre>
</code>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$show = true;
	?>
	&lt?php if ($show) { ?>
		&ltdiv>
			&ltp>text+&lt/p>
			&ltp>text+&lt/p>
			&ltp>text+&lt/p>
		&lt/div>
	&lt?php } else { ?>
		&ltdiv>
			&ltp>text-&lt/p>
			&ltp>text-&lt/p>
			&ltp>text-&lt/p>
		&lt/div>
	&lt?php } ?>
	&ltbr/>
	&lt?php if (!$show): ?>
		&ltdiv>
			&ltp>text+&lt/p>
			&ltp>text+&lt/p>
			&ltp>text+&lt/p>
		&lt/div>
	&lt?php else: ?>
		&ltdiv>
			&ltp>text-&lt/p>
			&ltp>text-&lt/p>
			&ltp>text-&lt/p>
		&lt/div>
	&lt?php endif ?>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$show = true;
?>
<?php if ($show) { ?>
	<div>
		<p>text+</p>
		<p>text+</p>
		<p>text+</p>
	</div>
<?php } else { ?>
	<div>
		<p>text-</p>
		<p>text-</p>
		<p>text-</p>
	</div>
<?php } ?>
<br />
<?php if (!$show): ?>
	<div>
		<p>text+</p>
		<p>text+</p>
		<p>text+</p>
	</div>
<?php else: ?>
	<div>
		<p>text-</p>
		<p>text-</p>
		<p>text-</p>
	</div>
<?php endif ?>

<h3 class="mt-5 text-left">
	Блок elseif в условиях для разрыва PHP кода
</h3>
<p class="m-1">
	Можно также сделать несколько условий с помощью elseif:
</p>
<code>
	<pre>&lt?php if ($test === 1) { ?>
	&ltp>1&lt/p>
&lt?php } elseif ($test === 2) { ?>
	&ltp>2&lt/p>
&lt?php } else { ?>
	&ltp>?&lt/p>
&lt?php } ?></pre>
</code>
<p class="m-1">
	Перепишем через альтернативный синтаксис
</p>
<code>
	<pre>&lt?php if ($test === 1): ?>
	&ltp>1&lt/p>
&lt?php elseif ($test === 2): ?>
	&ltp>2&lt/p>
&lt?php else: ?>
	&ltp>?&lt/p>
&lt?php endif; ?></pre>
</code>
<p class="fw-bold">Задача:</p>
<code>
	<pre>Даны дивы:

	&ltdiv>
		&ltp>text1&lt/p>
		&ltp>text1&lt/p>
		&ltp>text1&lt/p>
	&lt/div>
	&ltdiv>
		&ltp>text2&lt/p>
		&ltp>text2&lt/p>
		&ltp>text2&lt/p>
	&lt/div>
	&ltdiv>
		&ltp>text-&lt/p>
		&ltp>text-&lt/p>
		&ltp>text-&lt/p>
	&lt/div>
Сделайте условие, которое будет показывать один из дивов.</pre>
</code>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		&lt?php $num = 1; ?>
&lt?php if ($num == 1) { ?>
	&ltdiv>
		&ltp>text1&lt/p>
		&ltp>text1&lt/p>
		&ltp>text1&lt/p>
	&lt/div>
&lt?php } elseif ($num == 2) { ?>
	&ltdiv>
		&ltp>text2&lt/p>
		&ltp>text2&lt/p>
		&ltp>text2&lt/p>
	&lt/div>
&lt?php } else { ?>
	&ltdiv>
		&ltp>text-&lt/p>
		&ltp>text-&lt/p>
		&ltp>text-&lt/p>
	&lt/div>
&lt?php } ?>
&ltbr /> &lt!--  альтернативный синтаксис -->
&lt?php if ($num !== 1): ?>
	&ltdiv>
		&ltp>text1&lt/p>
		&ltp>text1&lt/p>
		&ltp>text1&lt/p>
	&lt/div>
&lt?php elseif ($num !== 2): ?>
	&ltdiv>
		&ltp>text2&lt/p>
		&ltp>text2&lt/p>
		&ltp>text2&lt/p>
	&lt/div>
&lt?php else: ?>
	&ltdiv>
		&ltp>text-&lt/p>
		&ltp>text-&lt/p>
		&ltp>text-&lt/p>
	&lt/div>
&lt?php endif ?>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<?php $num = 1; ?>
<?php if ($num == 1) { ?>
	<div>
		<p>text1</p>
		<p>text1</p>
		<p>text1</p>
	</div>
<?php } elseif ($num == 2) { ?>
	<div>
		<p>text2</p>
		<p>text2</p>
		<p>text2</p>
	</div>
<?php } else { ?>
	<div>
		<p>text-</p>
		<p>text-</p>
		<p>text-</p>
	</div>
<?php } ?>
<br /> <!--  альтернативный синтаксис -->
<?php if ($num !== 1): ?>
	<div>
		<p>text1</p>
		<p>text1</p>
		<p>text1</p>
	</div>
<?php elseif ($num !== 2): ?>
	<div>
		<p>text2</p>
		<p>text2</p>
		<p>text2</p>
	</div>
<?php else: ?>
	<div>
		<p>text-</p>
		<p>text-</p>
		<p>text-</p>
	</div>
<?php endif ?>

<h3 class="mt-5 text-left">
	Циклы и разрыв PHP кода
</h3>
<p class="m-1">
	Давайте сформируем в цикле несколько абзацев:
</p>
<code>
	<pre>	&lt?php for ($i = 1; $i &lt= 9; $i++) {
		echo '&ltp>' . $i . '&lt/p>';
	} ?></pre>
</code>
<p class="m-1">
	Можно переписать код с разрывом PHP:
</p>
<code>
	<pre>	&lt?php for ($i = 1; $i &lt= 9; $i++) { ?>
		&ltp>&lt?= $i ?>&lt/p>
	&lt?php } ?></pre>
</code>
<p class="m-1">
	Для простоты можно воспользоваться альтернативным синтаксисом:
</p>
<code>
	<pre>	&lt?php for ($i = 1; $i &lt= 9; $i++): ?>
		&ltp>&lt?= $i ?>&lt/p>
	&lt?php endfor; ?></pre>
</code>
<p class="fw-bold">Задача:</p>
<code>
	<pre>Сформируйте с помощью цикла следующий HTML код:
&ltul>
	&ltli>1&lt/li>
	&ltli>2&lt/li>
	&ltli>3&lt/li>
	&ltli>4&lt/li>
	&ltli>5&lt/li>
&lt/ul></pre>
</code>
<p class="fw-bold">Решение:</p>
<code>
	<pre>&ltul>
	&lt?php for ($i = 1; $i &lt 6; $i++): ?>
		&ltli>&lt?= $i ?>&lt/li>
	&lt?php endfor ?>
&lt/ul></pre>
</code>
<p class="fw-bold">Результат:</p>
<ul>
	<?php for ($i = 1; $i < 6; $i++): ?>
		<li><?= $i ?></li>
	<?php endfor ?>
</ul>


<h3 class="mt-5 text-left">Циклы и вставка элементов массива в разрыв PHP кода</h3>
<p class="m-1">Пусть у нас дан массив:</p>
<code>
	<pre>$arr = [1, 2, 3, 4, 5];</pre>
</code>
<p class="m-1">Давайте выведем каждый элемент этого массива в своем абзаце:</p>
<code>
	<pre>	foreach ($arr as $elem) {
		echo '&ltp>' . $elem . '&lt/p>';
	}</pre>
</code>
<p class="m-1">Можно переписать код с разрывом PHP:</p>
<code>
	<pre>	foreach ($arr as $elem) { ?>
	&ltp>&lt?= $elem ?>&lt/p>
	}</pre>
</code>
<p class="m-1">Для простоты можно воспользоваться альтернативным синтаксисом:</p>
<code>
	<pre>	&lt?php foreach ($arr as $elem): ?>
		&ltp>&lt?= $elem ?>&lt/p>
	&lt?php endforeach; ?></pre>
</code>
<p class="fw-bold">Задача:</p>
<code>
	<pre>Дан массив:

	&lt?php
	$arr = ['user1', 'user2', 'user3'];
	?>
	С помощью этого массива и цикла сформируйте следующий HTML код:

	&ltdiv>
		&lth2>user1&lt/h2>
		&ltp>text&lt/p>
	&lt/div>
	&ltdiv>
		&lth2>user2&lt/h2>
		&ltp>text&lt/p>
	&lt/div>
	&ltdiv>
		&lth2>user3&lt/h2>
		&ltp>text&lt/p>
	&lt/div></pre>
</code>
<p class="fw-bold">Решение:</p>
<code>
	<pre>	&lt?php $arr = ['user1', 'user2', 'user3'];?>
	&lt?php foreach ($arr as $elem): ?>
		&ltdiv>
			&lth2>&lt?= $elem ?>&lt/h2>
			&ltp>text&lt/p>
		&lt/div>
	&lt?php endforeach ?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$arr = ['user1', 'user2', 'user3'];
?>
<?php foreach ($arr as $elem): ?>
	<div>
		<h2><?= $elem ?></h2>
		<p>text</p>
	</div>
<?php endforeach ?>
<p class="fw-bold">Задача:</p>
<code>
	<pre>
	Дан массив:

	&lt?php
		$arr = [
			[
				'name' => 'user1',
				'age'  => 30,
			],
			[
				'name' => 'user2',
				'age'  => 31,
			],
			[
				'name' => 'user3',
				'age'  => 32,
			],
		];
	?>
	С помощью этого массива и цикла сформируйте следующий HTML код:

	&ltdiv>
		&ltp>name: user1&lt/p>
		&ltp>age: 30&lt/p>
	&lt/div>
	&ltdiv>
		&ltp>name: user2&lt/p>
		&ltp>age: 31&lt/p>
	&lt/div>
	&ltdiv>
		&ltp>name: user3&lt/p>
		&ltp>age: 32&lt/p>
	&lt/div></pre>
</code>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php $arr = [
		[
			'name' => 'user1',
			'age'  => 30,
		],
		[
			'name' => 'user2',
			'age'  => 31,
		],
		[
			'name' => 'user3',
			'age'  => 32,
		],
	]; ?>

	&lt?php foreach ($arr as $elem): ?>
		&ltp>name: &lt?= $elem['name'] ?>&lt/p>
		&ltp>age: &lt?= $elem['age'] ?>&lt/p>
	&lt?php endforeach ?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php $arr = [
	[
		'name' => 'user1',
		'age'  => 30,
	],
	[
		'name' => 'user2',
		'age'  => 31,
	],
	[
		'name' => 'user3',
		'age'  => 32,
	],
]; ?>

<?php foreach ($arr as $elem): ?>
	<p>name: <?= $elem['name'] ?></p>
	<p>age: <?= $elem['age'] ?></p>
<?php endforeach ?>
<h3 class="mt-4 text-center">
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
<p class="m-2 mt-4 fw-bold">
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
<h3 class="mt-4 text-center">
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
<p class="m-2 mt-4 fw-bold">
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
<h3 class="mt-4 text-center">
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

<p class="m-2 mt-4 fw-bold">
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

<h3 class="mt-4 text-center">
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
<p class="m-2 mt-4 fw-bold">
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
<h3 class="mt-4 text-center">
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
<p class="m-2 mt-4 fw-bold">
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


<h3 class="mt-4 text-center">
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
<p class="m-2 mt-4 fw-bold">
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

<h3 class="mt-4 text-center">
	Генерация тегов в PHP
</h3>
<p class="m-1">
	Давайте теперь научимся формировать теги с использованием переменных. Пусть, к примеру, у нас есть следующая 	переменная:	
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
<p class="m-2 mt-4 fw-bold">
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
<h3 class="mt-4 text-center">
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
	echo "&lta href="$href">$text</a>"; 
	// не будет работать 
	</pre>
</code>
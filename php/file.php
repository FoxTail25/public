<h3 class="fw-bold mt-5">Чтение файлов в PHP</h3>
<p>Функция <b>file_get_contents</b> позволяет выполнять чтение файла. Параметром функция принимает имя файла, а своим результатом возвращает текст этого файла. Давайте посмотрим на практике. Пусть у нас есть файл index.php, к которому мы обращаемся через браузер. Пусть также в этой же папке находится файл test.txt. Давайте прочитаем текст текстового файла и выведем этот текст на экран:</p>
<code>
	<pre>
		&lt?php
		echo file_get_contents('test.txt');
		?>
	</pre>
</code>

<p class="fw-bold mt-5">Задача</p>
<p>Пусть у вас есть файлы 1.txt и 2.txt, в тексте которых записаны какие-то числа. Напишите скрипт, который выведет на экран сумму записанных в этих файлах чисел.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		&lt?php
		$num1 = file_get_contents('files/1.txt');
		$num2 = file_get_contents('files/2.txt');
		echo $num1 + $num2;
		?>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$num1 = file_get_contents('files/1.txt');
$num2 = file_get_contents('files/2.txt');
echo $num1 + $num2;
?>

<h3 class="fw-bold mt-5">Запись файлов в PHP</h3>
<p>Давайте теперь научимся записывать данные в файлы. Для этого предназначена функция <b>file_put_contents</b>, которая первым параметром принимает путь к файлу, а вторым - текст, который мы хотим записать.
	<br />Для примера давайте запишем какой-нибудь текст в файл <i><b>test.txt</b></i>:
</p>
<code>
	<pre>
		&lt?php
		file_put_contents('test.txt', '!');
		?>
	</pre>
</code>

<p class="fw-bold mt-5">Задача</p>
<p>Дан массив с числами. Найдите сумму этих чисел и результат запишите в файл sum.txt.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		&lt?php
		$numArr = [1, 2, 3, 4, 5];
		file_put_contents('files/sum.txt', array_sum($numArr));
		?>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$numArr = [1, 2, 3, 4, 5];
file_put_contents('files/sum.txt', array_sum($numArr));
?>
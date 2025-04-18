<h3 class="fw-bold mt-5">Чтение файлов в PHP</h3>
<p>Функция <b>file_get_contents</b> позволяет выполнять чтение файла. Параметром функция принимает имя файла, а своим результатом возвращает текст этого файла. Давайте посмотрим на практике. Пусть у нас есть файл index.php, к которому мы обращаемся через браузер. Пусть также в этой же папке находится файл test.txt. Давайте прочитаем текст текстового файла и выведем этот текст на экран:</p>
<code>
	<pre>
		&lt?php
		echo file_get_contents('test.txt');
		?></pre>
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
		?></pre>
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
		?></pre>
</code>

<p class="fw-bold mt-5">Задача</p>
<p>Дан массив с числами. Найдите сумму этих чисел и результат запишите в файл sum.txt.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		&lt?php
		$numArr = [1, 2, 3, 4, 5];
		file_put_contents('files/sum.txt', array_sum($numArr));
		?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$numArr = [1, 2, 3, 4, 5];
file_put_contents('files/sum.txt', array_sum($numArr));
?>
<p>'/files/sum.txt'</p>

<h3 class="fw-bold">Комбинация операций чтения и записи файла в PHP</h3>
<p>Чтение и запись файлов можно комбинировать. Давайте для примера прочитаем файл, добавим в конец его текста восклицательный знак и запишем текст обратно в этот файл:</p>
<code>
	<pre>
	$text = file_get_contents('test.txt');
	file_put_contents('test.txt', $text . '!');</pre>
</code>

<p class="fw-bold mt-5">Задача 1</p>
<p>Пусть у вас есть файл, в котором записано некоторое число. Откройте этот файл, возведите число в квадрат и запишите обратно в файл.</p>
<p class="fw-bold">Решение</p>
<code>
	<pre>
	&lt?php
	$num = file_get_contents('files/num.txt');
	file_put_contents('files/num.txt', pow($num, 2));
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$num = file_get_contents('files/num.txt');
if ($num > 1000000) {
	$num = 2;
};
file_put_contents('files/num.txt', pow($num, 2));
?>
<p>'files/num.txt'</p>

<p class="fw-bold mt-5">Задача 2</p>
<p>Пусть в корне вашего сайта лежит файл count.txt. Изначально в нем записано число 0. Сделайте так, чтобы при обновлении страницы наш скрипт каждый раз увеличивал это число на 1. То есть у нас получится счетчик обновления страницы в виде файла.</p>
<p class="fw-bold">Решение</p>
<code>
	<pre>
		&lt?php
	if (file_get_contents('files/count.txt') == 0) {
		$renewCount = 1;
		file_put_contents('files/count.txt', $renewCount);
	} else {
		$renewCount = file_get_contents('files/count.txt');
		++$renewCount;
		file_put_contents('files/count.txt', $renewCount);
	}
	?>
	&ltp>Счетчик обновления страницы = &lt?= $renewCount ?>&lt/p></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
if (file_get_contents('files/count.txt') == 0) {
	$renewCount = 1;
	file_put_contents('files/count.txt', $renewCount);
} else {
	$renewCount = file_get_contents('files/count.txt');
	++$renewCount;
	file_put_contents('files/count.txt', $renewCount);
}
?>
<p>Счетчик обновления страницы = <?= $renewCount ?></p>


<p class="fw-bold mt-5">Задача 3</p>Пусть в корне вашего сайта лежат файлы 11.txt, 12.txt и 13.txt. Вручную сделайте массив с именами этих файлов. Переберите его циклом, прочитайте содержимое каждого из файлов, слейте его в одну строку и запишите в новый файл new.txt. Изначально этого файла не должно быть.</p>
<p class="fw-bold">Решение</p>
<code>
	<pre>
	&lt?php
	$arrFileNames = ['11.txt', '12.txt', '13.txt',];
	$result ='';
	foreach($arrFileNames as $fileName){
		global $result;
		$result .= file_get_contents("files/$fileName");
	}
	file_put_contents('files/new.txt', $result);
	?>
	&ltp>Результат в файле files/new.txt = &lt?= file_get_contents('files/new.txt') ?>&lt/p></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$arrFileNames = ['11.txt', '12.txt', '13.txt',];
$result = '';
foreach ($arrFileNames as $fileName) {
	global $result;
	$result .= file_get_contents("files/$fileName");
}
file_put_contents('files/new.txt', $result);
?>
<p>Результат в файле files/new.txt = <?= file_get_contents('files/new.txt') ?></p>

<h3 class="fw-bold mt-5">Относительные пути в PHP</h3>
<p>Как вы уже знаете, в параметр функции <b>file_get_contents</b> следует писать имя файла. Это, однако, работает только в том случае, если читаемый файл лежит в той же папке, в которой запускается наш скрипт.<br /> Если же файл лежит в другом месте, то в параметр функции нужно писать путь к этому файлу.<br /> Посмотрим на примере.
</p>
<p class="fw-bold">Пример 1</p>
<p>Пусть у нас есть следующая структура файлов:</p>
<pre>
	index.php
		/directory/
		test.txt
</pre>
<p>Давайте прочитаем содержимое текстового файла. Для этого кроме имени файла нам понадобится указать еще и папку, в которой он лежит:</p>
<code>
	<pre>
		&lt?php
		echo file_get_contents('directory/test.txt');
		?>
	</pre>
</code>
<p class="fw-bold">Пример 2</p>
<p>Пусть у нас есть следующая структура файлов:</p>
<pre>
	/script/
		index.php
	test.txt
</pre>
<p>В таком случае мы должны явно указать в пути к файлу, что этот файл нужно искать на уровень выше. Для этого перед именем файла следует написать ../. Сделаем это:</p>
<code>
	<pre>
		&lt?php
		echo file_get_contents('../test.txt'); 
		?>
	</pre>
</code>
<p class="fw-bold">Пример 3</p>
<p>Пусть у нас есть следующая структура файлов:</p>
<pre>
	/script/
		index.php
	/directory/
		test.txt
</pre>
<p>В этом случае при чтении файла мы сначала выйдем на уровень выше, а затем укажем путь к нашему файлу относительно этого уровня:</p>
<code>
	<pre>
		&lt?php
		echo file_get_contents('../directory/test.txt');
		?>
	</pre>
</code>
<p class="fw-bold">Пример 4</p>
<p>Пусть у нас есть следующая структура файлов:</p>
<pre>
	/script/
		/test/
			index.php
	/directory/
		test.txt
</pre>
<p>В этом случае нам потребуется выйти наверх два раза:</p>
<code>
	<pre>
		&lt?php
		echo file_get_contents('../../directory/test.txt');
		?>
	</pre>
</code>

<p class="fw-bold mt-5">Задача 1</p>
<p>Напишите код, который прочитает содержимое текстового файла:</p>
<pre>
	index.php
	/dir1/
		/dir2/
			test.txt
</pre>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		&lt?php
		echo file_get_contents('dir1/dir2/test.txt');
		?>
	</pre>
</code>
<p class="fw-bold mt-5">Задача 2</p>
<p>Напишите код, который прочитает содержимое текстового файла:</p>
<pre>
/script/
	index.php
/dir1/
	/dir2/
		test.txt
</pre>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		&lt?php
		echo file_get_contents('../dir1/dir2/test.txt');
		?>
	</pre>
</code>
<p class="fw-bold mt-5">Задача 3</p>
<p>Напишите код, который прочитает содержимое текстового файла:</p>
<pre>
	/script1/
		/script2/
			index.php
	/dir/
		test.txt
</pre>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		&lt?php
		echo file_get_contents('../../dir/test.txt');
		?>
	</pre>
</code>
<p class="fw-bold mt-5">Задача 4</p>
<p>Напишите код, который прочитает содержимое текстового файла:</p>
<pre>
	/script1/
		/script2/
			/script3/
				index.php
	/dir1/
		/dir2/
			/dir3/
				test.txt
</pre>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		&lt?php
		echo file_get_contents('../../../dir1/dir2/dir3/test.txt');
		?>
	</pre>
</code>

<h3 class="fw-bold mt-5">Абсолютные пути в PHP</h3>
<p>Давайте прочитаем текстовый файл, находящийся в папке с нашим скриптом:</p>
<code>
	<pre>
		&lt?php
		echo file_get_contents('test.txt');
		?>
	</pre>
</code>
<p>Давайте теперь в начале пути поставим слеш:</p>
<code>
	<pre>
		&lt?php
		echo file_get_contents('/test.txt');
		?>
	</pre>
</code>
<p>В этом случае путь станет не относительным, а абсолютным. При этом наш файл будет искаться от корня операционной системы. Конечно же, файла по такому пути не найдется, так как он расположен в папке с нашем сайтом.<br />Мы можем получить путь от корня операционной системы до папки с нашим сайтом:</p>
<code>
	<pre>
		&lt?php
		echo $_SERVER['DOCUMENT_ROOT'];
		?>
	</pre>
</code>
<p>Можем добавить полученный путь к имени искомого файла - и получим правильный абсолютный путь к нашему файлу:</p>
<code>
	<pre>
		&lt?php
		echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/test.txt');
		?>
	</pre>
</code>

<h3 class="fw-bold mt-5">Преимущества абсолютного пути в PHP</h3>
<p>Использование абсолютного пути удобно, когда файл с нашим скриптом и прочитываемый файл находятся в подпапках нашего сайта.<br />
	Давайте посмотрим на примере. Пусть у нас есть следующая структура файлов:</p>
<pre>
	/script/
		index.php
	/directory/
		test.txt
</pre>
<p>Прочитаем наш файл, используя относительный путь:</p>
<code>
	<pre>
		&lt?php
		echo file_get_contents('../directory/test.txt');
		?>
	</pre>
</code>
<p>А теперь прочитаем наш файл, используя абсолютный путь:</p>
<code>
	<pre>
		&lt?php
		$root = $_SERVER['DOCUMENT_ROOT'];
		echo file_get_contents($root . '/directory/test.txt');
		?>
	</pre>
</code>
<p>Во втором случае, даже если мы переместим файл со скриптом в другое место, <b>путь к файлу не придется менять</b>, ведь он задается от корня сайта.</p>

<h3 class="fw-bold mt-5">Абсолютные пути к папке и файлу скрипта в PHP</h3>
<p>Иногда нам нужно получить не путь к корню сайта, а путь к папке со скриптом.<br />
	Это будут разные пути в том случае, если запускаемый скрипт находится не в корне сайта, а в подпапке, например, так:</p>
<pre>
	/script/
		index.php
</pre>
<p>В этом случае путь к папке со скриптом находится в константе __DIR__:</p>
<code>
	<pre>
		&lt?php
			echo __DIR__;
		?></pre>
</code>
<p><i>Результат будет вот таким: <?= __DIR__ ?></i></p>
<p class="mt-2">Можно также получить путь к самому файлу скрипта с помощью константы __FILE__:</p>
<code>
	<pre>
		&lt?php
			echo __FILE__;
		?></pre>
</code>
<p><i>Результат будет вот таким: <?= __FILE__ ?></i></p>

<p class="fw-bold mt-5">Задача 1</p>
<p>Напишите код, который прочитает содержимое текстового файла:</p>
<pre>
	/script1/
		/script2/
			index.php
	/dir/
		test.txt</pre>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		&lt?php
		$root = $_SERVER['DOCUMENT_ROOT'];
		echo file_get_contents($root . '/dir/test.txt');
		?></pre>
</code>
<p class="fw-bold mt-5">Задача 2</p>
<p>Напишите код, который прочитает содержимое текстового файла:</p>
<pre>
	/script1/
		/script2/
			/script3/
				index.php
	/dir1/
		/dir2/
			/dir3/
				test.txt</pre>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		&lt?php
		$root = $_SERVER['DOCUMENT_ROOT'];
		echo file_get_contents($root . '/dir1/dir2/dir3/test.txt');
		?></pre>
	</code>

<h3 class="fw-bold mt-5">Переименовывание файлов в PHP</h3>
<p>Функция rename позволяет переименовывать файлы. Первым параметром указываем старое имя файла, вторым - новое имя файла:</p>
<code>
	<pre>
		&lt?php
		rename('test.txt', 'new.txt');
		?></pre>
</code>
<p class="fw-bold mt-5">Задача 1</p>
<p>Пусть в корне вашего сайта лежит файл old.txt. Переименуйте его на new.txt.</p>
<p class="fw-bold">Решение</p>
<code>
	<pre>
		rename('files/old.txt', 'files/new.txt');		
	</pre>
</code>
<?php
// rename('files/old.txt', 'files/new.txt');
?>

<h3 class="fw-bold mt-5">Перемещение файлов в PHP</h3>
<p>Функция rename позволяет также перемещать файлы. Для этого вторым параметром функции нужно указать новый путь к файлу. Давайте для примера перенесем наш файл в папку dir, одновременно переименовав его на new.txt:</p>
<code>
	<pre>
	&lt?php
		rename('test.txt', 'dir/new.txt');
	?></pre>
</code>
<p>Можно сделать только перемещение, а сам файл не переименовывать:</p>
<code>
	<pre>
	&lt?php
		rename('test.txt', 'dir/test.txt');
	?></pre>
</code>

<h3 class="fw-bold mt-5">Копирование файлов в PHP</h3>
<p>Функция copy позволяет копировать файл. Первым параметром она принимает путь к файлу, который хотим копировать, вторым - новый путь файла, куда хотим положить копию. Мы можем сделать копию и положить ее рядом, или положить ее в другую папку. Сделаем просто копию:</p>
<p>Давайте для примера сделаем копию файла, разместив ее в папке с исходным файлом:</p>
<code>
	<pre>
	&lt?php
		copy('test.txt', 'copy.txt');
	?></pre>
</code>
<p>А теперь давайте поместим нашу копию в папку dir:</p>
<code>
	<pre>
	&lt?php
		copy('test.txt', 'dir/copy.txt');
	?></pre>
</code>
<p class="fw-bold mt-5">Задача 1</p>
<p>Пусть в корне вашего сайта лежит файл. С помощью цикла положите в папку copy пять копий этого файла. Именем файлов копий пусть будут их порядковые номера.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	if(!file_exists('files/copy')){
		mkdir('files/copy');
	}
	for($i = 1; $i<=5; $i++){
		copy('files/new.txt', "files/copy/$i.txt");
	}
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
if(!file_exists('files/copy')){
	mkdir('files/copy');
}
for($i = 1; $i<=5; $i++){
	copy('files/new.txt', "files/copy/$i.txt");
}
?>

<h3 class="fw-bold mt-5">Удаление файлов в PHP</h3>
<p>Для удаления файлов используется функция unlink. Параметром она принимает путь к удаляемому файлу:</p>
<code>
<pre>
	&lt?php
	unlink('test.txt');
	?></pre>
</code>

<p class="fw-bold mt-5">Задача:</p>
<p>Пусть в корне вашего сайта лежат файлы 1.txt, 2.txt и 3.txt. Вручную сделайте массив с именами этих файлов. Переберите его циклом и удалите все эти файлы.</p>
<p class="fw-bold">Решение:</p>
<code>
<pre>
	&lt?php
	$arrFileName = ['1.txt', '2.txt', '3.txt'];
	foreach ($arrFileName as $value) {
		unlink("files/copy/$value");
	}
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$arrFileName = ['1.txt', '2.txt', '3.txt'];
foreach ($arrFileName as $value) {
	unlink("files/copy/$value");
}
?>
<h3 class="fw-bold mt-5">Определение размера файлов в PHP</h3>
<p>Функция filesize позволяет находить размеры файла в байтах. Пример:</p>
<code>
	<pre>
	&lt?php
	echo filesize('test.txt');
	?></pre>
</code>
<P>Размер в байтах легко можно перевести в килобайты:</P>
<code>
	<pre>
	&lt?php
	echo filesize('test.txt') / 1024;
	?></pre>
</code>
<P>А теперь давайте переведем в мегабайты:</P>
<code>
	<pre>
	&lt?php
	echo filesize('test.txt') / (1024 * 1024);
	?></pre>
</code>
<h3 class="fw-bold mt-5">Проверка существования файлов в PHP</h3>
<p>Функция file_exists проверяет существует ли файл, путь к которому передан параметром. Пример:</p>
<code>
	<pre>
	&lt?php
	var_dump(file_exists('test.txt')); // true или false
	?></pre>
</code>
<P>Как правило, эта функция используется для того, чтобы проверить наличие файла перед выполнением операции над ним. Например, так:</P>
<code>
	<pre>
	&lt?php
	if (file_exists('test.txt')) {
		echo filesize('test.txt');
	} else {
		echo 'файла не существует';
	}
	?></pre>
</code>
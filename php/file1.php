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
if (!file_exists('files/copy')) {
	mkdir('files/copy');
}
for ($i = 1; $i <= 5; $i++) {
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


<p class="fw-bold mt-5">Задача 1</p>
<p>Проверьте, лежит ли в корне вашего сайта файл file.txt.</p>
<p class="fw-bold ">Решение:</p>
<code>
	<pre>
	&lt?php
	$filename = 'file.txt';
	$dir = 'files';
	if(file_exists("$dir/$filename")):?>
		&ltp>Файл &lt?=$filename?> есть в директории &lt?=$dir?>&lt/p>
	&lt?php else :?>
		&ltp>Файла &lt?=$filename?> нет в директории &lt?=$dir?>&lt/p>
	&lt?php endif ?></pre>
</code>
<p class="fw-bold ">Результат:</p>
<?php
$filename = 'file.txt';
$dir = 'files';
if (file_exists("$dir/$filename")): ?>
	<p>Файл <?= $filename ?> есть в директории <?= $dir ?></p>
<?php else : ?>
	<p>Файла <?= $filename ?> нет в директории <?= $dir ?></p>
<?php endif ?>


<p class="fw-bold mt-5">Задача 2</p>
<p>Проверьте, лежит ли в корне вашего сайта файл file.txt. Если нет - создайте его и запишите в него текст '!'.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$filename = 'file.txt';
	$dir = 'files';
	if(file_exists("$dir/$filename")):?>
	&ltp>Файл &lt?=$filename?> есть в директории &lt?=$dir?>&lt/p>
	&ltp>Вот его содержимое: &lt?= file_get_contents("$dir/$filename")?>&lt/p>
	&lt?php else :?>
	&ltp>Файла &lt?=$filename?> нет в директории &lt?=$dir?>&lt/p>
	&lt?php
	file_put_contents("$dir/$filename", '!');
	?>
	&ltp>Файла &lt?=$filename?> создан в директории &lt?=$dir?>&lt/p>
	&lt?php endif ?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$filename = 'file.txt';
$dir = 'files';
if (file_exists("$dir/$filename")): ?>
	<p>Файл <?= $filename ?> есть в директории <?= $dir ?></p>
	<p>Вот его содержимое: <?= file_get_contents("$dir/$filename") ?></p>
<?php else : ?>
	<p>Файла <?= $filename ?> нет в директории <?= $dir ?></p>
	<?php
	file_put_contents("$dir/$filename", '!');
	?>
	<p>Файла <?= $filename ?> создан в директории <?= $dir ?></p>
<?php endif ?>


<p class="fw-bold mt-5">Задача 3</p>
<p>Проверьте, лежит ли в корне вашего сайта файл message.txt. Если такой файл есть - выведите текст этого файла на экран.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
		$filename = 'message.txt';
		$dir = 'files';
		if(file_exists("$dir/$filename")):?>
		&ltp>Файл &lt?=$filename?> есть в директории &lt?=$dir?>&lt/p>
		&ltp>Вот его содержимое: &lt?= file_get_contents("$dir/$filename")?>&lt/p>
	&lt?php endif ?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$filename = 'message.txt';
$dir = 'files';
if (file_exists("$dir/$filename")): ?>
	<p>Файл <?= $filename ?> есть в директории <?= $dir ?></p>
	<p>Вот его содержимое: <?= file_get_contents("$dir/$filename") ?></p>
<?php endif ?>

<h3 class="fw-bold mt-5">Создание папок в PHP</h3>
<p>Функция <b>mkdir</b> позволяет создать папку. Параметром принимает путь к папке. Пример:</p>
<code>
	<pre>
	&lt?php
		mkdir('dir');
	?>
	</pre>
</code>

<p class="fw-bold mt-5">Задача 1</p>
<p>Создайте в корне вашего сайта папку с названием dir.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
		if(!file_exists('files/dir')){
			mkdir('files/dir');
		}
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
if (!file_exists('files/dir')) {
	mkdir('files/dir');
}
?>

<p class="fw-bold mt-5">Задача 2</p>
<p>Дан массив со строками. Создайте в корне вашего сайта папки, названиями которых служат элементы этого массива</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$arrNames = ['dir1','dir2','dir3'];
	foreach ($arrNames as $value) {
		if(!file_exists("files/$value")){
			mkdir("files/$value");
		}
	}
	?>		
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$arrNames = ['dir1', 'dir2', 'dir3'];
foreach ($arrNames as $value) {
	if (!file_exists("files/$value")) {
		mkdir("files/$value");
	}
}
?>

<p class="fw-bold mt-5">Задача 3</p>
<p>Создайте в корне вашего сайта папку с названием test. Затем создайте в этой папке три файла: 1.txt, 2.txt, 3.txt.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		&lt?php
		$dir = 'files';
		$arrFileNames = ['1.txt', '2.txt', '3.txt'];
		if (!file_exists("$dir/test")) {
			mkdir("$dir/test");
			foreach ($arrFileNames as $elem) {
				file_put_contents("$dir/test/$elem", '');
			}
		}
		?>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$dir = 'files';
$arrFileNames = ['1.txt', '2.txt', '3.txt'];
if (!file_exists("$dir/test")) {
	mkdir("$dir/test");
	foreach ($arrFileNames as $elem) {
		file_put_contents("$dir/test/$elem", '');
	}
}
?>


<h3 class="fw-bold mt-5">Удаление папок в PHP</h3>
<p>Функция <b>rmdir</b> используется для удаления папок. Пример:</p>
<code>
	<pre>
		&lt?php
		rmdir('dir');
		?></pre>
</code>
<p>Эта команда используется для удаления <b>ПУСТЫХ</b> папок. Если в удаляемой директории будут файлы, то функция выдаст ошибку.</p>


<p class="fw-bold mt-5">Задача</p>
<p>Удалите папку с названием test.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		&lt?php
		mkdir('files/test2'); // Создаём пустую директорию
		rmdir('files/test2'); // Удаляем созданную директорию.
		?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
mkdir('files/test2'); // Создаём пустую директорию
rmdir('files/test2'); // Удаляем созданную директорию.
?>

<h3 class="fw-bold mt-5">Переименование папок в PHP</h3>
<p>С помощью функции <b>rename</b> можно переименовывать папки. Давайте попробуем:</p>
<code>
	<pre>
		&lt?php
		rename('old', 'new');
		?></pre>
</code>
<p class="fw-bold mt-5">Задача</p>
<p>Пусть в корне вашего сайта лежит папка dir_r Переименуйте ее на test_r.</p>
<p class="fw-bold">Решение:</p>
<p class="fw-bold">Результат:</p>
<?php
if (!file_exists('files/dir_r')) {
	mkdir('files/dir_r'); // Создаём папку
}
if (!file_exists('files/test_r')) {
	rename('files/dir_r', 'files/test_r'); // Переименовываем созданную папку
}
?>

<h3 class="fw-bold mt-5">Перемещение папок в PHP</h3>
<p>С помощью функции <b>rename</b> можно перемещать папки. Давайте попробуем:</p>
<code>
	<pre>
		&lt?php
		rename('old', 'dir/new');
		?></pre>
</code>

<p class="fw-bold mt-5">Задача</p>
<p>Создайте папку dir_rn. Переместите ее в папку test_rn.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		&lt?php
		if (file_exists('files/dir_rn')) {
			rmdir('files/dir_rn');
			echo "delete files/dir_rn";
		}
		if (file_exists('files/test_rn')) {
			rmdir('files/test_rn/dir_rn');
			rmdir('files/test_rn');
			echo "delete files/test_rn";
		}

		mkdir('files/dir_rn');
		mkdir('files/test_rn');

		if (file_exists('files/test_rn/dir_rn')) {
			rmdir('files/test_rn/dir_rn');
		}
		rename('files/dir_rn', 'files/test_rn/dir_rn');
		?>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
if (file_exists('files/dir_rn')) {
	rmdir('files/dir_rn');
	echo "delete files/dir_rn";
}
if (file_exists('files/test_rn')) {
	rmdir('files/test_rn/dir_rn');
	rmdir('files/test_rn');
	echo "delete files/test_rn";
}

mkdir('files/dir_rn');
mkdir('files/test_rn');

if (file_exists('files/test_rn/dir_rn')) {
	rmdir('files/test_rn/dir_rn');
}
rename('files/dir_rn', 'files/test_rn/dir_rn');
?>

<h3 class="fw-bold mt-5">Чтение содержимого папки в PHP</h3>
<p>Функция <b>scandir</b> позволяет посмотреть содержимое папки и получить в виде массива имена находящихся в ней файлов и подпапок. Параметром функция принимает путь к файлу.</p>
<code>
	<pre>
	&lt?php
	$files = scandir('dir');
	var_dump($files);
	?></pre>
</code>
<p>В массиве с результатом функция scandir также покажет наличие папок с именами ".." и ".". Технически первое имя соответствует ссылке на родительскую папку, а второе - на текущую.<br />Эти имена лучше убрать из массива с результатом. Делается это следующим образом:</p>
<code>
	<pre>
	&lt?php
	$files = scandir('dir');
	$files = array_diff($files, ['..', '.']); 
	var_dump($files);
	?></pre>
</code>
<p>Можно упростить:</p>
<code>
	<pre>
	&lt?php
	$files = array_diff(scandir('dir'), ['..', '.']); 
	var_dump($files);
	?></pre>
</code>


<p class="fw-bold mt-5">Задача 1</p>
<p>Пусть в папкe files/test какие-то текстовые файлы. Выведите на экран столбец имен этих файлов.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		&lt?php
		$files = array_diff(scandir('files/test'), ['.', '..']);
		foreach ($files as $key => $file): ?>
		&ltp>Файл №: &lt?= $key - 1 ?> с именем: &lt?= $file ?>&lt/p>
		&lt?php endforeach ?>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$files = array_diff(scandir('files/test'), ['.', '..']);
foreach ($files as $key => $file): ?>
	<p>Файл №: <?= $key - 1 ?> с именем: <?= $file ?></p>
<?php endforeach ?>

<p class="fw-bold mt-5">Задача 2</p>
<p>Пусть в корне вашего сайта лежит папка dir2, а в ней какие-то текстовые файлы. Переберите эти файлы циклом и выведите их тексты в браузер.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		&lt?php
		$files = array_diff(scandir('dir2'), ['.', '..']);
		$text = '';
		foreach ($files as $file) {
			$text .= file_get_contents("dir2/$file");
			$text .= ' ';
		}
		?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$files = array_diff(scandir('dir2'), ['.', '..']);
$text = '';
foreach ($files as $file) {
	$text .= file_get_contents("dir2/$file");
	$text .= ' ';
}
?>
<p>Строка из файлов: <?= $text ?></p>

<p class="fw-bold mt-5">Задача 3</p>
<p>Пусть в корне вашего сайта лежит папка dir3, а в ней какие-то текстовые файлы. Переберите эти файлы циклом, откройте каждый из них и запишите в конец восклицательный знак.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		&lt?php
		$files = array_diff(scandir('dir3'), ['.', '..']);
		$text = '';
		foreach ($files as $file) {
			file_put_contents("dir3/$file", file_get_contents("dir3/$file").'!');
		}
		?></pre>
</code>
<!-- <p class="fw-bold">Результат:</p> -->
<?php
// $files = array_diff(scandir('dir3'), ['.', '..']);
// $text = '';
// foreach ($files as $file) {
// 	file_put_contents("dir3/$file", file_get_contents("dir3/$file") . '!');
// }
?>

<h3 class="fw-bold mt-5">Отличаем папку от файла в PHP</h3>
<p>Пусть у вас есть строка, содержащая путь к файлу или папке. С помощью специальных функций <b>is_file</b> и <b>is_dir</b> мы можем отличить, ссылается путь на файл или на папку.</p>
<p>Они работают следующим образом:</p>
<code>
	<pre>
		&lt?php
		$path = 'некий путь';

		var_dump(is_file($path)); // true для файла, false для папки
		var_dump(is_dir($path));  // true для папки, false для файла
		?></pre>
</code>

<p class="fw-bold mt-5">Задача</p>
<p>Пусть дан путь. Если путь ведет к папке выведите сообщение об этом. Если путь ведет к файлу выведите сообщение об этом.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	function checkPath($path)
	{
		if (is_dir($path)) {
			return 'Это папка';
		} else {
			return 'Это файл';
		}
	}
	?>
	&ltp>Путь 'dir3' &lt?= checkPath('dir3') ?>&lt/p>
	&ltp>Путь 'dir3/1.txt' &lt?= checkPath('dir3/1.txt') ?>&lt/p>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
function checkPath($path)
{
	if (is_dir($path)) {
		return 'Это папка';
	} else {
		return 'Это файл';
	}
}
?>
<p>Путь 'dir3' <?= checkPath('dir3') ?></p>
<p>Путь 'dir3/1.txt' <?= checkPath('dir3/1.txt') ?></p>

<h3 class="fw-bold mt-5">Разбираем содержимое папки в PHP</h3>




<h3 class="fw-bold mt-5">Заголовок</h3>
<p>Пусть у нас дана некоторая папка dir, содержащая в себе как файлы, так и папки.<br />Давайте получим массив имен из этой папки:</p>
<code>
	<pre>
	&lt?php
	$files = array_diff(scandir('dir'), ['..', '.']);
	?></pre>
</code>
<p>Давайте для каждого имени проверим, это файл или папка:</p>
<code>
	<pre>
	&lt?php
	$files = array_diff(scandir('dir'), ['..', '.']);
	
	foreach ($files as $file) {
		echo $file;
		var_dump(is_file('dir/' . $file));
	}
	?></pre>
</code>
<p>Обратите внимание на то, что имя папки, которую мы сканируем, написано в двух местах кода. Это не очень удобно. Вынесем это имя в отдельную переменную:</p>
<code>
	<pre>
	&lt?php
	$dir = 'dir';
	$files = array_diff(scandir($dir), ['..', '.']);
	
	foreach ($files as $file) {
		echo $file;
		var_dump(is_file($dir. '/' . $file));
	}
	?></pre>
</code>
<p>Давайте теперь для всех файлов выведем на экран их содержимое:</p>
<code>
	<pre>
	&lt?php
	$dir = 'dir';
	$files = array_diff(scandir($dir), ['..', '.']);
	
	foreach ($files as $file) {
		if (is_file($dir. '/' . $file)) {
			echo file_get_contents($dir. '/' . $file);
		}
	}
	?></pre>
</code>
<p>Можно заметить, что путь к файлу вычисляется два раза. Давайте вынесем его в отдельную переменную:</p>
<code>
	<pre>
	&lt?php
	$dir = 'dir';
	$files = array_diff(scandir($dir), ['..', '.']);
	
	foreach ($files as $file) {
		$path = $dir. '/' . $file; // путь к файлу
		
		if (is_file($path)) {
			echo file_get_contents($path);
		}
	}
	?></pre>
</code>

<p class="fw-bold mt-5">Задача 1</p>
<p>Дана папка. Выведите на экран столбец имен подпапок из этой папки.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$dir = $_SERVER['DOCUMENT_ROOT'];
	$allFiles = array_diff(scandir($dir), ['.', '..']);
	?>
	&ltp>Ниже представлен список подпапок в папке  &lt?= $dir ?> :&lt/p>
	&lt?php
	foreach ($allFiles as $file): ?>
		&lt?php if (is_dir($file)): ?>
		&ltp>Подпака &lt?= $file ?>&lt/p>
		&lt?php endif ?>
	&lt?php endforeach ?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$dir = $_SERVER['DOCUMENT_ROOT'];
$allFiles = array_diff(scandir($dir), ['.', '..']);
?>
<p>Ниже представлен список подпапок в папке <?= $dir ?> :</p>
<?php
foreach ($allFiles as $file): ?>
	<?php if (is_dir($file)): ?>
		<p>Подпака <?= $file ?></p>
	<?php endif ?>
<?php endforeach ?>

<p class="fw-bold mt-5">Задача 2</p>
<p>Дана папка. Выведите на экран столбец имен файлов из этой папки.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$dir = $_SERVER['DOCUMENT_ROOT'];
	$allFiles = array_diff(scandir($dir), ['.', '..']);
	?>
	&ltp>Ниже представлен список файлов в папке  &lt?= $dir ?> :&lt/p>
	&lt?php
	foreach ($allFiles as $file): ?>
		&lt?php if (is_file($file)): ?>
		&ltp>Подпака &lt?= $file ?>&lt/p>
		&lt?php endif ?>
	&lt?php endforeach ?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$dir = $_SERVER['DOCUMENT_ROOT'];
$allFiles = array_diff(scandir($dir), ['.', '..']);
?>
<p>Ниже представлен список файлов в папке <?= $dir ?> :</p>
<?php
foreach ($allFiles as $file): ?>
	<?php if (is_file($file)): ?>
		<p>Подпака <?= $file ?></p>
	<?php endif ?>
<?php endforeach ?>


<p class="fw-bold mt-5">Задача 3</p>
<p>Дана папка. 'dir4' Запишите в конец каждого файла этой папки текущий момент времени.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		&lt?php
		$files = array_diff(scandir('dir4'), ['.', '..']);
		foreach ($files as $elem) {
			if (is_file("dir4/$elem")) {
				file_put_contents("dir4/$elem", file_get_contents("dir4/$elem") . " " . date('d-m-Y') . " " . date('h:i:s'));
			}
		}
		?>
	</pre>
</code>
<!-- <p class="fw-bold">Результат:</p> -->
<?php
// $files = array_diff(scandir('dir4'), ['.', '..']);
// foreach ($files as $elem) {
// 	if (is_file("dir4/$elem")) {
// 		file_put_contents("dir4/$elem", file_get_contents("dir4/$elem") . " " . date('d-m-Y') . " " . date('h:i:s'));
// 	}
// }
?>

<h3 class="fw-bold mt-5">Вставка файлов в PHP</h3>
<p>Пусть у нас есть один файл:</p>
<code>
	<pre>
		&lt?php
		echo 'index';
		?>
	</pre>
</code>
<p>Пусть также есть второй файл:</p>
<code>
	<pre>
		&lt?php
		echo 'test';
		?>
	</pre>
</code>
<p>Давайте выполним вставку содержимого второго файла в первый. Это делается с помощью оператора <b><i>include:</i></b></p>
<code>
	<pre>
		&lt?php
		include 'test.php';
		echo 'index';
		?>
	</pre>
</code>
<p>Один и тот же файл можно вставлять сколько угодно раз:</p>
<code>
	<pre>
		&lt?php
		include 'test.php';
		include 'test.php';
		include 'test.php';
		echo 'index';
		?>
	</pre>
</code>

<p class="fw-bold mt-5">Задача</p>
<p>Сделайте файлы file1.php, file2.php, file3.php. Подключите их к вашему основному файлу.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		&lt?php
		include 'files/file1.php';
		include 'files/file2.php';
		include 'files/file3.php';
		?>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
include 'files/file1.php';
include 'files/file2.php';
include 'files/file3.php';
?>


<h3 class="fw-bold mt-5">Деление верстки на элементы в PHP</h3>
<p>Вставка одного файла в другой часто используется для того, чтобы разделять файлы с версткой на части. Это нужно для того, чтобы убрать повторяющиеся части HTML страниц в отдельные файлы для удобства редактирования.</p>
<p>Посмотрим на примере. Пусть у нас есть следующая страница:</p>
<code>
	<pre>
	&lthtml>
		&lthead>
			&lttitle>page1&lt/title>
			&ltmeta charset="utf-8">
			&ltlink rel="stylesheet" href="styles.css">
		&lt/head>
		&ltbody>
			text 1
		&lt/body>
	&lt/html>
	</pre>
</code>
<P>И еще одна:</P>
<code>
	<pre>
	&lthtml>
		&lthead>
			&lttitle>page2&lt/title>
			&ltmeta charset="utf-8">
			&ltlink rel="stylesheet" href="styles.css">
		&lt/head>
		&ltbody>
			text 2
		&lt/body>
	&lt/html>
	</pre>
</code>
<p>Как вы видите, в этих двух файла одинаковое содержимое блока head. Вынесем его в отдельный файл:</p>
<code>
	<pre>
	file: 'elem/headlink.php'

	&ltmeta charset="utf-8">
	&ltlink rel="stylesheet" href="styles.css">

	</pre>
</code>

<p>Подключим этот файл к каждой из нашей страниц:</p>
<code>
	<pre>
	&lthtml>
		&lthead>
			&lttitle>page2&lt/title>
			&lt?php include 'elem/headlink.php';?>
		&lt/head>
		&ltbody>
			text 2
		&lt/body>
	&lt/html>
	</pre>
</code>

<p class="fw-bold mt-5">Задача</p>
<p>Даны файлы со следующей версткой:</p>
<code>
	<pre>
&lt!DOCTYPE html>
&lthtml>
	&lthead>
		&lttitle>title&lt/title>
	&lt/head>
	&ltbody>
		&ltheader>
			header
		&lt/header>
		&ltaside>
			sidebar
		&lt/aside>
		&ltmain>
			content
		&lt/main>
		&ltheader>
			footer
		&lt/header>
	&lt/body>
&lt/html>
	</pre>
</code>
<p>Пусть верстка файлов отличается лишь тайтлами и контентом. Вынесите содержимое хедера, футера и сайдбара в отдельные подключаемые файлы.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		&lt!DOCTYPE html>
	&lthtml>
		&lthead>
			&lttitle>title&lt/title>
		&lt/head>
		&ltbody>
		&lt?php include 'layout/header.php';?>
		&lt?php include 'layout/aside.php';?>
			
			&ltmain>
				content
				&lta href="../index.php">вернуться к учёбе&lt/a>
			&lt/main>
			
		&lt?php include 'layout/footer.php';?>
		&lt/body>
	&lt/html>
	</pre>
</code>
<p class="fw-bold"><a href="layout_task/index.php">Результат:</a></p>


<h3 class="fw-bold mt-5">Запись вставки в переменную в PHP</h3>
<p>Пусть у нас есть некоторый файл:</p>
<code>
	<pre>
		file: test.php

	&ltdiv>
		&lt?= 'test' ?>
	&lt/div>
	</pre>
</code>

<p>Давайте в основном файле запишем текст нашего файла в переменную:</p>

<code>
	<pre>
		file: index.php

	&lt?php
	$res = file_get_contents('test.php'); 
	?>
	</pre>
</code>

<p>У нас, однако, будет проблема - при записи в переменную, <b>PHP</b> код <i>(который содержится внутри вставляемого файла)</i> выполнен не будет!
	<br />
	Для того, чтобы PHP код вставляемого файла был выполнен, нужно использовать оператор include. Проблема, однако, в том, что этот оператор сразу выводит данные на экран, поэтому результат подключения не может быть записан в переменную.
	<br />
	Но это все-таки можно сделать, если использовать хитрый прием:
</p>

<code>
	<pre>
		file: index.php

	&lt?php
	ob_start();
	include 'test.php'; 
	$res = ob_get_clean();
	?></pre>
</code>
<p>Оформим код приема в функцию:</p>
<code>
	<pre>
		file: index.php

	&lt?php
	function getFile($name) {
		ob_start();
			include $name; 
		return ob_get_clean(); 
	}
	?></pre>
</code>
<p>Воспользуемся нашей функцией для получения файла в переменную:</p>
<code>
	<pre>
		file: index.php

	&lt?php
	$res = getFile('test.php');
	echo 'index' . $res;
	?></pre>
</code>


<p class="fw-bold mt-5">Задача</p>
<p>Сделайте файл, который будет генерировать из массива дней выпадающий список дней недели. Запишите результат в переменную в вашем основном файле. Выведите эту переменную в нескольких местах файла.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		//file: task1.php

	&lt?php
	$arrWeekDay = ["пн", "вт", "ср", "чт", "пт", "сб", "вс"];
	?>
&ltselect>
	&lt?php foreach ($arrWeekDay as $key => $day) : ?>
		&ltoption value="&lt?= $key ?>">&lt?= $day ?>&lt/option>
	&lt?php endforeach ?>
&lt/select>


		//file: index.php

	&lt?php
	function getPhpCode($name)
	{
		ob_start();
		include $name;
		return ob_get_clean();
	}
	$sel = getPhpCode('layout_task/layout/task1.php');
	?>
&ltp>Тест: &lt?= $sel ?>&lt/p>
&ltp>Тест: &lt?= $sel ?>&lt/p>
&ltp>Тест: &lt?= $sel ?>&lt/p>
	</pre>
</code>

<p class="fw-bold">Результат:</p>
<?php
function getPhpCode($name)
{
	ob_start();
	include $name;
	return ob_get_clean();
}
$sel = getPhpCode('layout_task/layout/task1.php');
?>
<p>Тест: <?= $sel ?></p>
<p>Тест: <?= $sel ?></p>
<p>Тест: <?= $sel ?></p>



<h3 class="fw-bold mt-5">Подключение файлов в PHP</h3>
<p>Пусть у нас есть файл, в котором хранится набор функций:</p>

<code>
	<pre>
		file: function.php

	&lt?php
	function square($num) {
		return $num ** 2;
	}
	
	function cube($num) {
		return $num ** 3;
	}
	?></pre>
</code>
<p>Давайте сделаем так, чтобы функции из этого файла были доступны в нашем основном файле. Для этого подключим файл с функциями с помощью оператора <b>require:</b></p>
<code>
	<pre>
		file: index.php

	&lt?php
	require 'functions.php';
	?></pre>
</code>

<p>После этого в нашем основном файле мы можем воспользоваться функциями из подключенного файла:</p>
<code>
	<pre>
		file: index.php

	&lt?php
	require 'functions.php';
	
	echo square(3) + cube(4);
	?></pre>
</code>

<p class="fw-bold mt-5">Задача</p>
<p>Сделайте файл с полезным набором функций. Подключите его к вашему основному файлу.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		//file: func/func.php

	&lt?php
	function getScuare($num)
	{
		return pow($num, 2);
	}
	function getQube($num)
	{
		return pow($num, 3);
	}
	?>

		//file: index.php

	&lt?php
	require 'func/func.php';
	?>
	&ltp>&lt?= getScuare(4) ?>&lt/p>
	&ltp>&lt?= getQube(4) ?>&lt/p></pre>
</code>

<p class="fw-bold">Результат:</p>
<?php
require 'func/func.php';
?>
<p><?= getScuare(4) ?></p>
<p><?= getQube(4) ?></p>

<h3 class="fw-bold mt-5">Однократное подключение файлов в PHP</h3>
<p>Пусть у нас есть файл pow.php, в котором хранится набор функций:</p>
<code>
	<pre>
		//file: func/pow.php

	&lt?php
	function square($num) {
		return $num ** 2;
	}
	
	function cube() {
		return $num ** 3;
	}
	?></pre>
</code>
<p>Пусть мы используем функции файла pow.php в файле sum.php:</p>
<code>
	<pre>
		//file: func/sum.php

	&lt?php
	require 'pow.php';
	
	function squareSum($arr) {
		$res = 0;
		
		foreach ($arr as $elem) {
			$res += square($elem);
		}
		
		return $res;
	}
	
	function cubeSum($arr) {
		$res = 0;
		
		foreach ($arr as $elem) {
			$res += cube($elem);
		}
		
		return $res;
	}
	?></pre>
</code>
<p>Пусть в основном файле мы подключаем оба файла с функциями:</p>
<code>
	<pre>
		//file: index.php

	&lt?php
	require 'func/pow.php';
	require 'func/sum.php';
	
	echo square(3) + squareSum([1, 2, 3]);
	?></pre>
</code>
<p>Нас, однако, поджидает проблема. К файлу index.php файл pow.php будет подключен два раза: сам по себе и через файл pow.php.
	<br />Это приведет к проблеме, так как у нас будут два набора функций с одинаковыми именами.
	<br />Для решения проблемы следует подключать все файлы через оператор <b>require_once</b> - он будет подключать файл только один раз, игнорируя повторный подключения:
</p>
<code>
	<pre>
		//file: index.php

	&lt?php
	require_once 'func/pow.php';
	require_once 'func/sum.php';
	
	echo square(3) + squareSum([1, 2, 3]);
	?></pre>
</code>


<h3 class="fw-bold mt-5">Запись подключения в переменную PHP</h3>
<p>Можно сделать так, чтобы результат подключаемого можно было записать в переменную. Для этого подключаемый файл должен возвращать данные через <b>return</b>.
	<br />Посмотрим на примере. Пусть наш файл возвращает массив дней недели:
</p>
<code>
	<pre>
		//file: data/week.php

	&lt?php
		return ['пн', 'вт', 'ср', 'чт', 'пт', 'сб', 'вс'];
	?></pre>
</code>

<p>Давайте подключим этот файл и результат подключения запишем в переменную:</p>
<code>
	<pre>
		//file: index.php

	&lt?php
		$week = require 'data/week.php';
		var_dump($week);
	?></pre>
</code>
<p class="fw-bold mt-5">Задача</p>
<p>Сделайте файл, который будет возвращать названия дней недели. Подключите его в переменную в вашем основном файле.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		//file: data/week.php

	&lt?php
	return ['пн', 'вт', 'ср', 'чт', 'пт', 'сб', 'вс'];
	?>

		//file: index.php

	&ltp>Дни недели:&lt/p>
	&ltul>
		&lt?php
		$root = $_SERVER['DOCUMENT_ROOT'];
		$week = require "$root/data/week.php";
		foreach ($week as $day): ?>
			&ltli>&lt?= $day ?>&lt/li>
		&lt?php endforeach ?>
	&lt/ul></pre>
</code>
<p class="fw-bold">Результат:</p>
<p>Дни недели:</p>
<ul>
	<?php
	$root = $_SERVER['DOCUMENT_ROOT'];
	$week = require "$root/data/week.php";
	foreach ($week as $day): ?>
		<li><?= $day ?></li>
	<?php endforeach ?>
</ul>


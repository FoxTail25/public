<?php


addBr('Функция ' . returnB('strtolower') . ' преобразовывает строку в нижний регистр. Данная функция неправильно работает с кириллицей. Используйте функцию ' . returnB('mb_strtolower') . ' (она работает аналогичным образом, но корректно обрабатывает кириллицу).');
addBr('');
addBr('Синтаксис: strtolower(строка);');
addBr('');
addBr('Дана строка "PHP". Сделайте из нее строку "php". = strtolower("PHP") = ' . strtolower('PHP'));


addBr('Функция ' . returnB('strtoupper') . ' преобразовывает строку в верхний регистр. Данная функция неправильно работает с кириллицей. Используйте функцию ' . returnB('mb_strtolower') . ' (она работает аналогичным образом, но корректно обрабатывает кириллицу).');
addBr('');
addBr('Синтаксис: strtoupper(строка);');
addBr('');
addBr('Дана строка "php". Сделайте из нее строку "PHP". = strtoupper("php") = ' . strtoupper('php'));


addBr('Функция ' . returnB('ucfirst') . ' преобразует первый символ строки в верхний регистр.  Не работает с кириллицей.');
addBr('');
addBr('Синтаксис: ucfirst(строка);');
addBr('');
addBr('Дана строка "php". Сделайте из нее строку "Php". = ucfirst("php") = ' . ucfirst('php'));


addBr('Функция ' . returnB('lcfirst ') . ' преобразует первый символ строки в нижний регистр.  Не работает с кириллицей.');
addBr('');
addBr('Синтаксис: lcfirst(строка);');
addBr('');
addBr('Дана строка "PHP". Сделайте из нее строку "pHP". = ucfirst("pHP") = ' . lcfirst('PHP'));


addBr('Функция ' . returnB('ucwords') . ' преобразует первый символ каждого слова в строке в верхний регистр. Не работает с кириллицей.');
addBr('');
addBr('Синтаксис: ucwords(строка);');
addBr('');
addBr('Дана строка "london is the capital of great britain". Сделайте из нее строку "London Is The Capital Of Great Britain". = ucwords("london is the capital of great britain") = ucwords("london is the capital of great britain") = ' . ucwords('london is the capital of great britain'));
addBr('');


addBr('Функция ' . returnB('strlen') . ' strlen возвращает длину строки (количество символов в строке, пробел тоже символ). Данная функция неправильно работает с кириллицей. Используйте функцию ' . returnB("mb_strlen") . ' (она работает аналогичным образом, но корректно обрабатывает кириллицу).');
addBr('');
addBr('Синтаксис: strlen(строка);');
addBr('');
addBr("Дана строка 'html css php'. Найдите количество символов в этой строке. = strlen('html css php') = " . strlen('html css php'));
addBr('');


addBr('Функция ' . returnB('substr') . ' вырезает и возвращает подстроку из строки. Сама строка при этом не изменяется. Первым параметром функция принимает строку, вторым - позицию символа, откуда следует начинать вырезание, а третьим - количество символов. Учтите, что нумерация символов строки начинается с нуля. Второй параметр может быть отрицательным - в этом случае отсчет начнется с конца строки, при этом последний символ будет иметь номер -1. Третий параметр можно не указывать - в этом случае отрезание произойдет до конца строки. Данная функция неправильно работает с кириллицей. Используйте функцию ' . returnB('mb_substr') . ' (она работает аналогичным образом, но корректно обрабатывает кириллицу).');
addBr('');
addBr('Синтаксис: substr(строка, откуда, [сколько]);');
addBr('');
addBr("Дана строка 'html css php'. Вырежьте из нее и выведите на экран слово 'html', слово 'css' и слово 'php'.");
addBr('');
$str = 'html css php';
addBr('$str = "html css php"');
addBr('substr($str, 0, 4) = ' . substr($str, 0, 4));
addBr('substr($str, 5, 3) = ' . substr($str, 5, 3));
addBr('substr($str, -3) = ' . substr($str, -3));
addBr('');

addBr("Дана строка. Вырежьте и выведите на экран последние 3 символа этой строки.");
$strNum = "987654321";
addBr('$strNum = "987654321"');
addBr('substr($strNum, -3) = ' . substr($strNum, -3));
addBr('');

addBr("Дана строка. Проверьте, что она начинается на 'http://'.");
$strLink = "http://code.mu";
addBr('$strLink = "987654321"');
addBr('$strStart = substr($strLink, 0, 6) = ' . substr($strLink, 0, 7));
$strStart = substr($strLink, 0, 7);
$res;
if ($strStart == "http://") {
	$res = 'true';
} else {
	$res = 'false';
};
addBr('$strStart == "http://" - ' . $res);

// Дана строка. Проверьте, что она начинается на 'http://' или на 'https://'.
$strLink2 = "https://code.mu";
$strStart1 = substr($strLink2, 0, 7);
$strStart2 = substr($strLink2, 0, 8);
$res2;
if ($strStart1 == "http://" or $strStart2 == "https://") {
	$res2 = 'true';
} else {
	$res2 = 'false';
};
addBr('$strStart == "http://" - ' . $res2);
hr();
addBr("") .
	addBr("Дана строка. Проверьте, что она заканчивается на '.png'") .
	$strImg = 'smile.png';
addBr("var_dump(substr($strImg, -4) == '.png' ? true : false)" . var_dump(substr($strImg, -4) == '.png' ? true : false));
addBr("") .
	addBr("Дана строка. Проверьте, что она заканчивается на '.png' или на '.jpg'.") .
	$strImg2 = 'smile.jpg';
addBr("var_dump(substr($strImg2, -4) == '.png' or substr($strImg2, -4) == '.jpg' ? true : false)" . var_dump(substr($strImg2, -4) == '.png' or substr($strImg2, -4) == '.jpg' ? true : false));
hr();
addBr('Дана строка. Если в этой строке более 5-ти символов - вырежьте из нее первые 5 символов, добавьте троеточие в конец и выведите на экран. Если же в этой строке 5 и менее символов - просто выведите эту строку на экран.');
// Дана строка. Если в этой строке более 5-ти символов - вырежьте из нее первые 5 символов, добавьте троеточие в конец и выведите на экран. Если же в этой строке 5 и менее символов - просто выведите эту строку на экран.
function checkAndTrimTheString($str)
{
	$strLength = strlen($str);
	if ($strLength > 5) {
		return substr($str, 0, 5) . '...';
	} else {
		return $str;
	}
};

addBr(' ');
addBr(checkAndTrimTheString('abrakadabra'));
addBr(checkAndTrimTheString('123456'));
addBr(checkAndTrimTheString('12345'));

hr();

//Функция str_replace ищет в строке заданный текст и меняет его на другой. Первым параметром функция принимает то, что меняем, а вторым - на что меняем. Это могут быть две строки или два массива. Во втором случае соответствующие элементы одного массива заменятся на соответствующие элементы второго массива (см. примеры). Есть также функция str_ireplace, которая делает тоже самое, но без учета регистра.

addBr('Функция ' . returnB('str_replace') . ' ищет в строке заданный текст и меняет его на другой. Первым параметром функция принимает то, что меняем, а вторым - на что меняем. Это могут быть две строки или два массива. Во втором случае соответствующие элементы одного массива заменятся на соответствующие элементы второго массива (см. примеры). Есть также функция ' . returnB(' str_ireplace') . ', которая делает тоже самое, но без учета регистра.');

// Синтаксис: str_replace(что меняем, на что меняем, где меняем);
// Пример1: echo str_replace('a', '!', 'abcabc');
// Пример2: echo str_replace(['a', 'b', 'c'], [1, 2, 3], 'abcabc');;

addBr('');
addBr("Дана строка '31.12.2013'. Замените все точки на дефисы.");
$strRepl = '31.12.2013';
$strRepl2 = str_replace('.', '-', $strRepl);
addBr("str_replace('.', '-', '31.12.2013') = " . $strRepl2);

addBr('');
addBr("Дана строка. Замените в ней все буквы 'a' на цифру 1, буквы 'b' - на 2, а буквы 'c' - на 3.");
$strRepl = 'ambulacina';
$strRepl2 = str_replace(['a', 'b', 'c'], [1, 2, 3], $strRepl);
addBr("str_replace(['a','b','c'], [1,2,3], 'ambulacina') = " . $strRepl2);

addBr('');
addBr("Дана строка с буквами и цифрами, например, '1a2b3c4b5d6e7f8g9h0'. Удалите из нее все цифры. То есть в нашем случае должна получится строка 'abcbdefgh'.");
$strRepl = '1a2b3c4b5d6e7f8g9h0';
$strRepl2 = str_replace(['1', '2', '3', 4, 5, 6, 7, 8, 9, 0], [''], $strRepl);
addBr("str_replace(['1','2','3',4,5,6,7,8,9,0], [''], '1a2b3c4b5d6e7f8g9h0') = " . $strRepl2);
hr();

addBr('Функция ' . returnB('strtr') . ' осуществляет поиск и замену символов в строке. Имеет два варианта работы.
В первом варианте функция принимает массив замен: ключами служит то, что мы меняем, а значениями - на что будем менять:
strtr(где меняем, массив замен);');

// Пример 1
// В данном примере функция заменит символы 1 и 2 на 'a' и 'b' соответственно:
// echo strtr('111222', ['1'=>'a', '2'=>'b']);
// Результат выполнения кода: 'aaabbb'

// Пример 2 
// В данном примере функция также заменит символы 1 и 2 на 'a' и 'b' соответственно:
// echo strtr('111222', '12', 'ab');
// Результат выполнения кода: 'aaabbb'

//Дана строка $str. Замените в ней все 'a' на цифру 1, буквы 'b' - на 2, а буквы 'c' - на 3. Решите задачу двумя способами работы с функцией strtr (массив замен и две строки замен).
addBr('');
addBr("Дана строка str = 'abcdef'. Замените в ней все 'a' на цифру 1, буквы 'b' - на 2, а буквы 'c' - на 3. Решите задачу двумя способами работы с функцией strtr (массив замен и две строки замен).");
$strStrTr = 'abcdef';
addBr('Первый способ:');
addBr("strtr('abcdef', ['a' => '1', 'b' => '2']) = " . strtr($strStrTr, ['a' => '1', 'b' => '2']));
addBr('Второй способ:');
addBr("strtr('abcdef', 'cd' , '12') = " . strtr($strStrTr, 'cd', '12'));
hr();

addBr('Функция ' . returnB('substr_replace') . ' заменяет указанную часть строки на другую. Эта функция вырезает указанную часть строки (параметрами указывается откуда начинать вырезание и сколько символов взять) и заменяет вырезанную часть на указанную строку. Если последний параметр не указан - замена произведется до конца строки.');
addBr('Синтаксис: substr_replace(где меняем, на что меняем, с какого символа, [сколько символов]);');

// Пример1 
// Давайте вырежем из строки символы, начиная с первого (нумерация символов начинается с нуля), 3 штуки и вместо них вставим '!!!':
// echo substr_replace('abcde', '!!!', 1, 3);
// Результат выполнения кода: 'a!!!e'

// Пример2
//  Давайте вырежем из строки символы, начиная с первого до конца строки (так как последний параметр не указан) и вместо них вставим '!!!':
// echo substr_replace('abcde', '!!!', 1);
// Результат выполнения кода: 'a!!!'
addBr('');
addBr("Дана строка str. Вырежьте из нее подстроку с 3-го символа (отсчет с нуля), 5 штук и вместо нее вставьте '!!!'.");
$strSubstr_replace = 'html css js';
addBr("substr_replace(html css js, '!!!', 3,5) = " . substr_replace($strSubstr_replace, '!!!', 3, 5));
addBr('');


addBr('Функция ' . returnB('strpos') . ' возвращает позицию первого вхождения подстроки в другую строку. Первым параметром функция принимает строку, в которой осуществляется поиск, вторым параметром - подстроку, которую следует искать. Результатом выполнения функции будет позиция первого символа найденной подстроки, а если такая подстрока не будет найдена - то false. Учтите, что нумерация идет с нуля и, если подстрока находится в начале строки, то результатом функции будет 0. Это может привести к ошибкам, если сделать, к примеру, так: if(strpos()) - в этом случае и 0, и false приведут к одинаковому результату, чего бы нам не хотелось бы. По умолчанию функция ищет с начала строки до первого совпадения. Начало поиска можно регулировать третьим необязательным параметром - если он задан, то поиск начнется не с начала строки, а с указанного места. Есть также функция ' . returnB('stripos') . ', которая делает тоже самое, но без учета регистра.');

addBr('Синтаксис: strpos(где ищем, что ищем, [откуда искать]);');

// Дана строка 'abc abc abc'. Определите позицию первой буквы 'b'.

$strStrPos = 'abc abc abc';

addBr("strpos('abc abc abc', 'b') = " . strpos($strStrPos, 'b'));
addBr("strpos('abc abc abc', 'b', 3) = " . strpos($strStrPos, 'b', 3));
addBr("strpos('abc abc abc', 'b', 5) = " . strpos($strStrPos, 'b', 5));
addBr("strpos('abc abc abc', 'b', 6) = " . strpos($strStrPos, 'b', 6));
addBr(" ");

addBr('Функция ' . returnB('strpos') . ' возвращает позицию последнего вхождения подстроки.Результатом выполнения функции будет позиция первого символа найденной подстроки, а если такая подстрока не будет найдена - то false. Учтите, что нумерация идет с нуля и, если подстрока находится в начале строки, то результатом функции будет 0. Это может привести к ошибкам, если сделать, к примеру, так: if(strrpos()) - в этом случае и 0, и false приведут к одинаковому результату, чего бы нам не хотелось бы. По умолчанию функция ищет с начала строки до первого совпадения. Начало поиска можно регулировать третьим необязательным параметром - если он задан, то поиск начнется не с начала строки, а с указанного места. Есть также функция  ' . returnB('strripos') . ', которая делает тоже самое, но без учета регистра.');

addBr('Синтаксис: strrpos(где ищем, что ищем, [откуда искать]);');

// Дана строка 'abc abc abc'. Определите позицию последней буквы 'b'.

$strStrPos = 'aaa aaa aaa aaa aaa';

addBr("strrpos('abc abc abc', 'b') = " . strrpos($strStrPos, 'b'));
addBr(' ');
$strStrPosAAA = 'aaa aaa aaa aaa aaa';
addBr("Дана строка 'aaa aaa aaa aaa aaa'. Определите позицию второго пробела.");
$numA = strpos($strStrPosAAA, ' ') + 1;
addBr("strpos('aaa aaa aaa aaa aaa', ' ' , strpos('aaa aaa aaa aaa aaa', ' ') + 1) = " . strpos($strStrPosAAA, ' ', strpos($strStrPosAAA, ' ') + 1));
addBr(' ');

// Проверьте, что в строке есть две точки подряд.
$str2point = 'f.h.cde';
$onePoint = strpos($str2point, '.');
$twoPoint = strpos($str2point, '.', strpos($str2point, '.') + 1);
if ($twoPoint and ($onePoint + 1) === $twoPoint) {
	addBr('есть ..');
} else {
	addBr('нет ..');
};

strpos($str2point, '.', strpos($str2point, '.') + 1) === strpos($str2point, '.') + 1 ? addBr('есть ..') : addBr('нет ..');

addBr('');
// Проверьте, что строка начинается на 'http://'.
$strPos26 = 'http://code.mu';
$prov = 'http://';
addBr(var_dump(strpos($strPos26, $prov) === 0));

hr();
addBr('');


addBr('Функция ' . returnB('explode') . ' разбивает строку в массив по определенному разделителю.');
addBr("explode(разделитель, строка);");
addBr(" ");
addBr("Дана строка 'html css php'. Запишите каждое слово этой строки в отдельный элемент массива");
// Дана строка 'html css php'. Запишите каждое слово этой строки в отдельный элемент массива.
echo ("explode(' ', 'html css php') = ");
$expStr = explode(' ', 'html css php');
addBr(var_dump($expStr));
addBr('');


addBr('Функция ' . returnB('implode') . ' сливает массив в строку с указанным разделителем.');
addBr("implode(разделитель, массив);");
//Дан массив с элементами 'html', 'css', 'php'. С помощью implode создайте строку из этих элементов, разделенных запятыми.
addBr(implode(' ', $expStr));
addBr('');
addBr("В переменной date лежит дата в формате год-месяц-день. Преобразуйте эту дату в формат день.месяц.год.");
$dataEI = '25-03-2025';
addBr("implode('.', explode('-', '25-03-2025')) = " . implode('.', explode('-', $dataEI)));
// addBr("");
hr();

addBr('Функция ' . returnB('str_split') . ' разбивает строку в массив. Первым параметром она принимает строку, а вторым - количество символов в элементе массива. К примеру, если второй параметр задать как 3 - функция разобьет строку в массив так, чтобы в каждом элементе массива было по 3 символа.');
addBr("Синтаксис: str_split(строка, количество символов в элементе массива)");
addBr(" ");

// Давайте разобьем строку по 2 символа в элементе массива (обратите внимание на то, что последнему элементу не хватило символов и там их не 2, а один):
// 	$str = 'abcde';
// 	$arr = str_split($str, 2);
// 	var_dump($arr);
// Результат выполнения кода: ['ab', 'cd', 'e'];

// Дана строка '1234567890'. Разбейте ее на массив с элементами '12', '34', '56', '78', '90'.
$strSplit1 = '1234567890';
addBr("Дана строка '1234567890'. Разбейте ее на массив с элементами '12', '34', '56', '78', '90'");
addBr("var_dump(str_split('1234567890', 2)) = " . var_dump(str_split($strSplit1, 2)));
addBr("");
addBr("Дана строка '1234567890'. Разбейте ее на массив с элементами '1', '2', '3', '4', '5', '6', '7', '8', '9', '0'.");
addBr("var_dump(str_split('1234567890', 1) = " . var_dump(str_split('1234567890', 1)));
addBr(" ");
// Дана строка '1234567890'. Сделайте из нее строку '12-34-56-78-90' не используя цикл.
addBr("Дана строка '1234567890'. Сделайте из нее строку '12-34-56-78-90' не используя цикл");
addBr("implode('-', str_split('1234567890', 2)) = " . implode('-', str_split('1234567890', 2)));
addBr(" ");
addBr('Функция ' . returnB('trim') . ' удаляет пробелы с начала и конца строки. Может также удалять другие символы, если их указать вторым параметром.');
addBr("Синтаксис: trim(строка, [символы]);");

// Пример 1
// Давайте удалим пробелы по краям строки:
// 	echo(trim(' abcde '));
// Результат выполнения кода:
// 'abcde'

// Пример 2
// Давайте удалим слеши по краям строки:
// 	echo trim('/abcde/', '/');
// Результат выполнения кода:
// 'abcde'

// Пример 3 
// Давайте удалим слеши и точки по краям строки:
// 	echo trim('/abcde.', '/.');
// Результат выполнения кода:
// 'abcde'

// Пример 4
// Функция удаляет любое количество указанных символов, если они стоят с краю:
// 	echo trim('../../abcde...', '/.');
// Результат выполнения кода:
// 'abcde'

// Пример 5
// Можно указать диапазон символов с помощью двух точек '..'. К примеру, укажем, что мы хотим удалить символы от 'a' до 'd':
// 	echo trim('abcde', 'a..d');
// Результат выполнения кода:
// 'e'

addBr("Дана строка ' abcde '. Очистите ее от концевых пробелов.");
addBr("trim(' abcde ') = " . trim(' abcde '));
addBr(" ");
addBr("Дана строка '/php/'. Сделайте из нее строку 'php', удалив концевые слеши.");
addBr("trim('/php/', '/') = " . trim('/php/', '/'));

// Дана строка 'слова слова слова.'. В конце этой строки может быть точка, а может и не быть. Сделайте так, чтобы в конце этой строки гарантировано стояла точка. То есть: если этой точки нет - ее надо добавить, а если есть - ничего не делать. Задачу решите через rtrim без всяких ифов.

addBr("Дана строка 'слова слова слова.'. В конце этой строки может быть точка, а может и не быть. Сделайте так, чтобы в конце этой строки гарантировано стояла точка. То есть: если этой точки нет - ее надо добавить, а если есть - ничего не делать. Задачу решите через rtrim без всяких ифов.");
addBr("rtrim('слова слова слова.', '.') . '.' = " . rtrim('слова слова слова.', '.') . '.');
addBr("rtrim('слова слова слова', '.') . '.' = " . rtrim('слова слова слова.', '.') . '.');
hr();
addBr('Функция ' . returnB('strrev') . ' переворачивает строку так, чтобы символы шли в обратном порядке.');
addBr('Синтаксис: strrev(строка);');
addBr('');
addBr("Дана строка '12345'. Сделайте из нее строку '54321'.");
addBr("strrev('12345') = " . strrev('12345'));

addBr("Проверьте, является ли слово палиндромом (одинаково читается во всех направлениях, примеры таких слов: madam, otto, kayak, nun, level)");
echo '<code>
function palliandr($str){
	if(return $str === strrev($str)){
		return "is paliandrom"
		};
	};
</code>';
hr();
addBr('Функция ' . returnB('str_shuffle') . ' переставляет символы в строке в случайном порядке.');
addBr('str_shuffle(cтрока);');
addBr('');
addBr('Дана строка "abcde". Перемешайте символы этой строки в случайном порядке.');
addBr("str_shuffle('abcde') = " . str_shuffle('abcde'));
addBr("str_shuffle('abcde') = " . str_shuffle('abcde'));
addBr("str_shuffle('abcde') = " . str_shuffle('abcde'));
addBr("str_shuffle('abcde') = " . str_shuffle('abcde'));
addBr("str_shuffle('abcde') = " . str_shuffle('abcde'));

addBr(' ');
addBr('Создайте строку из 6-ти случайных маленьких латинских букв так, чтобы буквы не повторялись. Нужно сделать так, чтобы в нашей строке могла быть любая латинская буква, а не ограниченный набор.');
$alfabet = "abcdefghijklmnopqrstuvwxyz";
addBr('<code> $alfabet = "abcdefghijklmnopqrstuvwxyz"</code>');
addBr('<code> substr(str_shuffle($alfabet),0,6)</code> = ' . substr(str_shuffle($alfabet), 0,6));
addBr('<code> substr(str_shuffle($alfabet),0,6)</code> = ' . substr(str_shuffle($alfabet), 0,6));
addBr('<code> substr(str_shuffle($alfabet),0,6)</code> = ' . substr(str_shuffle($alfabet), 0,6));
addBr('<code> substr(str_shuffle($alfabet),0,6)</code> = ' . substr(str_shuffle($alfabet), 0,6));
addBr('<code> substr(str_shuffle($alfabet),0,6)</code> = ' . substr(str_shuffle($alfabet), 0,6));

// Функция number_format
// Функция number_format позволяет форматировать число. В основном используется для того, чтобы отделять тройки чисел пробелами, к примеру, из 1234567 она может сделать 1 234 567.

// Кроме того, функция позволяет регулировать количество знаков после дробной части. Это количество задается вторым необязательным параметром.

// Например, можно из дроби 12345.6789 сделать дробь 12 345.68 - функция расставит пробелы между тройками и округлит дробь до двух знаков в дробной части.

// Третий необязательный параметр задает разделитель дробной части (по умолчанию точка, но можно сменить). Обязательно вместе с третьим параметром должен быть и четвертый - он устанавливает разделитель троек чисел (по умолчанию запятая, но можно сменить, к примеру, на пробел). То есть по умолчанию функция разделяет тройки запятыми: из 1234567 делает 1,234,567.

// Синтаксис
// number_format(число);
// number_format(число, количество знаков);
// number_format(число, количество знаков, разделитель дробной части, разделитель тысяч);

// Дана строка '12345678'. Сделайте из нее строку '12 345 678'.

addBr(" ");
addBr("number_format('12345678') = " .number_format('12345678'));
addBr("number_format('12345678',2) = " .number_format('12345678' ,2));
addBr("number_format('12345678',2,'/') = " .number_format('12345678' ,2, '/'));
addBr("number_format('12345678',2,'.','/') = " .number_format('12345678' ,2,'.', '/'));
addBr(" ");
addBr("str_repeat('x',1) = " . str_repeat('x',1));
addBr("str_repeat('x',2) = " . str_repeat('x',2));
addBr("str_repeat('x',3) = " . str_repeat('x',3));
addBr("str_repeat('x',4) = " . str_repeat('x',4));
addBr("str_repeat('x',5) = " . str_repeat('x',5));
addBr("str_repeat('x',6) = " . str_repeat('x',6));
addBr("str_repeat('x',7) = " . str_repeat('x',7));
addBr(" ");
addBr("С помощью одного цикла и функции str_repeat выведите на экран следующую пирамидку:");


for($i = 0; $i < 10; $i++){
	echo str_repeat($i, $i) . '<br/>';
}
addBr(addCode('
for($i = 0; $i < 10; $i++){
echo str_repeat($i, $i) 
."') . '<code>' . htmlspecialchars('<br/>') .'"}' . '</code>'
);


// Функция htmlspecialchars
// Функция htmlspecialchars позволяет вывести теги в браузер так, чтобы он не считал их командами, а выводил как строки. Функция преобразует амперсанд & в &amp;, уголок < в &lt;, уголок > в &gt;.

// Синтаксис: htmlspecialchars(строка);

// Пример 
// В данном примере теги выведутся на экран, а не преобразуются в команды браузера:
// echo htmlspecialchars('<b>жирный текст</b>');

// Результат выполнения кода: '<b>жирный текст</b>'



// Функция strip_tags
// Функция strip_tags удаляет HTML теги из строки, не трогая их содержимого. Вторым необязательным параметром можно указать разрешенные теги - они не будут удалены. Их указываем в таком формате: '<b>' или '<b><p>', если хотим оставить несколько тегов.

// Синтаксис: strip_tags(строка, [разрешенные теги]);
// Пример 
// Давайте удалим все HTML теги из строки:

// 	echo strip_tags('lorem <b>ipsum</b> dolor sit amet');
// Результат выполнения кода: 'lorem ipsum dolor sit amet'
addBr("");
addBr("Дана строка 'html," . htmlspecialchars("<b>") . "php" . htmlspecialchars("</b>") . ",js' Удалите теги из этой строки.");
addBr('strip_tags("'.'html,' . htmlspecialchars("<b>") . 'php' . htmlspecialchars("</b>") . ',js'.'") = ' . strip_tags('html, <b>php</b>, js'));

$strStrip_tag = 'Lorem ipsum dolor <b>sit</b> <i>amet</i> <code>consectetur adipisicing elit</code>. Excepturi optio ipsa incidunt quod enim, eaque voluptas consectetur quisquam perspiciatis corrupti.';

addBr('');
addBr(strip_tags($strStrip_tag, '<code><b>'));


// Дана строка 'ab-cd-ef'. С помощью функции strchr выведите на экран строку '-cd-ef'.

addBr(strchr('ab-cd-ef', '-'));
addBr(strrchr('ab-cd-ef', '-'));

// Функция strchr находит первое вхождение подстроки в строку и возвращает часть строки начиная этого места до конца строки. Если второй параметр состоит более чем из одного символа, используется только первый символ.

// Синтаксис: strchr(где ищем, что ищем);
// Пример 
// Давайте достанем адрес страницы без доменного имени из url (вернет подстроку, начиная с первого /, до конца строки)

// 	echo strchr('site.ru/folder1/folder2/page.html', '/');
// Результат выполнения кода: '/folder1/folder2/page.html'



// Функция strrchr находит последнее вхождение символа в строку и возвращает часть строки начиная с этого места до конца строки. Если второй параметр состоит более чем из одного символа, используется только первый символ.

// Синтаксис: strrchr(где ищем, что ищем);
// Пример 
// В данном примере функция достанет адрес страницы из url (вернет подстроку, начиная с последнего /, до конца строки):

// 	echo strrchr('site.ru/folder1/folder2/page.html', '/');
// Результат выполнения кода: '/page.html'




// Функция strstr находит первое вхождение подстроки в строку и возвращает часть строки начиная этого места до конца строки. В отличие от strchr ищет вхождение подстроки из нескольких символов, а не вхождение одного символа.
// Есть также функция stristr, которая делает тоже самое, но без учета регистра.

// Синтаксис: strstr(где ищем, что ищем);
// Пример 
// В данном примере функция достанет адрес страницы без доменного имени из url (вернет подстроку, начиная с первого /, до конца строки)

// 	echo strstr('site.ru/folder1/folder2/page.html', '/');
// Результат выполнения кода: '/folder1/folder2/page.html'

addBr("Дана строка 'ab--cd--ef'. С помощью функции strstr выведите на экран строку '--cd--ef'.");

addBr("strstr('ab--cd--ef', '--c') = " . strstr('ab--cd--ef', '--c'));
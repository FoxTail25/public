<?php

use BcMath\Number;

addBr(rB('Задача'));
addBr('Найдите количество целых часов, прошедших с 7:23:48 текущего дня до настоящего момента времени.');
addBr(aC('echo floor((time() - mktime(7, 23, 48)) /60 /60)') . ' = ' . floor((time() - mktime(7, 23, 48)) / 60 / 60));
hr();

addBr('Функция ' . rB('date') . ' выводит дату в заданном формате. Первым параметром функция принимает формат, а вторым необязательным параметром - момент времени в формате timestamp. Если второй параметр не указан - возьмется текущий момент времени, если указан - то заданный.

Формат задается управляющими командами (английскими буквами), при этом можно вставлять любые разделители между ними (дефисы, двоеточие и так далее).

Функция принимает следующие команды (заглавные буквы отличаются от обычных, обратите внимание):
<ul>
<li> U – количество секунд, прошедших с 1 января 1970 года (то есть timestamp).</li>
<li> z – номер дня от начала года.</li>
<li> Y – год, 4 цифры.</li>
<li> y - год, две цифры.</li>
<li> m – номер месяца (с нулем спереди).</li>
<li> n – номер месяца без нуля впереди.</li>
<li> d – номер дня в месяце, всегда две цифры (то есть первая может быть нулем).</li>
<li> j – номер дня в месяце без предваряющего нуля.</li>
<li> w – день недели (0 - воскресенье, 1 - понедельник и т.д.).</li>
<li> h – часы в 12-часовом формате.</li>
<li> H – часы в 24-часовом формате.</li>
<li> i – минуты.</li>
<li> s – секунды.</li>
<li> L – 1, если високосный год, 0, если не високосный.</li>
<li> W – порядковый номер недели года.</li>
<li> t – количество дней в указанном месяце.</li>
</ul>' .
	rB('Синтаксис: ') . 'date(формат, [момент времени в формате timestamp]); ');
addBr(rB('Пример:'));
addBr("
echo date('Y'); // выведет '2013'<br/>
echo date('y'); // выведет '13'<br/>
echo date('m'); // выведет '06' - номер месяца<br/>
echo date('d'); // выведет '01' - номер дня в месяце<br/>
echo date('j'); // выведет '1'  - номер дня в месяце <br/>
(без нуля спереди) 
echo date('w'); // выведет '1'  - понедельник<br/>
echo date('H'); // выведет '12' - часы (в 24 часовом формате)<br/>
echo date('h'); // выведет '12' - часы (в 12 часовом формате)<br/>
echo date('i'); // выведет '23' - минуты<br/>
echo date('s'); // выведет '59' - секунды<br/>

echo date('d-m-Y'); // выведет '01-06-2013'<br/>
echo date('d.m.Y'); // выведет '01.06.2013'<br/>
echo date('H:i:s d.m.Y'); // выведет '12:23:59 01.06.2013<br/>
" . '<a href="https://www.php.net/manual/ru/datetime.format.php" target="_blank">Полный список форматов даты</a>');
addBr('');
addBr(rB('Задача'));
addBr('Выведите на экран текущий год, месяц, день, час, минуту, секунду.');
addBr(aC("date('Y-m-d-h-i-s')") . ' = ' . date('Y-m-d-h-i-s'));
addBr(rB('Задача'));
addBr('Выведите текущую дату-время в форматах 2025-12-31, 31.12.2025, 31.12.13, 12:59:59.');
addBr(aC("date('Y-m-d' , mktime(0,0,0,12,31,2025)") . ' = ' . date('Y-m-d', mktime(0, 0, 0, 12, 31, 2025)));
addBr(aC("date('d.m.Y' , mktime(0,0,0,12,31,2025)") . ' = ' . date('d.m.Y', mktime(0, 0, 0, 12, 31, 2025)));
addBr(aC("date('d.m.y' , mktime(0,0,0,12,31,2013)") . ' = ' . date('d.m.y', mktime(0, 0, 0, 12, 31, 2013)));
addBr(aC("date('h:i:s' , mktime(12,59,59)") . ' = ' . date('h:i:s', mktime(12, 59, 59)));
addBr(rB('Задача'));
addBr('С помощью функций mktime и date выведите 12 февраля 2025 года в формате 12.02.2025.');
addBr(aC("date('d.m.Y' , mktime(0,0,0,2,12,2025)") . ' = ' . date('d.m.Y', mktime(0, 0, 0, 2, 12, 2025)));
addBr(rB('Задача'));
addBr('Создайте массив дней недели. С помощью этого массива и функции date выведите на экран название текущего дня недели. Узнайте какой день недели был 06.06.2006, в ваш день рождения.');
$arrWeakDay = ["вс", "пн", "вт", "ср", "чт", "пт", "сб"];
addBr(aC('$arrWeakDay = ["вс","пн","вт","ср","чт","пт","сб"];'));
addBr('вариант 1: ' . aC('$arrWeakDay' . "[date('w', mktime(0,0,0,6,6,2006)]") . ' = ' . $arrWeakDay[date('w', mktime(0, 0, 0, 6, 6, 2006))]);
addBr('вариант 2: ' . aC("date('D', mktime(0,0,0,6,6,2006)") . ' = ' . date('D', mktime(0, 0, 0, 6, 6, 2006)));
addBr('вариант 3: ' . aC("date('l', mktime(0,0,0,6,6,2006)") . ' = ' . date('l', mktime(0, 0, 0, 6, 6, 2006)));
addBr(rB('Задача'));
addBr('Создайте массив месяцев. С помощью этого массива и функции date выведите на экран название текущего месяца.');
addBr('вариант 1: ' . aC("date('F')") . ' = ' . date('F'));
addBr('вариант 2: ' . aC("date('M')") . ' = ' . date('M'));
$arrMonthName = [1 => "янв", "фев", "мар", "апр", "май", "июн", "июл", "авг", "сен", "окт", "ноя", "дек"];
addBr('вариант 3: ' . aC('$arrMonthName = [1=>"янв","фев","мар","апр","май","июн","июл","авг","сен","окт","ноя","дек"]'));
addBr(aC('$arrMonthName' . "[date('n')]") . ' = ' . $arrMonthName[date('n')]);
addBr(rB('Задача'));
addBr('Найдите количество дней в текущем месяце. Скрипт должен работать независимо от месяца, в котором он запущен.');
addBr(aC("date('t')") . ' = ' . date('t'));
hr();
addBr('Функция ' . rB('strtotime') . ' преобразует произвольную дату в формат timestamp. Формат timestamp - это количество секунд, прошедшее с 1-го января 1970 года по заданный момент времени.');
addBr(rB('Синтаксис: ') . 'strtotime(дата)');
addBr(rB('Примеры:'));
addBr(addCode("echo strtotime('2025-12-31')") . ' = ' . strtotime('2025-12-31'));
addBr(addCode("echo strtotime('10 September 2000')") . ' = ' . strtotime('10 September 2000'));
addBr(addCode("echo strtotime('Tomorrow')") . ' = ' . strtotime('Tomorrow'));
addBr(rB('Задача'));
addBr('Дана дата в формате 2025-12-31. С помощью функции strtotime и функции date преобразуйте ее в формат 31-12-2025.');
addBr(aC("date('d-m-Y', strtotime('2025-12-31')") . ' = ' . date('d-m-Y', strtotime('2025-12-31')));
hr();
addBr('Функция ' . rB('date_create') . " создает объект 'дата', с которым в дальнейшем можно выполнять некоторые операции. К примеру, прибавить или отнять промежуток от даты с помощью " . rB('date_modify') . " или вывести дату в другом формате с помощью функции " . rB('date_format') . ".");
addBr(rB('Синтаксис: ') . 'date_create([дата]);');
addBr('');
addBr('Функция ' . rB('date_modify ') . " позволяет прибавлять и отнимать от даты определенные промежутки времени. Дата при этом должна быть объектом, созданным функцией date_create. Функция изменяет сам переданный объект, и возвращает также измененный объект " . 'дата' . ".");
addBr(rB('Синтаксис: ') . "date_modify(объект " . 'дата' . ", что прибавить или отнять);");
addBr('');
addBr('Функция ' . rB('date_format') . " выводит данные из объекта " . 'дата' . " в определенном формате. Дата при этом должна быть объектом, созданным функцией " . rB('date_create') . "Управляющие команды для формата такие же, как в функции date.");
addBr(rB('Синтаксис: ') . "date_format(объект 'дата', формат вывода);");
addBr('');
addBr(rB('Примеры:'));
$date = date_create('2025-12-31');
addBr(addCode('$date' . " = date_create('2025-12-31');<br/>echo date_format(" . '$date' . ", 'Y-m-d');") . ' = ' . date_format($date, 'Y-m-d'));
addBr("");
date_modify($date, '1 day');
addBr(addCode('$date' . " = date_create('2025-12-31');<br/>
date_modify(" . '$date' . ", '1 day');<br/>
echo date_format(" . '$date' . ", 'Y-m-d');") . ' = ' . date_format($date, 'Y-m-d'));
date_modify($date, '-1 day');
date_modify($date, '3 days');
addBr("");
addBr(addCode('$date' . " = date_create('2025-12-31');<br/>
date_modify(" . '$date' . ", '3 day');<br/>
echo date_format(" . '$date' . ", 'Y-m-d');") . ' = ' . date_format($date, 'Y-m-d'));
date_modify($date, '-3 days');
date_modify($date, '3 days 1 month');
addBr("");
addBr(addCode('$date' . " = date_create('2025-12-31');<br/>
date_modify(" . '$date' . ", '3 day 1 month');<br/>
echo date_format(" . '$date' . ", 'Y-m-d');") . ' = ' . date_format($date, 'Y-m-d'));
date_modify($date, '-3 days -1 month');
addBr("");
date_modify($date, '3 days -1 month');
addBr(addCode('$date' . " = date_create('2025-12-31');<br/>
date_modify(" . '$date' . ", '3 day -1 month');<br/>
echo date_format(" . '$date' . ", 'Y-m-d');") . ' = ' . date_format($date, 'Y-m-d'));
addBr(rB('Задача'));
addBr('В переменной $date лежит дата в формате 2025-12-31. Прибавьте к этой дате 2 дня, 1 месяц и 3 дня, 1 год. Отнимите от этой даты 3 дня.');
$date = date_create('2025-12-31');
addBr(addCode('$date' . " = date_create('2025-12-31');"));
addBr(addCode("date_modify(" . '$date' . ", '2 day')"));
date_modify($date, '2 day');
addBr(addCode("echo date_format(" . '$date' . ", 'd-m-Y')") . ' = ' . date_format($date, 'd-m-Y'));
addBr(addCode("date_modify(" . '$date' . ", '3 day 1 month')"));
date_modify($date, '3 day 1 month');
addBr(addCode("echo date_format(" . '$date' . ", 'd-m-Y')") . ' = ' . date_format($date, 'd-m-Y'));
addBr(addCode("date_modify(" . '$date' . ", '1 year')"));
date_modify($date, '1 year');
addBr(addCode("echo date_format(" . '$date' . ", 'd-m-Y')") . ' = ' . date_format($date, 'd-m-Y'));
addBr(addCode("date_modify(" . '$date' . ", '-3 day')"));
date_modify($date, '-3 day');
addBr(addCode("echo date_format(" . '$date' . ", 'd-m-Y')") . ' = ' . date_format($date, 'd-m-Y'));
addBr('');
addBr(rB('Задача'));
addBr('Узнайте сколько дней осталось до Нового Года. Скрипт должен работать в любом году.');
echo (addCode("date('L') ? 366 - (date('z')) : 365 - (date('z'))") . ' = ');
addBr(date('L') ? 366 - (date('z')) : 365 - (date('z')));
addBr(rB('Задача'));
addBr('Пусть в переменной содержится некоторый год. Найдите все пятницы 13-е в этом году. Результат выведите в виде массива дат.');
echo (addCode('$arrFriday13 = [];<br/>
for($month = 1; $month <= 12; $month++)<br/>
{<br/>
$day13 = date(' . "'D'" . ', mktime(0,0,0, $month,13));<br/>
if($day13 == ' . "'Fri'" . ') $arrFriday13[] = date(' . "'d-m-Y'" . ', mktime(0, 0, 0, $month, 13));<br/>
}<br/>
var_dump($arrFriday13) = '));

$arrFriday13 = [];
for ($month = 1; $month <= 12; $month++) {
	$day13 = date('D', mktime(0, 0, 0, $month, 13));
	if ($day13 == 'Fri') $arrFriday13[] = date('d-m-Y', mktime(0, 0, 0, $month, 13));
}
addBr('var_dump($arrFriday13)');
addBr(rB('Задача'));
addBr('Узнайте какой день недели был 100 дней назад.');
echo(addCode('$nowDate = date_create('."'now'".');<br/>
date_modify($nowDate, '."'-100 day'".');<br/>
echo date('."'l'".', mktime(0, 0, 0, (int) date_format($nowDate, '."'m'".'), (int) date_format($nowDate, '."'d'".'), (int) date_format($nowDate, '."'Y'".')))').' = ');
$nowDate = date_create('now');
date_modify($nowDate, '-100 day');
addBr(date('l', mktime(0, 0, 0, (int) date_format($nowDate, 'm'), (int) date_format($nowDate, 'd'), (int) date_format($nowDate, 'Y'))));
echo(addCode('echo date('."'d-m-Y'".', mktime(0, 0, 0, (int) date_format($nowDate, '."'m'".'), (int) date_format($nowDate, '."'d'".'), (int) date_format($nowDate, '."'Y'".')))').' = ');
addBr(date('d-m-Y', mktime(0, 0, 0, (int) date_format($nowDate, 'm'), (int) date_format($nowDate, 'd'), (int) date_format($nowDate, 'Y'))));

$arrWeakDay = ["вс", "пн", "вт", "ср", "чт", "пт", "сб"];
addBr(addCode('$arrWeakDay = ["вс", "пн", "вт", "ср", "чт", "пт", "сб"];'));
echo(addCode('echo $arrWeakDay[date('."'w'".', mktime(0, 0, 0, (int) date_format($nowDate, '."'m'".'), (int) date_format($nowDate, '."'d'".'), (int) date_format($nowDate, '."'Y'".')))]'). ' = ');
echo $arrWeakDay[date('w', mktime(0, 0, 0, (int) date_format($nowDate, 'm'), (int) date_format($nowDate, 'd'), (int) date_format($nowDate, 'Y')))];

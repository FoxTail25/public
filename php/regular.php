<?php addBr('Регулярные выражения - это такие команды для сложного поиска и замены. Они позволяют делать очень интересные вещи, но, к сожалению, довольно тяжелы в освоении.');hr();
addBr('Функция ' .rB('preg_replace') . 'Эта функция первым параметром принимает что менять, а вторым - на что менять, а третьим параметром - строку, в которой нужно заменять:');

addBr(rB('Синтаксис: ') .'preg_replace(что менять, на что, строка);');
addBr('');
echo(rI('первым параметром наша функция принимает не просто строку, а регулярное выражение, представляющее собой строку с набором команд, расположенных внутри символов решетки #. Эти решетки называются ограничителями регулярных выражений.
После ограничителей можно писать модификаторы - команды, которые изменяют общие свойства регулярного выражения. Сами регулярные выражения состоят из двух типов символов: из тех, которые обозначают сами себя и из символов-команд, которые называются специальные символы. Буквы и цифры обозначают сами себя. В следующем примере мы с помощью регулярного выражения заменим букву '."'a'".' на '."'!' : "));

$str = preg_replace('#a#', '!', 'bab'); // вернет 'b!b'
addBr(aC("preg_replace('#a#', '!', 'bab')") . " = ". $str);
addBr('');

echo(rI('А вот точка является специальным символом и обозначает любой символ. В следующем примере мы найдем строку по такому шаблону: буква '."'x'".', затем любой символ, затем опять буква '."'x'".' : '));
$str = preg_replace('#x.x#', '!', 'xax eee'); // вернет '! eee'
addBr(aC("preg_replace('#x.x#', '!', 'xax eee')") . " = ". $str);
addBr('');

addBr(rB('Задачи'));
addBr("Дана строка:	".'$str'." = 'ahb acb aeb aeeb adcb axeb'; ". "Напишите регулярку, которая найдет строки 'ahb', 'acb', 'aeb' по шаблону: буква 'a', любой символ, буква 'b'.");
$str = preg_replace('#a.b#', ' "a!b" ', 'ahb acb aeb aeeb adcb axeb'); 
addBr(aC("preg_replace('#a.b#', '\"a!b\"', 'ahb acb aeb aeeb adcb axeb')") . " = ". $str);
addBr('');
addBr("Дана строка:	".'$str'." = 'ahb acb aeb aeeb adcb axeb'; ". "Напишите регулярку, которая найдет строки 'aeeb', 'adcb', 'axeb' по шаблону: буква 'a', два любых символа, буква 'b'.");
$str = preg_replace('#a..b#', ' "a!!b" ', 'ahb acb aeb aeeb adcb axeb'); 
addBr(aC("preg_replace('#a..b#', '\"a!!b\"', 'ahb acb aeb aeeb adcb axeb')") . " = ". $str);
hr();
addBr(rB('Операторы повторения символов в регулярках'));
addBr('Бывают ситуации, когда мы хотим указать, что символ повторяется заданное количество раз. Если мы знаем точное число повторений, то можно просто написать его несколько раз - #aaaa#. Но что делать, если мы хотим сказать такое: повторить один или более раз? Для этого существуют операторы (квантификаторы) повторения: плюс + (один и более раз), звездочка * (ноль или более раз) и вопрос ? (ноль или один раз). Эти операторы действуют на тот символ, который стоит перед ними. Давайте посмотрим на работу этих операторов на примере.');

addBr(aC('	$str = '."'xx xax xaax xaaax xbx'".'; <br/> $res = preg_replace('."'#xa+x#'".', '."'!'".', $str);'));
$str = 'xx xax xaax xaaax xbx';
$res = preg_replace(' #xa+x#', '!', $str);
addBr(aC('echo $res').' = '. $res);
addBr('');
addBr(rB('Практические задачи'));
addBr("Дана строка:	".'$str'. " = 'aa aba abba abbba abca abea'; ". "Напишите регулярку, которая найдет строки по шаблону: буква 'a', буква 'b' один или более раз , буква 'a'.");
$str = 'aa aba abba abbba abca abea';
addBr(aC('$str = '."'aa aba abba abbba abca abea';"));

$result = preg_replace('#ab+a#','!',$str);
addBr(aC("preg_replace('#ab+a#','!',$str)").' = '. $result);

addBr('');
addBr("Дана строка:	".'$str'. " = 'aa aba abba abbba abca abea'; ". "Напишите регулярку, которая найдет строки по шаблону: буква 'a', буква 'b' ноль или более раз, буква 'a'.");
$str = 'aa aba abba abbba abca abea';
addBr(aC('$str = '."'aa aba abba abbba abca abea';"));
$result = preg_replace('#ab*a#','!',$str);
addBr(aC("preg_replace('#ab*a#','!',$str)").' = '. $result);

addBr('');
addBr("Дана строка:	".'$str'. " = 'aa aba abba abbba abca abea'; ". "Напишите регулярку, которая найдет строки по шаблону: буква 'a', буква 'b' один раз или ниодного, буква 'a'.");
$str = 'aa aba abba abbba abca abea';
addBr(aC('$str = '."'aa aba abba abbba abca abea';"));
$result = preg_replace('#ab?a#','!',$str);
addBr(aC("preg_replace('#ab?a#','!',$str)").' = '. $result);

addBr('');
addBr("Дана строка:	".'$str'. " = 'aa aba abba abbba abca abea'; ". "Напишите регулярку, которая найдет строки 'aa', 'aba', 'abba', 'abbba', не захватив 'abca' и 'abea'.");
$str = 'aa aba abba abbba abca abea';
addBr(aC('$str = '."'aa aba abba abbba abca abea';"));
$result = preg_replace('#ab*a#','!',$str);
addBr(aC("preg_replace('#ab*a#','!',$str)").' = '. $result);
hr();


addBr(rB('Группирующие скобки в регулярках PHP'));
addBr("В предыдущих примерах операторы повторения действовали только на один символ, который стоял перед ними. Что делать, если мы хотим подействовать им на несколько символов? Для этого существуют группирующие скобки '(' и ')'. Они работают так: если что-то стоит в группирующих скобках и сразу после ')' стоит оператор повторения - он подействует на все, что стоит внутри скобок. <br/>В следующем примере шаблон поиска выглядит так: буква 'x', далее строка 'ab' один или более раз, потом буква 'x':");
addBr(aC("	".'$str'." = 'xabx xababx xaabbx';<br/>
".'$res'." = preg_replace('#x(ab)+x#', '!', ".'$str'.");"));
addBr(aC('echo $res').' = '. preg_replace('#x(ab)+x#', '!', 'xabx xababx xaabbx'));

addBr(rB('Задача'));
addBr("Дана строка:	" . '$str' . " = 'ab abab abab abababab abea'; " . "Напишите регулярку, которая найдет строки по шаблону: строка 'ab' повторяется 1 или более раз.");
$str = 'ab abab abab abababab abea';
$result = preg_replace('#(ab)+#', '!', $str);
addBr(aC("preg_replace('#(ab)#','!','ab abab abab abababab abea')") . ' = ' . $result);
hr();
addBr(rB('Экранировка спецсимволов в регулярках PHP'));
addBr("Предположим, что мы хотим сделать так, чтобы спецсимвол обозначал сам себя. Для этого его нужно экранировать с помощью обратного слеша. Давайте посмотрим на примерах.");
addBr(aC("preg_replace('#a\+x#', '!', 'a+x ax aax aaax');").' = '. preg_replace('#a\+x#', '!', 'a+x ax aax aaax'));
hr();


addBr(rB('Список специальных символов в регулярках в PHP'));
addBr("Если экранировать обычный символ - ничего страшного не случится - он все равно будет обозначать сам себя. Исключение - цифры, их нельзя экранировать.
Часто возникает сомнение, является ли данный символ специальным. Некоторые доходят до того, что экранируют все подозрительные символы подряд. Однако, это плохая практика (захламляет регулярку обратными слешами).<br/>
 ". rB('Являются спецсимволами: $ ^ . * + ? \ / {} [] () |').'<br/>'.
 rB('Не являются спецсимволами: @ : , '."' ". " ; - _ = < > % # ~ ` & !"));
addBr('');

addBr(rB('Задачи'));
addBr("Дана строка:	" . '$str' . " = 'a.a aba aea'; " . "Напишите регулярку, которая найдет строку 'a.a', не захватив остальные.");
addBr(aC("preg_replace('#a\.a#', '!', 'a.a aba aea');") . ' = ' . preg_replace('#a\.a#', '!', 'a.a aba aea'));

addBr('');
addBr("Дана строка:	" . '$str' . " = '2+3 223 2223'; " . "Напишите регулярку, которая найдет строку '2+3', не захватив остальные.");
addBr(aC("preg_replace('#2\+3#', '!', 'a.a aba aea');") . ' = ' . preg_replace('#2\+3#', '!', '2+3 223 2223'));

addBr('');
addBr("Дана строка:	" . '$str' . " = '23 2+3 2++3 2+++3 345 567'; " . "Напишите регулярку, которая найдет строки '2+3', '2++3', '2+++3', не захватив остальные (+ может быть любое количество).");
addBr(aC("preg_replace('#2\++3#', 'туть ', '23 2+3 2++3 2+++3 345 567');") . ' = ' . preg_replace('#2\++3#', 'туть ', '23 2+3 2++3 2+++3 345 567'));

addBr('');
addBr("Дана строка:	" . '$str' . " = '23 2+3 2++3 2+++3 345 567'; " . "Напишите регулярку, которая найдет строки '23', '2+3', '2++3', '2+++3', не захватив остальные.");
addBr(aC("preg_replace('#2\+*3#', 'туть ', '23 2+3 2++3 2+++3 345 567');") . ' = ' . preg_replace('#2\+*3#', 'туть ', '23 2+3 2++3 2+++3 345 567'));

addBr('');
addBr("Дана строка:	" . '$str' . " = '*+ *q+ *qq+ *qqq+ *qqq qqq+'; " . "Напишите регулярку, которая найдет строки '*q+', '*qq+', '*qqq+', не захватив остальные.");
addBr(aC("preg_replace('#\*q+\+#', 'туть ', '*+ *q+ *qq+ *qqq+ *qqq qqq+');") . ' = ' . preg_replace('#\*q+\+#', 'туть ', '*+ *q+ *qq+ *qqq+ *qqq qqq+'));

addBr('');
addBr("Дана строка:	" . '$str' . " = '[abc] {abc} abc (abc) [abc]'; " . "Напишите регулярку, которая найдет строки в квадратных скобках и заменят их на 'туть '.");
addBr(aC("preg_replace('#\[abc*\]#', 'туть ', '[abc] {abc} abc (abc) [abc]');") . ' = ' . preg_replace('#\[abc\]#', 'туть ', '[abc] {abc} abc (abc) [abc]'));
hr();


addBr(rB('Фигурные скобки в регулярных выражения PHP'));
addBr("Операторы +, *, ? хороши, однако, с их помощью нельзя указать конкретное число повторений. В этом случае вам на помощь придет оператор {}.
<br/>
<br/>
". rB('Работает он следующим образом:')." {5} - пять повторений, {2,5} - повторяется от двух до пяти (оба включительно), {2,} - повторяется два и более раз.");
addBr(aC("	" . '$str' . " = 'xx xax xaax xaaax';<br/>
" . '$res' . " = preg_replace('#xa{1,2}x#', '!', " . '$str' . ");"));
addBr(aC('echo $res') . ' = ' . preg_replace('#xa{1,2}x#', '!', 'xx xax xaax xaaax'));
addBr('');

addBr(rB('Задачи'));
addBr("Дана строка:	" . '$str' . " = 'aa aba abba abbba abbbba abbbbba'; " . "Напишите регулярку, которая найдет строки 'abba', 'abbba', 'abbbba' и только их.");
addBr(aC("preg_replace('#a\.a#', '!', 'a.a aba aea');") . ' = ' . preg_replace('#a\.a#', '!', 'a.a aba aea'));
addBr(aC("preg_replace('#ab{2,4}a#', 'туть ', ''aa aba abba abbba abbbba abbbbba'');") . ' = ' . preg_replace('#ab{2,4}a#', 'туть ', 'aa aba abba abbba abbbba abbbbba'));

addBr('');
addBr("Дана строка:	" . '$str' . " = 'aa aba abba abbba abbbba abbbbba'; " . "Напишите регулярку, которая найдет строки вида 'aba', в которых 'b' встречается менее трех раз (включительно).");
addBr(aC("preg_replace('#a\.a#', '!', 'a.a aba aea');") . ' = ' . preg_replace('#a\.a#', '!', 'a.a aba aea'));
addBr(aC("preg_replace('#ab{0,3}a#', 'туть ', ''aa aba abba abbba abbbba abbbbba'');") . ' = ' . preg_replace('#ab{0,3}a#', 'туть ', 'aa aba abba abbba abbbba abbbbba'));

addBr('');
addBr("Дана строка:	" . '$str' . " = 'aa aba abba abbba abbbba abbbbba'; " . "Напишите регулярку, которая найдет строки вида 'aba', в которых 'b' встречается более четырех раз (включительно).");
addBr(aC("preg_replace('#a\.a#', '!', 'a.a aba aea');") . ' = ' . preg_replace('#a\.a#', '!', 'a.a aba aea'));
addBr(aC("preg_replace('#ab{4,}a#', 'туть ', ''aa aba abba abbba abbbba abbbbba'');") . ' = ' . preg_replace('#ab{4,}a#', rB('туть '), 'aa aba abba abbba abbbba abbbbba'));
hr();


addBr(rB('Ограничение жадности в регулярках в PHP'));
addBr("Регулярные выражения по умолчанию жадные. Это значит, что они захватывают максимальное возможное количество символов.");
addBr("Давайте посмотрим на примере. Пусть у нас есть вот такая строка:");
addBr(aC("	".'$str'." = 'aeeex zzz x kkk';"));
addBr("Пусть мы в этой строке хотим найти подстроку 'aeeex' по следующему шаблону: буква 'a', затем любой символ один или более раз, затем буква 'x'.");
addBr(aC('$res'." = preg_replace('#a.+x#', '!', ".'$str'.");"));
addBr("Мы ожидаем, что в переменную в результате запишется строка '! zzz x kkk'. Однако, это не так - в переменную попадает строка '! kkk'.
<br/>
Все дело в том, что наша регулярка ищет все символы от буквы 'a' до буквы 'x'. Но в нашей строке две буквы 'x'. Из-за жадности получается, что регулярка ищет до самого последнего икса, тем самым захватывая не то, что мы ожидали.
<br/>
Конечно, зачастую такое поведение нам и нужно. Но конкретно в этом случае мы бы хотели отменить жадность и сказать регулярке, чтобы она искала до первого икса.
<br/>
Чтобы ограничить жадность, нужно после оператора повторения поставить знак вопроса:");
addBr(aC('$res'." = preg_replace('#a.+?x#', '!', ".'$str'.");"));
addBr("Тогда мы получим изначально запланированный результат:");
echo(aC('echo $res').' = '. preg_replace('#a.+?x#', '!','aeeex zzz x kkk'));
hr();
addBr(rB("Жадность можно ограничивать всем операторам повторения, вот так: *?, ?? и {}?."));
hr();

addBr(rB('Задача'));
addBr("Дана строка:	" . '$str' . " = 'aba accca azzza wwwwa'; " . "Напишите регулярку, которая найдет все строки по краям которых стоят буквы 'a', и заменит каждую из них на '!'. Между буквами a может быть любой символ (кроме 'a').");
addBr(aC("preg_replace('#a.+?a#', 'туть ', 'aba accca azzza wwwwa');") . ' = ' . preg_replace('#a.+?a#', 'туть ', 'aba accca azzza wwwwa'));
hr();
addBr(rB('Группы символов в регулярных выражениях PHP'));
addBr('Существуют специальные команды, которые позволяют выбрать сразу целые группы символов. '.rB('Команда \d').' означает цифру от 0 до 9. '.rB('Команда \w').' обозначает цифру, латинскую букву или знак подчеркивания. '.rB('Команда \s обозначает пробел или пробельный символ: пробел, перевод строки, табуляцию. Можно инвертировать значение команды, написав большую букву: например, если \d - цифра, то \D - не цифра.');


?>
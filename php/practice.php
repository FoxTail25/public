<?php
addBr(rB('Дан массив с числами. Найдите среднее арифметическое его элементов.'));
$arrNum = [1,2,3,4,5];
$middleArf = array_sum($arrNum) / count($arrNum);
addBr(aC('$arrNum = [1,2,3,4,5];'));
addBr(aC('echo array_sum($arrNum) / count($arrNum)').' = '. $middleArf);
hr();
addBr(rB('Найдите сумму чисел от 1 до 100.'));
$middleArf = array_sum(range(1,100));
addBr(aC('echo array_sum(range(1,100))').' = '. $middleArf);
hr();
addBr(rB('Выведите столбец чисел от 1 до 100.'));
// $arr = range(1,100);
// foreach($arr as $elem){
//     echo $elem . '<br/>';
// }
addBr(aC('$arr = range(1,100);<br/>
foreach($arr as $elem){<br/>
echo $elem . '.htmlspecialchars("'<br/>'").';<br/>
}'));
hr();

addBr(rB('Заполните массив 10-ю иксами.'));
$arr = array_fill(0,9,'x');
echo(aC('var_dump(array_fill(0,9,'."'x'".'))    ').' = ');
addBr(var_dump($arr));
hr();

addBr(rB('Заполните массив 10-ю случайными числами от 1 до 10 так, чтобы они не повторялись.'));
$arr = range(1,10);
shuffle($arr);
echo(aC('$arr = range(1,10);<br/>
shuffle($arr);<br/>
var_dump($arr);').' = ');
var_dump($arr);
hr();

addBr(rB('Найдите факториал заданного числа.'));
$num = 7;
$factorial = array_product(range(1,$num));
addBr(aC('$num = 7;<br/>
$factorialNum = array_product(range(1,$num));<br/>
echo($factorialNum);').' = '. $factorial);
hr();

addBr(rB('Дано число. Найдите сумму цифр этого числа.'));
$num = 77;
$sumNum = array_sum(str_split((String)$num, 1));
addBr(aC('$num = 77;<br/>
echo(array_sum(str_split((String)$num, 1)))').' = '. $sumNum);
hr();

addBr(rB('Дана строка. Сделайте заглавным последний символ этой строки.'));
$str = 'abcde';
$sumNum = strrev(ucfirst( strrev($str)));
addBr(aC('$str = '."'abcde'".';<br/>
echo(strrev(ucfirst( strrev($str)))').' = '. $sumNum);
hr();

addBr(rB('Дан массив с числами. Получите из него массив с квадратными корнями этих чисел.'));
$arr = [9,16,25];
$sqrtArr = array_map('sqrt',$arr);
echo(aC('$arr = [9,16,25];<br/>
var_dump(array_map('."'sqrt'".',$arr))').' = ');
var_dump($sqrtArr);
hr();

addBr(rB('Заполните массив числами от 1 до 26 так, чтобы ключами этих чисел были буквы английского алфавита:'));
$arr = array_combine(range('a','z'),range(1,26));
// $sqrtArr = array_map('sqrt',$arr);
echo(aC('var_dump(array_combine(range('."'a'".','."'z'".'),range(1,26))').' = ');
var_dump($arr);
hr();

addBr(rB('Дана строка '."'1234567890'".'. Найдите сумму цифр из этой строки.'));
$sumstr = array_sum(str_split('1234567890',1));
// $sqrtArr = array_map('sqrt',$arr);
echo(aC('echo(array_sum(str_split('."'1234567890'".',1)').' = '). $sumstr;
hr();

addBr(rB('Дана некоторая строка с числами, например, такая: $str = '."'1234567890'".'; Найдите сумму пар чисел: 12 + 34 + 56 + 78 + 90'));
$sumstr = array_sum(str_split('1234567890',2));
// $sqrtArr = array_map('sqrt',$arr);
echo(aC('echo(array_sum(str_split('."'1234567890'".',2)').' = '). $sumstr;
hr();

addBr(rB('Используя комбинацию функций заполните массив следующим образом: [[1, 2, 3], [4, 5, 6], [7, 8, 9]]'));
$arr = array_chunk(range(1,9),3);
// $sqrtArr = array_map('sqrt',$arr);
echo(aC('var_dump(array_chunk(range(1,9),3)').' = ');
var_dump($arr);
hr();

?>
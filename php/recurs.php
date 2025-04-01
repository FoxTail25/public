<?php
addBr(rB('Recusion'));

// $i = 1;

// function func()
// {
// 	global $i;
// 	echo $i;
// 	$i++;

// 	if ($i <= 10) {
// 		func(); // здесь функция вызывает сама себя
// 	}
// }
// func();


//С помощью рекурсии найдите выведите все элементов этого массива.
$arr = ['a' => 1, 'b' => 2, 'c'=> 3, 'd' => 4, 'e' => 5];

function recArr($arr){
	addBr(array_shift($arr));
	if(count($arr) !== 0){
		recArr($arr);
	}
}
recArr($arr);

$arr = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5]; 
//С помощью рекурсии найдите сумму элементов этого массива.
function summArr($arr){	
	$summ = array_shift($arr);

	if(count($arr) !== 0) {
		$summ += summArr($arr);
	}
	return$summ;
}

echo summArr(($arr));

// Дан многомерный массив произвольного уровня вложенности, например, такой: С помощью рекурсии выведите все примитивные элементы этого массива на экран.

$arr = [1, 2, 3, [4, 5, [6, 7]], [8, [9, 10]]];

function showElInMultiArr($arr){
	foreach($arr as $el){
		if(is_array($el)){
			showElInMultiArr($el);
		}else{
			echo $el. '<br/>';
		}
	}
}
showElInMultiArr($arr);

// Дан многомерный массив произвольного уровня вложенности, например, такой: С помощью рекурсии найдите сумму элементов этого массива.
$arr = [1, 2, 3, [4, 5, [6, 7]], [8, [9, 10]]];
function summElinMiltiArr($arr){
	$summ=0;
	foreach($arr as $el){
		if(is_array($el)){
			$summ += summElinMiltiArr($el);
		}else{
			$summ += $el;
		}
	}
	return $summ;
}

echo summElinMiltiArr($arr);



?>
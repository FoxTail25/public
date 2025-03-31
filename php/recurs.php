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

$arr = ['a' => 1, 'b' => 2, 'c'=> 3, 'd' => 4, 'e' => 5];

function recArr($arr){
	addBr(array_shift($arr));
	if(count($arr) !== 0){
		recArr($arr);
	}
}
recArr($arr);


?>
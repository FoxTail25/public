<?php
	// $arr = [1, 4, 9, 16, 25];

	// foreach ($arr as &$elem) {
	// 	$elem = sqrt($elem);
	// }
	
	// var_dump($arr);
    
    // $arr = [1, 2, 3, 4, 5];

	// foreach ($arr as &$elem) {
	// 	$elem *= 2;
	// }
	
	// var_dump($arr);

    // $aaa = 111;
	
	// function func()
	// {
	// 	$aaa = 222;
	// 	return $aaa;
	// }
	
	// echo '!!!!'.func();

	// $num1 = 1;
	// $num2 = &$num1;
	
	// $num1++;
	// $num2++;
	
	// echo $num1;
	// echo $num2;

	$aaa = 'a';
	
	function func($bbb)
	{
		$bbb = 'b';
	}
	
	func($aaa);
	echo $aaa;
	addBr('	');


	$num = 1;
	
	function func2(&$num)
	{
		$num++;
	}
	
	func2($num);
	echo $num; // должно вывести 2

	addBr('');

	$arr = [1, 2, 3, 4, 5];
	
	function func3(&$arr)
	{
		$arr[0] = '!';
	}
	
	func3($arr);
	var_dump($arr);
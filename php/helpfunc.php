<?php
function addCode($str)
{
	return '<code>' . $str . '</code>';
};
function aC($str)
{
	return '<code>' . $str . '</code>';
};
function addBr($str)
{
	echo $str . '<br/>';
};
function returnB($str)
{
	return '<b>' . $str . '</b>';
};
function rB($str)
{
	return '<b>' . $str . '</b>';
};
function rI($str)
{
	return '<i>' . $str . '</i>';
};
function hr()
{
	echo '<hr/>';
};

function translit($str)
{
$tr = array(
"А"=>"A","Б"=>"B","В"=>"V","Г"=>"G",
"Д"=>"D","Е"=>"E","Ж"=>"J","З"=>"Z","И"=>"I",
"Й"=>"Y","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
"О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
"У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"TS","Ч"=>"CH",
"Ш"=>"SH","Щ"=>"SCH","Ъ"=>"","Ы"=>"YI","Ь"=>"",
"Э"=>"E","Ю"=>"YU","Я"=>"YA","а"=>"a","б"=>"b",
"в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",
"з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
"м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
"с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
"ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
"ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya",
"Ё"=>"E","Є"=>"E","Ї"=>"YI","ё"=>"e","є"=>"e","ї"=>"yi",
" "=> " ", "/"=> "_"
);
if (preg_match('/[^A-Za-z0-9_\-]/', $str)) {
$str = strtr($str,$tr);
$str = preg_replace('/[^A-Za-z0-9_\s\-]/', '', $str);
}
return $str;
}

?>
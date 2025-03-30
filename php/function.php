
<?php
addBr('hello func');

// function sumNum($n1,$n2,$n3){
// addBr($n1);
// addBr($n2);
// addBr($n3);
//     addBr('sum = '.$n1+$n2+$n3);
// };

// $p1 = 1;
// $p2 = 2;
// $p3 = 3;

// sumNum( $p1, $p2, $p3);
function qube($n){
    return pow($n,3);
}
$res = qube(3) + qube(2);
echo$res;

function func($num) {
    $sum = 0;
    
    for ($i = 1; $i <= $num; $i++) {
        $sum += $i;
        return $sum;
    }
}

echo func(5);

?>
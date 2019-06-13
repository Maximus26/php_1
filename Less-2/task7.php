<?php
$h = date('H');
$i = date('i');
function date_rus($h, $i){
	$h10 = $h % 10;
	$i10 = $i % 10;
	
	if($h >= 5 && $h <= 20){
		$res = 'часов';
	} elseif($h10 == 1){
		$res = 'час';
	} elseif($h10 >= 2 && $h10 <= 4){
		$res = 'часа';
	} else {
		$res = 'часов';
	}
	
	if($i >= 5 && $i <= 20){
		$res2 = 'минут';
	} elseif($i10 == 1){
		$res2 = 'минута';
	} elseif($i10 >= 2 && $i10 <= 4){
		$res2 = 'минуты';
	} else {
		$res2 = 'минут';
	}
	
	return "$h $res $i $res2";
}
echo date_rus($h, $i);
//вариант сделан по итогам разбора дз на уроке
$h = date('H');
$i = date('i');
function time_rus($n, $f1, $f2, $f3){
	$n10 = $n % 10;
	
	if($n >= 5 && $n < 20){
		echo $n . ' ' . $f1;
	} elseif($n10 == 1){
		echo $n . ' ' . $f2;
	} elseif($n10 >= 2 && $n10 <= 4){
		echo $n . ' ' . $f3;
	} else {
		echo $n . ' ' . $f1;
	}
}
echo time_rus($h, 'часов', 'час', 'часа');
echo ' ';
echo time_rus($i, 'минут', 'минута', 'минуты');
?>

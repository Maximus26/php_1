<?php
$h = date('H');
function date_rus_h($h){
	$h10 = $h % 10;
	
	if($h >= 5 && $h <= 20){
		$res = 'часов';
	} elseif($h10 == 1){
		$res = 'час';
	} elseif($h10 >= 2 && $h10 <= 4){
		$res = 'часа';
	} else {
		echo 'часов';
	}
	
	return $h . ' ' . $res;
}

$i = date('i');
function date_rus_i($i){
	$i10 = $i % 10;
	
	if($i >= 5 && $i <= 20){
		$res = 'минут';
	} elseif($i10 == 1){
		$res = 'минута';
	} elseif($i10 >= 2 && $i10 <= 4){
		$res = 'минуты';
	} else {
		echo 'минут';
	}
	
	return $i . ' ' . $res;
}
echo date_rus_h($h) . ' ' . date_rus_i($i);
?>
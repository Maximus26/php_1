<?php
$h = date('H');
$i = date('i');
function date_rus($h, $i){
	$h10 = $h % 10;
	
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
	
	return $h . ' ' . $res . ' ' . $i . ' ' . $res2;
}
echo date_rus($h, $i);
?>
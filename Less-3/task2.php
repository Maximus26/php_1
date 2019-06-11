<?php
function output_number($i, $n){
	do 
	{
		if ($i == 0){
			echo "$i" . ' - это ноль<br>';
		} elseif ($i % 2 != 0){
			echo "$i" . ' - нечетное число<br>';
		} else{
			echo "$i" . ' - четное число<br>';
		}
		$i++;
	} while ($i <= $n);
}
echo output_number(0, 10);
?>
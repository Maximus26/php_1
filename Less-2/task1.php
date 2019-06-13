<?php
$a = 8;
$b = 4;
if($a >= 0 && $b >= 0){
	echo "$a - $b = " . ($a - $b);
} elseif($a < 0 && $b < 0){
	echo "$a * $b = " . ($a * $b);
}else{
	echo "$a + $b = " . ($a + $b);
}
?>
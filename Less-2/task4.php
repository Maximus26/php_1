<?php
function addition($a, $b) {
	return ($a + $b);
}

function subtraction($a, $b) {
	return ($a - $b);
}

function multiplication($a, $b) {
	return ($a * $b);
}

function division($a, $b) {
	if((int)$b === 0){
		echo 'Делить на ноль нельзя!';
	}else {
		return ($a / $b);
	}
}

function mathOperation($arg1, $arg2, $operation) {
	switch ($operation){

		case "+":
		echo addition($arg1, $arg2);
		break;

		case "-":
		echo subtraction($arg1, $arg2);
		break;

		case "*":
		echo multiplication($arg1, $arg2);
		break;

		case "/":
		echo division($arg1, $arg2);
		break;
	}

}
echo mathOperation(40, 20, '/');
?>
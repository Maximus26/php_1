<?php
echo 'Функция сложения <br>';
function addition($a, $b) {
	return ($a + $b);
}

echo addition(2, 8);
echo '<br>';

echo 'Функция вычитания <br>';
function subtraction($a, $b) {
	return ($a - $b);
}

echo subtraction(10, 4);
echo '<br>';

echo 'Функция умножения <br>';
function multiplication($a, $b) {
	return ($a * $b);
}

echo multiplication(7, 4);
echo '<br>';

echo 'Функция деления <br>';
function division($a, $b) {
	if((int)$b === 0){
		echo 'Делить на ноль нельзя!';
	}else {
		return ($a / $b);
	}
}

echo division(10, 2);
echo '<br>';
?>
<?php

/**
 * Функция арифметических операций
 * @param $arg1, $arg2 - выбранные числа
 * @param $operation - выбранная операция
 * @return string
 */
function mathOperation($arg1, $arg2, $operation) {
	switch ($operation){

		case "+":
			$result = $arg1 + $arg2;
			break;

		case "-":
			$result = $arg1 - $arg2;
			break;

		case "*":
			$result = $arg1 * $arg2;
			break;

		case "/":
			if((int)$arg2 === 0){
				echo 'Делить на ноль нельзя!';
			}else {
				$result = $arg1 / $arg2;
			}
			break;
			default:
				$result = "Операция не выбрана";
				break;
	}
	return $result;

}
<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/menu.php';
$menu = menu($menu_arr);

$arg1 = $_POST['arg1'] ?? null;
$arg2 = $_POST['arg2'] ?? null;
$operation = $_POST['operation'] ?? null;
if ($arg1 && $arg2 && $operation) {
	$res = mathOperation($arg1, $arg2, $operation);
} else {
	$res = 'Форма не заполнена';
}

echo render(TEMPLATES_DIR . 'calc.tpl', [
	'title' => 'Калькулятор',
	'h1' => 'Калькуляторы',
	'h2' => 'Калькулятор с select',
	'h3' => 'Калькулятор с кнопками',
	'menu' => $menu,
	'content' => $res,
	'year' => date('Y')
]);

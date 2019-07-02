<?php
require_once dirname(__DIR__, 3) . '/config/config.php';
require_once dirname(__DIR__, 2) . '/menu.php';
$menu = menu($menu_arr);

$id = isset($_GET['id']) ? $_GET['id'] : false;

if(!$id) {
	echo 'id не передан';
	exit();
}

//обезопашиваемся от инъекций
$id = (int)$id;

if (deleteProduct($id)) {
	$res = "Товар удален";
} else {
	$res = "Произошла ошибка";
}
echo render(TEMPLATES_DIR . 'productDelete.tpl', [
	'title' => 'Удаление товара ' . $id,
	'h1' => 'Удаление товара ' . $id,
	'menu' => $menu,
	'res' => $res,
	'year' => date('Y')
]);
<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/menu.php';
$menu = menu($menu_arr);

$id = isset($_GET['id']) ? $_GET['id'] : false;
if(!$id) {
	echo 'id не передан';
	exit();
}

echo render(TEMPLATES_DIR . 'products.tpl', [
	'title' => 'Продукт ' . $id,
	'h1' => 'Продукт ' . $id,
	'menu' => $menu,
	'content' => showProduct($id),
	'year' => date('Y')
]);
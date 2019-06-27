<?php
require_once dirname(__DIR__, 3) . '/config/config.php';
require_once dirname(__DIR__, 2) . '/menu.php';
$menu = menu($menu_arr);


$name = $_POST['name'] ?? null;
$description = $_POST['description'] ?? null;
$price = $_POST['price'] ?? null;
$image = $_POST['image'] ?? null;
$isActive = $_POST['isActive'] ?? null;
$categoryId = $_POST['categoryId'] ?? null;
$image = loadFile($image, WWW_DIR . '/img/products/');
echo '<pre>';
var_dump($image);
echo '</pre>';
die;
echo "<pre>";
var_dump($_POST);
var_dump($_FILES);
echo "</pre>";
$res = '';
if ($name && $description && $price && $image && $isActive && $categoryId) {
	if (insertProduct($name, $description, $price, $image, $isActive, $categoryId)) {
		$res = 'Товар добавлен!';
	} else {
		$res = 'Произошла ошибка';
	}
}



echo render(TEMPLATES_DIR . 'productCreate.tpl', [
	'title' => 'Добавить новый товар',
	'h1' => 'Добавление товара',
	'menu' => $menu,
	'res' => $res,
	'year' => date('Y')
]);
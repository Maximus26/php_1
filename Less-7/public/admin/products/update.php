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

$product = getProduct($id);

if (!$product) {
	echo '404';
	exit();
}

$name = $_POST['name'] ?? $product['name'];
$description = $_POST['description'] ?? $product['description'];
$price = $_POST['price'] ?? $product['price'];
$file = $_FILES['image'] ?? [];
$res = '';

if(
	$name !== $product['name']
	|| $description !== $product['description']
	|| $price !== $product['price']
	|| ($file && !$file['error'])
) {
	if($name && $price !== false) {
		//пытаемся отредактировать продукт
		$result = updateProduct($id, $name, $description, $price, $file);

		if($result) {
			$res = '<span style="color:green">Товар отредактирован</span>';
		} else {
			$res = 'Произошла ошибка';
		}
	} else {
		$res = 'Недостаточно данных';
	}

}



echo render(TEMPLATES_DIR . 'productUpdate.tpl', [
	'title' => 'Редактирование товара ' . $id,
	'h1' => 'Редактирование товара ' . $id,
	'menu' => $menu,
	'res' => $res,
	'id' => $id,
	'name' => $name,
	'description' => $description,
	'price' => $price,
	'year' => date('Y')
]);
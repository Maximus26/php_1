<?php
require_once dirname(__DIR__, 3) . '/config/config.php';
require_once dirname(__DIR__, 2) . '/menu.php';
$menu = menu($menu_arr);


$name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? '';
$price = $_POST['price'] ?? false;
$file = $_FILES['image'] ?? [];
$res = '';

if($name || $description || $price !== false) {
	if($name && $price !== false) {
		//пытаемся добавить новый товар
		$result = insertProduct($name, $description, $price, $file);

		//если новость добавлено обнуляем $title и $content
		if($result) {
			$res = '<span style="color:green">Товар добавлен</span>';
			$name = '';
			$description = '';
			$price = 0;
		} else {
			$res = 'Произошла ошибка';
		}
	} else {
		$res = 'Недостаточно данных';
	}

}



echo render(TEMPLATES_DIR . 'productCreate.tpl', [
	'title' => 'Добавить новый товар',
	'h1' => 'Добавление товара',
	'menu' => $menu,
	'res' => $res,
	'year' => date('Y')
]);
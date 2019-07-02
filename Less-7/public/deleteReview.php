<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/menu.php';
$menu = menu($menu_arr);

$id = isset($_GET['id']) ? $_GET['id'] : false;

if(!$id) {
	echo 'id не передан';
	exit();
}

deleteReview($id);

echo render(TEMPLATES_DIR . 'reviewDel.tpl', [
	'title' => 'Удаление отзыва',
	'menu' => $menu,
	'res' => 'Ваш отзыв удален!',
	'year' => date('Y')
]);
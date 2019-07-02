<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/menu.php';
$menu = menu($menu_arr);

$id = isset($_GET['id']) ? $_GET['id'] : false;

if(!$id) {
	echo 'id не передан';
	exit();
}

$review = getReview($id);

$author = $_POST['author'] ?? $review['author'];
$text = $_POST['text'] ?? $review['text'];

$res = '';
if ($author !== $review['author'] || $text !== $review['text']) {
	if ($author && $text) {
		if (updateReview($id, $author, $text)) {
			$res = 'Отзыв изменен!';
		} else {
			$res = 'Произошла ошибка';
		}
	} elseif ($author || $text) {
		$res = 'Форма не заполнена';
	}
}


echo render(TEMPLATES_DIR . 'reviews.tpl', [
	'title' => 'Отредактировать отзыв',
	'h1' => '',
	'h2' => 'Отредактировать отзыв ' . $review['id'] . ':',
	'menu' => $menu,
	'res' => $res,
	'inp_val' => $author,
	'textarea' => $text,
	'content' => '',
	'year' => date('Y')
]);
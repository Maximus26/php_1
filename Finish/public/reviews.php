<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/menu.php';
$menu = menu($menu_arr);


$author = $_POST['author'] ?? null;
$text = $_POST['text'] ?? null;
$res = '';
if ($author && $text) {
	if (insertReview($author, $text)) {
		$res = 'Отзыв добавлен!';
		$author = '';
		$text = '';
	} else {
		$res = 'Произошла ошибка';
	}
} elseif ($author || $text) {
	$res = 'Форма не заполнена';
}

$reviews = getReviews();

function reviewOutput($reviews){
	$result = '';
	foreach ($reviews as $review) {
		$result .= '<div class="review">' . $review['author'] . ': ' . $review['text'] . '<br><a href="editReview.php?id=' . $review['id'] . '">Редактировать</a> <a href="deleteReview.php?id=' . $review['id'] . '">Удалить</a></div>';
	}
	return $result;
}

echo render(TEMPLATES_DIR . 'reviews.tpl', [
	'title' => 'Отзывы о нас',
	'h1' => 'Отзывы о нас',
	'h2' => 'Добавьте свой отзыв',
	'menu' => $menu,
	'res' => $res,
	'inp_val' => $author,
	'textarea' => $text,
	'content' => reviewOutput($reviews),
	'year' => date('Y')
]);
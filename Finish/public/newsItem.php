<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/menu.php';
$menu = menu($menu_arr);

$id = $_GET['id'] ?? false;

if(!$id) {
	echo 'id не передан';
	die;
}

$sql = "SELECT * FROM news WHERE id = $id";

$newsItem = show($sql);
if(!$newsItem) {
	echo "404";
	die;
}
if (empty($newsItem['image'])) {
	$newsItem['image'] = 'img/no-image.jpeg';
}
echo render(TEMPLATES_DIR . 'news.tpl', [
	'title' => $newsItem['title'],
	'h1' => $newsItem['title'],
	'menu' => $menu,
	'image' => $newsItem['image'],
	'content' => $newsItem['content'],
	'year' => date('Y')
]);
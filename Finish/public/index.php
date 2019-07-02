<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/menu.php';
$menu = menu($menu_arr);

$news = getNews();


$content = renderNews($news);

echo render(TEMPLATES_DIR . 'index.tpl', [
	'title' => 'Главная',
	'h1' => 'Последние новости!',
	'menu' => $menu,
	'content' => $content,
	'year' => date('Y')
]);
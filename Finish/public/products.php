<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/menu.php';
$menu = menu($menu_arr);

echo render(TEMPLATES_DIR . 'products.tpl', [
	'title' => 'Каталог товаров',
	'h1' => 'Каталог товаров',
	'menu' => $menu,
	'content' => createProducts(),
	'year' => date('Y')
]);

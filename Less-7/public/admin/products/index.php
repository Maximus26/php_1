<?php
require_once dirname(__DIR__, 3) . '/config/config.php';
require_once dirname(__DIR__, 2) . '/menu.php';
$menu = menu($menu_arr);

echo render(TEMPLATES_DIR . 'productsAdm.tpl', [
	'title' => 'Каталог товаров',
	'h1' => 'Каталог товаров администрирование',
	'menu' => $menu,
	'content' => createProductsAdmin(),
	'year' => date('Y')
]);
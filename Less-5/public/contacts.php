<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/menu.php';
$menu = menu($menu_arr);

echo render(TEMPLATES_DIR . 'index.tpl', [
	'title' => 'Контакты',
	'h1' => 'Контакты',
	'menu' => $menu,
	'content' => render(TEMPLATES_DIR . 'contacts.tpl'),
	'year' => date('Y')
]);

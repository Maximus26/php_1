<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/menu.php';
$menu = menu($menu_arr);

$result = getAssocResult("SELECT * FROM `images` ORDER BY `images`.`views` DESC");

$gallery = gallery($result);

echo render(TEMPLATES_DIR . 'gallery.tpl', [
	'title' => 'Галерея',
	'h1' => 'Природа России',
	'menu' => $menu,
	'content' => $gallery,
	'year' => date('Y')
]);

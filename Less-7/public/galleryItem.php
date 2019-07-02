<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/menu.php';
$menu = menu($menu_arr);
$id = isset($_GET['id']) ? $_GET['id'] : false;

if(!$id) {
	echo 'id не передан';
	exit();
}


$result = show("SELECT * FROM images WHERE `id` = $id");
$views = ($result['views'] + 1);

execQuery("UPDATE `images` SET `views` = $views WHERE `images`.`id` = $id;");

$gall_img = '<div class="big-img"><img src="' . $result['url'] . '" alt="' . $result['title'] . '"></div>';

echo render(TEMPLATES_DIR . 'galleryitem.tpl', [
	'title' => 'Галерея',
	'h1' => $result['title'],
	'menu' => $menu,
	'content' => $gall_img,
	'views' => $views,
	'year' => date('Y')
]);
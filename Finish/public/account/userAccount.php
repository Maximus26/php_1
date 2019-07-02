<?php
require_once dirname(__DIR__, 2) . '/config/config.php';
require_once __DIR__ . '/../menu.php';
$menu = menu($menu_arr);
/*echo '<pre>';
var_dump($_SESSION['login']['role']);
echo '</pre>';
die;*/
if (empty($_SESSION['login'])) {
	header('Location: /login.php');
}
if($_SESSION['login']['role'] !== '0'){
	header('Location: /admin/');
}

echo render(TEMPLATES_DIR . 'products.tpl', [
	'title' => 'Привет ' . $_SESSION['login']['name'],
	'h1' => 'Ваши заказы ' . $_SESSION['login']['name'],
	'content' => generateMyOrdersPage(),
	'menu' => $menu,
	'year' => date('Y')
]);
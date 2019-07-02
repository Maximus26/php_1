<?php
require_once dirname(__DIR__, 2) . '/config/config.php';
require_once __DIR__ . '/../menu.php';
$menu = menu($menu_arr);


if (empty($_SESSION['login'])) {
	header('Location: /login.php');
}

if($_SESSION['login']['role']!== '1'){
	header('Location: /account/userAccount.php');
}

echo render(TEMPLATES_DIR . 'products.tpl', [
	'title' => 'Привет ' . $_SESSION['login']['name'],
	'h1' => 'Заказы пользователей',
	'content' => generateAdminOrdersPage(),
	'menu' => $menu,
	'year' => date('Y')
]);
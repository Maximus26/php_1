<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/menu.php';
$menu = menu($menu_arr);


echo render(TEMPLATES_DIR . 'products.tpl', [
	'title' => 'BrandShop - корзина',
	'h1' => 'Корзина',
	'menu' => $menu,
	'year' => date('Y'),
	'content' => renderProductsCart($_COOKIE['cart'] ?? []),
	'button' => empty($_SESSION['login'])
		? '<a href="/login.php">Войти</a>'
		: '<a href="/createOrder.php" class="btn">Оформить заказ</a>'
]);
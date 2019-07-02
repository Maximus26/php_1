<?php

require_once __DIR__ . '/../config/config.php';
if ($_SESSION['login']){
	$button = 'Выйти';
	$buttonLink = '/logout.php';
}else{
	$button = 'Войти';
	$buttonLink = '/login.php';
}
$menu_arr = [
	[
		'title' => 'Главная',
		'link' => '/'
	],
	[
		'title' => 'Галерея',
		'link' => '/gallery.php'
	],
	[
		'title' => 'Отзывы',
		'link' => '/reviews.php'
	],
	[
		'title' => 'Контакты',
		'link' => '/contacts.php'
	],
	[
		'title' => 'Калькулятор',
		'link' => '/calculator.php'
	],
	[
		'title' => 'Каталог',
		'link' => '/products.php',
		'children' => [
			[
				'title' => 'Админка',
				'link' => '/admin/products/'
			]
		]
	],
	[
		'title' => $button,
		'link' => $buttonLink,
		'children' => [
			[
				'title' => 'Регистрация',
				'link' => '/registration.php'
			]
		]
	]
];
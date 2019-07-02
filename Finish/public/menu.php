<?php

require_once __DIR__ . '/../config/config.php';
if ($_SESSION['login']['id']){
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
		'title' => 'Корзина',
		'link' => '/cart.php'
	],
	[
		'title' => 'Каталог',
		'link' => '/products.php'
	],
	[
		'title' => 'Регистрация',
		'link' => '/registration.php'
	],
	[
		'title' => $button,
		'link' => $buttonLink
	],
	[
		'title' => 'Личный кабинет',
		'link' => '/account/',
		'children' => [
			[
				'title' => 'Пользователь',
				'link' => '/account/userAccount.php'
			],
			[
				'title' => 'Администратор',
				'link' => '/admin/'
			]
		]
	]
];
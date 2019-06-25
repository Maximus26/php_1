<?php

require_once __DIR__ . '/../config/config.php';
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
	]
];

/*$menu = [
	[
		'title' => 'Главная',
		'link' => '/'
	],
	[
		'title' => 'Контакты',
		'link' => '/contancts'
	],
	[
		'title' => 'Статьи',
		'link' => '/articles',
		'children' => [
			[
				'title' => 'Котики',
				'link' => '/articles/cats'
			],
			[
				'title' => 'Собачки',
				'link' => '/articles/dogs',
				'children' => [
					[
						'title' => 'Доберманы',
						'link' => '/articles/dogs/dobermani'
					],
					[
						'title' => 'Корги',
						'link' => '/articles/dogs/corgi',
						'children' => []
					]
				]
			]
		]
	]
];*/
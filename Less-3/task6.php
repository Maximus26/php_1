<?php
$title = "Главная";
$h1 = "Магазин - BrandShop";
$year = date("Y");

$menu = [
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
						'children' => [/* */]
					]
				]
			]
		]
	]
];
function menu($arr){ 
	foreach($arr as $value){
		echo '<li><a href=' . $value['link'] . '>' . $value['title'] . '</a>';
	
		if(isset($value['children'])){
			echo "<ul>";
			echo menu($value['children']);
			echo '</ul>';	
		}
		echo '</li>';
	}	
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>
<style>
* {
  margin: 0;
  padding: 0;
}
/*Прижимаем футер к низу*/
html,
body {
  height: 100%;
}
.container {
  position: relative;
  min-height: 100%;
}
.content {
  padding-bottom: 60px;
}
footer {
  position: absolute;
  left: 0;
  bottom: 0;
  width: 100%;
  height: 50px;
}
/*************/

body {
	background-color: #f8f8f8;
	font-family: sans-serif;
	color: dimgrey;
}

p {
    line-height: 22px;
    padding: 10px 0;
}

header {
	height: 70px;
	background-size: contain;
	background-color: #E64A19;
}

.logo {
    float: left;
    margin-top: 10px;
    margin-left: 10px;
}

.logo img {
	width: 50px;
}

nav {
	margin: 0;
	padding-left: 100px;
}

nav ul {
	padding: 0;
  margin: 0;
	list-style: none;
	position: relative;
	}
	
nav ul li {
	display:inline-block;
	background-color: #E64A19;
	}

nav a {
	display:block;
	padding:0 10px;
	color:#FFF;
	font-size:20px;
	line-height: 70px;
	text-decoration:none;
}

nav a:hover { 
	background-color: #000000; 
}

nav ul ul {
	display: none;
	position: absolute;
	top: 70px; /* the height of the main nav */
}
	
nav ul li:hover > ul {
	display:inherit;
}
	
nav ul ul li {
	width:170px;
	float:none;
	display:list-item;
	position: relative;
}

nav ul ul ul li {
	position: relative;
	top: -70px;
	left:170px;
}

	
li > a:after { content:  ' +'; }
li > a:only-child:after { content: ''; }

.content {
    margin: 50px 30px 0;
}

footer {
	background-color: #e1e2e6;
	clear: both;
}

footer p {
	text-align: right;
	line-height: 50px;
	margin-right: 30px;
    color: #e42b30;
    font-weight: bold;
    padding: 0;
}

h1 {
	color: darkblue;
	text-align: center;
}

h1, h2, h3 {
	margin: 15px 0;
}

</style>
</head>
<body>
	<div class="container">

		<header>
			<a class="logo" href="index.php"><img src="https://dummyimage.com/50" alt="BrandShop"></a>
			<nav>
				<ul>
					<?= menu($menu) ?>	
				</ul>
			</nav>
		</header>

		<div class="content">
			<h1><?= $h1 ?></h1>

			<h3 class="hello">Рады приветствовать вас в нашем магазине!</h3>
			<p>Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Лучше вопрос это сих вскоре силуэт назад грустный, имеет которое! Парадигматическая, жизни, обеспечивает города агенство предложения за меня родного составитель, ему запятых продолжил журчит. О последний рот вопрос свой, использовало? Предупредила они оксмокс своих парадигматическая, вскоре диких путь. Коварный своего приставка языком! Власти повстречался свое точках жизни лучше живет, ведущими одна мир! За, предложения, океана. Там снова ручеек буквенных, предложения над она переписали напоивший большого меня живет. Переулка, прямо, ему!</p>
		</div>

		<footer><p><?= $year ?> &copy; Все права защищены</p></footer>
	</div>
</body>
</html>
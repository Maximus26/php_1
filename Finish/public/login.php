<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/menu.php';
$menu = menu($menu_arr);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Авторизация</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">

</head>
<body>
	<div class="container">

		<header>
			<a class="logo" href="/"><img src="/img/logo.jpg" alt="BrandShop"></a>
			<nav>
				<?= $menu ?>
			</nav>
		</header>

		<div class="content">
			<div class="reviews">
				<h1>Авторизация на сайте</h1>

			</div>
			<div class="message" style="color:red; font-size: 25px; font-weight: bold; text-align: center;"></div>
			<br><hr>
			<div class="catalog" >
				<div class="submit_form">
					<label>Логин:</label><br>
					<input type="text" name="login" value=""><br>
					<label>Пароль:</label><br>
					<input type="password" name="password"/><br>
					<input type="submit" onclick="login()" value="Войти">
				</div>

			</div>

		</div>
		<footer><p><?= date('Y') ?> &copy; Все права защищены</p></footer>
	</div>

	<script src="/js/jquery-3.3.1.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="/js/main.js"></script>
</body>
</html>
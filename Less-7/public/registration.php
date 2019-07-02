<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/menu.php';
$menu = menu($menu_arr);

//Полуаем данные из формы
$name = $_POST['name'] ?? '';
$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';
$role = '0';


$res = '';
//Если данные формы заполнены пытаемся зарегистрироваться
if ($name && $login && $password) {
	//преобразуем пароль в хэш
	$password = md5($password);

	//запрос в БД на регистрацию
	if(registration($name, $login, $password, $role = 0)){
		$sql = "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'";
		$user = show($sql);
		//если пользователь найден. Записываем его в сессию
		if($user) {
			$_SESSION['login'] = $user;
		}
		$res = '<span style="color:green">Регистрация завершена!<br> Добро пожаловать, ' . $name . '</span>';
	}

} else {
	$res = 'Заполните все поля формы!';
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Регистрация</title>
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
				<h1>Регистрация на сайте</h1>

			</div>
			<div style="color:red; font-size: 25px; font-weight: bold; text-align: center;"><?= $res ?></div>
			<br><hr>
			<div class="catalog" >
				<form method="POST" class="submit_form" action="">
					<label>Имя:</label><br>
					<input type="text" name="name" value="<?= $name ?>"><br>
					<label>Логин:</label><br>
					<input type="text" name="login" value="<?= $login ?>"><br>
					<label>Пароль:</label><br>
					<input type="password" name="password"/><br>
					<input type="submit" value="Зарегистрироваться">
				</form>

			</div>

		</div>
		<footer><p><?= date('Y') ?> &copy; Все права защищены</p></footer>
	</div>
</body>
</html>
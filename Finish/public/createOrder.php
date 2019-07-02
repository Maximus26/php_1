<?php
require_once __DIR__ . '/../config/config.php';

if (empty($_SESSION['login'])) {
	header('Location: /login.php');
}

$cart = $_COOKIE['cart'] ?? [];

if (empty($cart)) {
	$mess = "Корзина пуста";
	exit;
}

$address = $_POST['address'] ?? false;

if (!empty($address)) {
	$userId = $_SESSION['login']['id'];

	//создаем соединение с БД
	$db = createConnection();
	//Избавляемся от всех инъекций
	$address = escapeString($db, $address);

	//генерируем SQL добавления в БД

	$sql = "INSERT INTO `orders` (`userId`, `address`, `status`) VALUES ($userId, '$address', 1)";
	$orderId = insert($sql, $db);

	if(!$orderId) {
		$mess = 'Произошла ошибка';
		exit();
	}

	$ids = array_keys($cart);

	//генерируем запрос
	$sql = "SELECT * FROM `products` WHERE `id` IN (" . implode(', ', $ids) . ")";
	$products = getAssocResult($sql);


	$values = [];

	foreach ($products as $product) {
		$productId = $product['id'];
		$amount = $cart[$productId];
		$price = $product['price'];
		$values[] = "($orderId, $productId, $price, $amount)";
	}


	$sql = "INSERT INTO `orderProducts` (`orderId`, `productId`, `price`, `amount`) VALUES " . implode(', ', $values);

	if(execQuery($sql)) {
		// очищаем куки корзины
		foreach ($_COOKIE['cart'] as $productId => $amount) {
			setcookie("cart[$productId]", null, 1, '/');
		}

		header('Location: /account/userAccount.php');
	} else {
		$mess = 'Произошла ошибка';
	}

}else{
	$mess = "Введите адрес доставки!";
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Оформление покупки</title>
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
				<h1>Оформление покупки</h1>

			</div>
			<div class="message" style="color:red; font-size: 25px; font-weight: bold; text-align: center;"><?= $mess?></div>
			<br><hr>
			<div class="catalog" >
				<form method="POST" class="submit_form">
					<label>Введите адрес доставки:</label><br>
					<input type="text" name="address" value=""><br>
					<input type="submit" value="Отправить">
				</form>

			</div>

		</div>
		<footer><p><?= date('Y') ?> &copy; Все права защищены</p></footer>
	</div>

	<script src="/js/jquery-3.3.1.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="/js/main.js"></script>
</body>
</html>
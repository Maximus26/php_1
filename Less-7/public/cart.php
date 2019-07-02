<?php

require_once __DIR__ . '/../config/config.php';

$id = $_GET['id'] ?? false;

if(!$id) {
	echo 'id не передан';
	die;
}
/*echo '<pre>';
var_dump($_SESSION['good']);
echo '</pre>';
die;*/
function addedToCart(){
	$result = '';

	$productsAdded = $_SESSION['good'];
	foreach ($productsAdded as $productAdded) {
		$result .= render(TEMPLATES_DIR . 'productCart.tpl', $roductAdded);
	}
	return $result;
}
if($_SESSION['login']){
	if ($_SESSION['good']) {
		$added = addedToCart();

		$cartProduct = getProduct($id);
		$userId = $_SESSION['login']['id'];
		$productId = $cartProduct['id'];
		$amount = $_POST['amount'] ?? 1;
		$button = $_POST['button'] ?? false;
		$continue = $_POST['continue'] ?? false;

		if($continue){
			$sql = execQuery("INSERT INTO `baskets`(`userId`, `productId`, `amount`) VALUES ('$userId', '$productId', '$amount')");
			$goods = end(getAssocResult("SELECT * FROM `baskets`"));
			$_SESSION['good'] = [];
			$good = [
				'id' => $goods['id'],
				'img' => $cartProduct['image'],
				'name' => $cartProduct['name'],
				'price' => $cartProduct['price'],
				'amount' => $goods['amount']
			];
			$_SESSION['good'] = $good;
			Header('Location: /products.php');
		} elseif($button){
			//здесь процедура оформления заказа
		}
	}
} else{
	$mess = 'Для совершения покупки необходимо <a href ="/login.php">автроизоваться</a> или <a href ="/registration.php">зарегистрироваться</a>';
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Корзина</title>
	<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
	<div class="container">
		<header>
			<a class="logo" href="/"><img src="/img/logo.jpg" alt="BrandShop"></a>
			<nav>
			</nav>
		</header>
		<h1></h1>
		<div class="mess"><?= $mess ?></div>
		<div class="content">
			<h2>Выбранные товары</h2>
			<?= $added ?>
			<div class="good">
				<form method="POST">
					<img src="<?= $cartProduct['image'] ?>" alt="product_img">
					<div class="name"><?= $cartProduct['name'] ?></div>
					<div class="price"><?= $cartProduct['price'] ?></div>
					<input class="number" type="number" name="amount" value="1">
					<input class="button" type="submit" name="continue" value="Продолжить покупки">
					<input class="button" type="submit" name="button" value="Оформить заказ">
				</form>

			</div>
		</div>

		<footer><p>{{YEAR}} &copy; Все права защищены</p></footer>
	</div>
</body>
</html>
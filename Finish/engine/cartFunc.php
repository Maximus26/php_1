<?php

/**
 * Получить все товары пользователя
 * @param int $userId
 * @return array
 */
/*function getCart($userId)
{
	$userId = (int)$userId;
	$sql = "SELECT * FROM `baskets` WHERE `userId` = $userId";

	return getAssocResult($sql);
}*/

/**
 * Генерирует страницу корзины запись в БД
 * @param array $cart
 * @return string
 */
/*function renderProductsCart()
{
	$cart = getCart($_SESSION['login']['id']);

	if(empty($cart)) {
		return 'корзина пуста';
	}

	//получаем айдишники товаров
	$ids = array_column($cart, 'productId');

	//генерируем запрос
	$sql = "SELECT * FROM `products` WHERE `id` IN (" . implode(', ', $ids) . ")";
	$products = getAssocResult($sql);

	$products = indexByKey($products, 'id');


	//инициализируем строку контента и сумму корзины
	$content = '';
	$cartSum = 0;
	foreach ($cart as $cartItem) {
		$productId = $cartItem['productId'];
		$product = $products[$productId] ?? false;

		if (!$product) {
			continue;
		}

		$count = $cartItem['amount'];
		$price = $product['price'];
		$productSum = $count * $price;
		//генерируем элемент корзины
		$content .= render(TEMPLATES_DIR . 'cartListItem.tpl', [
			'name' => $product['name'],
			'id' => $product['id'],
			'count' => $count,
			'price' => $price,
			'sum' => $productSum
		]);

		$cartSum += $productSum;
	}

	return render(TEMPLATES_DIR . 'productCart.tpl', [
		'content' => $content,
		'sum' => $cartSum
	]);
}*/

/**
 * Генерирует страницу корзины на основе куки и сессии
 * @param array $cart
 * @return string
 */
function renderProductsCart($cart)
{
	if(empty($cart)) {
		return 'корзина пуста';
	}

	//получаем айдишники товаров
	$ids = array_keys($cart);

	//генерируем запрос
	$sql = "SELECT * FROM `products` WHERE `id` IN (" . implode(', ', $ids) . ")";
	$products = getAssocResult($sql);


	//инициализируем строку контента и сумму корзины
	$content = '';
	$cartSum = 0;
	foreach ($products as $product) {
		$count = $cart[$product['id']];
		$price = $product['price'];
		$productSum = $count * $price;
		//генерируем элемент корзины
		$content .= render(TEMPLATES_DIR . 'cartListItem.tpl', [
			'name' => $product['name'],
			'id' => $product['id'],
			'count' => $count,
			'price' => $price,
			'sum' => $productSum
		]);
		$cartSum += $productSum;
	}

	return render(TEMPLATES_DIR . 'cartList.tpl', [
		'content' => $content,
		'sum' => $cartSum
	]);
}

/**
 * Генерирует страницу моих заказов
 * @return string
 */
function generateMyOrdersPage()
{
	//получаем id пользователя и и получаем все заказы пользователя
	$userId = $_SESSION['login']['id'];
	$orders = getAssocResult("SELECT * FROM `orders` WHERE `userId` = $userId");

	if($orders){

		$result = '';
		foreach ($orders as $order) {
			$orderId = $order['id'];

			//получаем продукты, которые есть в заказе
			$products = getAssocResult("
				SELECT * FROM `orderProducts` as op
				JOIN `products` as p ON `p`.`id` = `op`.`productId`
				WHERE `op`.`orderId` = $orderId
			");

			$content = '';
			$orderSum = 0;
			//генерируем элементы таблицы товаров в заказе
			foreach ($products as $product) {
				$count = $product['amount'];
				$price = $product['price'];
				$productSum = $count * $price;
				$content .= render(TEMPLATES_DIR . 'orderTableRow.tpl', [
					'name' => $product['name'],
					'id' => $product['id'],
					'count' => $count,
					'price' => $price,
					'sum' => $productSum
				]);
				$orderSum += $productSum;
			}

			$statuses = [
				1 => 'Заказ не обработан',
				2 => 'Заказ отменен',
				3 => 'Заказ оплачен',
				4 => 'Заказ доставлен',
			];

			//генерируем полную таблицу заказа
			$result .= render(TEMPLATES_DIR . 'orderTable.tpl', [
				'id' => $orderId,
				'content' => $content,
				'sum' => $orderSum,
				'status' => $statuses[$order['status']]
			]);
		}

	}else {
		$result = 'У вас пока нет заказов!';
	}
	return $result;
}

/**
 * Генерирует страницу контроля заказов для админа
 * @return string
 */
function generateAdminOrdersPage()
{
	$userIdTable = [];
	//получаем все заказы из базы
	$users = getAssocResult("SELECT * FROM `orders`");
	$userOrders = '';
	foreach ($users as $user) {
		//получаем id пользователя и получаем все заказы пользователя
		$userId = $user['userId'];
		if(in_array($userId, $userIdTable)){
			continue;
		}
		$userIdTable[] = $userId;
		$orders = getAssocResult("SELECT * FROM `orders` WHERE `userId` = $userId");
		//получаем имя и логин пользователя
		$userInfo = getAssocResult("SELECT * FROM `users` WHERE `id` = $userId");
		foreach ($userInfo as $user) {
			$userName = $user['name'];
			$userLogin = $user['login'];
		}

		if($orders){

			$result = '';
			foreach ($orders as $order) {
				$orderId = $order['id'];

				//получаем продукты, которые есть в заказе
				$products = getAssocResult("
					SELECT * FROM `orderProducts` as op
					JOIN `products` as p ON `p`.`id` = `op`.`productId`
					WHERE `op`.`orderId` = $orderId
				");

				$content = '';
				$orderSum = 0;
				//генерируем элементы таблицы товаров в заказе
				foreach ($products as $product) {
					$count = $product['amount'];
					$price = $product['price'];
					$productSum = $count * $price;
					$content .= render(TEMPLATES_DIR . 'orderTableRow.tpl', [
						'name' => $product['name'],
						'id' => $product['id'],
						'count' => $count,
						'price' => $price,
						'sum' => $productSum
					]);
					$orderSum += $productSum;
				}

				$statuses = [
					1 => 'Заказ не обработан',
					2 => 'Заказ отменен',
					3 => 'Заказ оплачен',
					4 => 'Заказ доставлен',
				];

				//генерируем полную таблицу заказа
				$result .= render(TEMPLATES_DIR . 'orderTableAdmin.tpl', [
					'id' => $orderId,
					'content' => $content,
					'sum' => $orderSum,
					'status' => $statuses[$order['status']],
					'date' => $order['dateCreate']
				]);
			}

		}
		$userOrders .= render(TEMPLATES_DIR . 'orderTableUserAdmin.tpl', [
			'content' => $result,
			'username' => $userName,
			'login' => $userLogin
		]);
	}
	return $userOrders;

}
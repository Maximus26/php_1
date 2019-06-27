<?php
/**
 * Функция запроса к БД с выборкой в виде массива
 * @return array
 */
function getProducts() {
	$productsSql = "SELECT * FROM `products`";
	return getAssocResult($productsSql);
}

/**
 * Функция запроса к БД с выводом записи по ID
 * @return string
 */
function getProduct($id)
{
	$id = (int) $id;
	$sql = "SELECT * FROM `products` WHERE `id` = $id";
	return show($sql);
}

/**
 * Функция генерации каталога продуктов
 * @return string
 */
function createProducts()
{
	//инициализируем результирующую строку
	$result = '';
	//получаем все продукты из БД
	$products = getProducts();

	//для каждого продукта
	foreach ($products as $product) {
		$result .= render(TEMPLATES_DIR . 'productLink.tpl', $product);
	}
	return $result;
}

/**
 * Функция генерации каталога продуктов для админки
 * @return string
 */
function createProductsAdmin()
{
	//инициализируем результирующую строку
	$result = '';
	//получаем все продукты из БД
	$products = getProducts();

	//для каждого продукта
	foreach ($products as $product) {
		$result .= render(TEMPLATES_DIR . 'productLinkAdm.tpl', $product);
	}
	return $result;
}

/**
 * @param int $id
 * @return string
 */
function showProduct($id)
{
	//для безопасности превращаем id в число
	//получаем изображение
	$product = getProduct((int) $id);

	//если продукт не найден выводим 404
	if(!$product) {
		return '404';
	}

	//возвращаем render шаблона изображения
	return render(TEMPLATES_DIR . 'productPage.tpl', $product);
}


/*CRUD*/

/**
 * Функция добавления продукта в БД
 * @param переменные согласно столбцов таблицы
 * @return bool|mysqli_result
 */
function insertProduct($name, $description, $price, $image, $isActive, $categoryId) {
	$db = createConnection();
	$author = escapeString($db, $author);
	$text = escapeString($db, $text);
	$sql = "INSERT INTO `products`(`id`, `name`, `description`, `price`, `image`, `dateCreate`, `dateChange`, `isActive`, `categoryId`) VALUES (NULL,'$name','$description','$price','$image',CURRENT_TIMESTAMP,NULL,'$isActive','$categoryId')";
	return execQuery($sql, $db);
}

/**
 * Функция обновления продукта в БД
 * @param переменные согласно столбцов таблицы
 * @return bool|mysqli_result
 */
function updateProduct($id, $name, $description, $price, $image, $isActive, $categoryId) {
	$db = createConnection();
	$id = (int) $id;
	$author = escapeString($db, $author);
	$text = escapeString($db, $text);
	$sql = "UPDATE `products` SET `name` = '$name', `description` = '$description', `price` = '$price', `image` = '$image', `dateChange` = NULL, `isActive` = '$isActive', `categoryId` = '$categoryId' WHERE `products`.`id` = $id";
	return execQuery($sql, $db);
}

/**
 * Функция удаления продукта из БД
 * @param $id - id отзыва
 */
function deleteProduct($id) {
	$db = createConnection();
	$id = (int) $id;
	$author = escapeString($db, $author);
	$text = escapeString($db, $text);
	$sql = "DELETE FROM `products` WHERE `products`.`id` = $id";
	return execQuery($sql, $db);
}


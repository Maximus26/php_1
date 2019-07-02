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
	//получаем товар
	$product = getProduct((int) $id);

	//если продукт не найден выводим 404
	if(!$product) {
		return '404';
	}

	//возвращаем render шаблона страницы товара
	return render(TEMPLATES_DIR . 'productPage.tpl', $product);
}


/*CRUD*/

/**
 * Функция добавления продукта в БД
 * @param string $name
 * @param string $description
 * @param float $price
 * @param array $file
 * @return bool
 */
function insertProduct($name, $description, $price, $file) {

	if($file){
		$fileName = loadFile('image', 'img/products/');
	}

	$db = createConnection();
	$name = escapeString($db, $name);
	$description = escapeString($db, $description);
	$price = escapeString($db, $price);
	$sql = $file
		? "INSERT INTO `products`(`name`, `description`, `price`, `image`) VALUES ('$name', '$description', $price, '$fileName')"
		: "INSERT INTO `products`(`name`, `description`, `price`) VALUES ('$name', '$description', $price)";
	return execQuery($sql, $db);
}

/**
 * Редактирование продукта
 * @param int $id
 * @param string $name
 * @param string $description
 * @param float $price
 * @param array $file
 * @return bool
 */
function updateProduct($id, $name, $description, $price, $file)
{
	$uploadFile = $file && !$file['error'];
	if($uploadFile) {
		$fileName = loadFile('image', 'img/products/');
	}


	//создаем соединение с БД
	$db = createConnection();
	//Избавляемся от всех инъекций в $title и $content
	$name = escapeString($db, $name);
	$description = escapeString($db, $description);
	$price = (float) $price;

	//генерируем SQL добавления в БД

	$sql = $uploadFile
		? "UPDATE `products` SET `name`='$name', `description`='$description', `price`=$price, `image`='$fileName' WHERE `id` = $id"
		: "UPDATE `products` SET `name`='$name', `description`='$description', `price`=$price WHERE `id` = $id";

	//выполняем запрос
	return execQuery($sql, $db);
}

/**
 * Функция удаляет продукт
 * @param int $id
 * @return bool
 */
function deleteProduct($id)
{
	$id = (int) $id;

	$sql = "DELETE FROM `products` WHERE `id` = $id";

	return execQuery($sql);
}


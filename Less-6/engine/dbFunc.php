<?php
/**
 * функция подключения к БД
 * @return
 */
function createConnection()
{
	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	mysqli_query($db, "SET CHARACTER SET 'utf8'");
	return $db;
}

/**
 * функция запроса к БД параметр sql запрос
 * @return array
 */
function execQuery($sql)
{
	$db = createConnection();

	$result = mysqli_query($db, $sql);

	// if (!$result) {
	// 	if (isset($_ENV['env']) && $_ENV['env'] === 'dev') {
	// 		echo "Ошибка: " . mysqli_error($db);
	// 		die;
	// 	} else {
	// 		echo "Ошибка, обратитесь в тех.поддержку";
	// 		file_put_contents(LOG_DIR . 'error.log', "Запрос $sql, Ошибка: " . mysqli_error($db));
	// 		/* логирование writeToLog(mysqli_error($db), $sql) */
	// 	}
	// }

	mysqli_close($db);
	return $result;
}
/**
 * функция запроса к БД с выборкой в виде массива
 * @return array
 */
function getAssocResult($sql)
{
	$db = createConnection();

	$result = mysqli_query($db, $sql);

	$array_result = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$array_result[] = $row;
	}

	mysqli_close($db);
	return $array_result;
}

/**
 * функция запроса к БД с выборкой по элементам
 * @return array
 */
function show($sql)
{
	$result = getAssocResult($sql);
	if(empty($result)) {
		return null;
	}
	return $result[0];
}

/**
 * Функция выполняет SQL запрос в БД и пытается получить ассоцитивный массив
 * результата выборки
 * @param mysqli ?$db - готовое подключение к БД
 * @param string $string - sql строка запроса, от которой необходимо защититься
 * @return string
 */
function escapeString($db, $string)
{
	//избавляемся от sql и html инъекций
	return mysqli_real_escape_string(
		$db,
		(string)htmlspecialchars(strip_tags($string))
	);
}

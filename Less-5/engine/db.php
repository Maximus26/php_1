<?php

//функция подключения к БД
function createConnection()
{
	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	mysqli_query($db, "SET CHARACTER SET 'utf8'");
	return $db;
}

//функция запроса к БД
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

//функция запроса к БД с выборкой в виде массива
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

//функция запроса к БД с выборкой по элементам
function show($sql)
{
	$result = getAssocResult($sql);
	if(empty($result)) {
		return null;
	}
	return $result[0];
}

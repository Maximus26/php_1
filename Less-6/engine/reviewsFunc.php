<?php
/**
 * Функция запроса к БД с выборкой в виде массива
 * @return array
 */
function getReviews() {
	$reviewsSql = "SELECT * FROM `reviews`";
	return getAssocResult($reviewsSql);
}

/**
 * Функция запроса к БД с выводом записи по ID
 * @return string
 */
function getReview($id)
{
	$id = (int) $id;
	$sql = "SELECT * FROM `reviews` WHERE `id` = $id";
	return show($sql);
}

/**
 * Функция добавления отзыва в БД
 * @param $author - имя автоора отзыва
 * @param $text текст отзыва
 * @return bool|mysqli_result
 */
function insertReview($author, $text) {
	$db = createConnection();
	$author = escapeString($db, $author);
	$text = escapeString($db, $text);
	$sql = "INSERT INTO `reviews`(`author`, `text`) VALUES ('$author', '$text')";
	return execQuery($sql, $db);
}

/**
 * Функция обновления отзыва в БД
 * @param $id - id отзыва
 * @param $author - имя автоора отзыва
 * @param $text текст отзыва
 * @return bool|mysqli_result
 */
function updateReview($id, $author, $text) {
	$db = createConnection();
	$id = (int) $id;
	$author = escapeString($db, $author);
	$text = escapeString($db, $text);
	$sql = "UPDATE `reviews` SET `author`='$author',`text`='$text' WHERE `id` = $id";
	return execQuery($sql, $db);
}

/**
 * Функция удаления отзыва из БД
 * @param $id - id отзыва
 */
function deleteReview($id) {
	$db = createConnection();
	$id = (int) $id;
	$author = escapeString($db, $author);
	$text = escapeString($db, $text);
	$sql = "DELETE FROM `reviews` WHERE `reviews`.`id` = $id";
	return execQuery($sql, $db);
}


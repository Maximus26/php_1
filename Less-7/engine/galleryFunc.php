<?php
/**
* функция получает массив фото из БД
* @return array
*/
function getImages(){
	$sql = getAssocResult("SELECT * FROM `images` ORDER BY `images`.`views` DESC");
	return $sql;
}

/**
* функция генерации галереи из массива
* @return string
*/
function createGallery($images){
	//инициализируем результирующую строку
	$gal_img = '';
	// получаем массив изоюражений из БД
	$images = getImages();

	foreach ($images as $image){
		$gal_img .= '<a href="galleryitem.php?id=' . $image['id'] . '" class="fancy">
						<img src="'. $image['url'] . '" alt="' . $image['title'] . '">
						<div class="hovered"></div>
					 </a>';
		}
	$gal = '<div class="slide">' . $gal_img . '</div>';
	return $gal;
}
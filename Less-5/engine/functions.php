<?php
//замена окончаний
function time_rus($n, $f1, $f2, $f3){
	$n10 = $n % 10;

	if($n >= 5 && $n < 20){
		echo $n . ' ' . $f1;
	} elseif($n10 == 1){
		echo $n . ' ' . $f2;
	} elseif($n10 >= 2 && $n10 <= 4){
		echo $n . ' ' . $f3;
	} else {
		echo $n . ' ' . $f1;
	}
}

//генерация меню
function menu($arr){
	$item = '';
	foreach($arr as $value){
		$item .= '<li><a href="' . $value['link'] . '">' . $value['title'] . '</a></li>';
	}
	$items = '<ul>' . $item . '</ul>';
	return $items;
}

//генерация галереи
/*function gallery($dir){
	$images = scandir($dir);
	$gal_img = '';
	foreach ($images as $image){
		if($image != '.' && $image != '..'){
			$gal_img .= '<a href="'. $dir . '/' . $image . '" class="fancy" rel="gallery">
						<img src="'. $dir . '/' . $image . '" alt="img">
						<div class="hovered"></div>
					 </a>';
		}
	}
	$gal = '<div class="slide">' . $gal_img . '</div>';
	return $gal;
}*/

//генерация галереи2
function gallery($images){
	$gal_img = '';
	foreach ($images as $img){
		$gal_img .= '<a href="galleryitem.php?id=' . $img['id'] . '" class="fancy" target="_blank">
						<img src="'. $img['url'] . '" alt="' . $img['title'] . '">
						<div class="hovered"></div>
					 </a>';
		}
	$gal = '<div class="slide">' . $gal_img . '</div>';
	return $gal;
}

//шаблонизатор
function render($file, $variables = [])
{
	if (!is_file($file)) {
		echo 'Template file "' . $file . '" not found';
		exit();
	}

	if (filesize($file) === 0) {
		echo 'Template file "' . $file . '" is empty';
		exit();
	}


	$templateContent = file_get_contents($file);

	if (empty($variables)) {
		return $templateContent;
	}

	foreach ($variables as $key => $value) {
		if (is_array($value)) {
			continue;
		}

		$key = '{{' . strtoupper($key) . '}}';

		$templateContent = str_replace($key, $value, $templateContent);
	}

	return $templateContent;
}
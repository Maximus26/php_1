<?php
function translit_replace_space($str){
	$arr = [
		'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'e', 'ж' => 'zh','з' => 'z', 'и' => 'i', 'й' => 'i', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch','ь' => '', 'ы' => 'y', 'ъ' => '',  'ш' => 'sh','щ' => 'sch', 'э' => 'e', 'ю' => 'yu','я' => 'ya','А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'E', 'Ж' => 'Zh','З' => 'Z', 'И' => 'I', 'Й' => 'I', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C', 'Ч' => 'Ch','Ш' => 'Sh','Щ' => 'Sch', 'Ь' => '',  'Ы' => 'Y', 'Ъ' => '',  'Э' => 'E', 'Ю' => 'Yu','Я' => 'Ya',
	];
	$res_str = strtr($str, $arr);
	return strtr( $res_str, ' ', '_');
}
echo translit_replace_space('Корабли лавировали, лавировали, так и не вылавировали.');
?>
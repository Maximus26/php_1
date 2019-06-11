<?php
$arr = [
    'Московская область:' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область:' => ['Санкт-Петербург', 'Ксеволожск', 'Кавловск', 'Кронштадт'],
    'Рязанская область:' => ['Рязань', 'Михайлов', 'Скопин', 'Сасово', 'Ряжск'],
    'Ставропольский край:' => ['Ставрополь', 'Ессентуки', 'Кисловодск', 'Невинномысск', 'Буденновск']
];
foreach ($arr as $region => $cities) {
	echo $region . '<br>';
	$city_display = '';
	foreach ($cities as $city) {
		if (mb_substr($city, 0, 1) == 'К') {
			$city_display .= $city . ', ';
		}
	}
	echo substr($city_display, 0, -2) . '<br><br>';
}
// а вот как вывести сообщение если в регионе нет городов на нужную букву, не допер
?>
<?php
function replace_space($str){
    return strtr( $str, ' ', '_');
}
echo replace_space('Вывод результата функции, которая заменяет в строке пробелы на подчеркивания.');
?>
<?php
// Задание №2: знакомство с документацией

// 1 задача
$f =__FILE__;
$n = __LINE__;

echo "название текущего файла - $f и номер текущей строки - $n \n";

// 2 задача

$big_text = <<<text01
Это первая строка.
Вторая строка.
А это третья строка.
text01;

echo $big_text . "\n";

// 3 задача
$a = 'Рыба';
$b = 'человек';

echo "$a рыбою сыта, а $b человеком \n";

// Задание №3: знакомство с документацией

$variable = 3.14;
// $variable = 3;
// $variable = 'one';
// $variable = true;
// $variable = null;
// $variable = [];

if (is_bool($variable)) {
    $type = 'bool';
} elseif (is_float($variable)) {
    $type = 'float';
} elseif (is_int($variable)) {
    $type = 'int';
} elseif (is_string($variable)) {
    $type = 'string';
} elseif (is_null($variable)) {
    $type = 'null';
} else {
    $type = 'other';
}
//  Ваш программный код, в котором переменной $type
//  присваивается одно из значений: bool, float, 
//  int, string, null или other

echo "type is $type";

// с помощью switch

switch (gettype($variable)) {
    case 'boolean': $type = 'bool'; break;    
    case 'double': $type = 'float'; break;
    case 'integer': $type = 'int'; break;
    case 'string': $type = 'string'; break;
    case 'NULL': $type = 'null'; break;
    default: $type = 'other';
}
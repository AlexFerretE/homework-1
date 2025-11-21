<?php
echo "Введите число 1: ";
$number01 = trim(fgets(STDIN));

if (!is_int($number01))   {
    echo "Введите целое число";
    $number01 = trim(fgets(STDIN));
};

if (!is_numeric($number01)) {
    fwrite(STDERR, "Введите, пожалуйста, число" . PHP_EOL);
    $number01 = trim(fgets(STDIN));
};

echo "Введите число 2: ";
$number02 = trim(fgets(STDIN));

if (!is_int($number01))   {
    echo "Введите целое число";
    $number01 = trim(fgets(STDIN));
};

if (!is_numeric($number02)) {
    fwrite(STDERR, "Введите, пожалуйста, число " . PHP_EOL);
    $number02 = trim(fgets(STDIN));
};

if ($number02 == 0) {
    fwrite(STDERR, "Делить на 0 нельзя" . PHP_EOL);
    echo "Введите другое число 2: ";
    $number02 = trim(fgets(STDIN));
};


fwrite(STDOUT, $number01/$number02 . PHP_EOL);
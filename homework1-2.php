<?php

function get_whole_number() {
    while (true) {
        echo "Введите целое число: ";
        $input = trim(fgets(STDIN));

        if (filter_var($input, FILTER_VALIDATE_INT) !== false) {
            return (int)$input;
        } else {
            fwrite(STDERR, "Ошибка: '{$input}' не является целым числом." . PHP_EOL);
        };
    }
}

function get_number() {
    while (true) {
        echo "Введите, пожалуйста, число: ";
        $input = trim(fgets(STDIN));

        if (is_numeric($input)) { // is_numeric() уже возвращает true/false
            return (float)$input; // Возвращаем как float, чтобы сохранить дроби
        } else {        
            fwrite(STDERR, "Ошибка: '{$input}' не является числом." . PHP_EOL);
        };
    }
}

// --- Основная логика ---

// Ввод числа 1
echo "Введите число 1: ";
$number01_input = trim(fgets(STDIN));

if (!is_numeric($number01_input)) {
    // Если первый ввод некорректен, вызываем функцию с циклом
    $number01 = get_number();
} else {
    // Если корректен, используем его
    $number01 = (float)$number01_input;
}

if (filter_var($number01, FILTER_VALIDATE_INT) === false) {
    // Если ввод некорректный, вызываем функцию, которая заставит пользователя вводить целое число до победного конца
    $number01 = get_whole_number();
}


// Ввод числа 2
echo "Введите число 2: ";
$number02_input = trim(fgets(STDIN));

if (!is_numeric($number02_input)) {
    $number02 = get_number();
} else {
    $number02 = (float)$number02_input;
}

if (filter_var($number02, FILTER_VALIDATE_INT) === false) {
    // Если ввод некорректный, вызываем функцию, которая заставит пользователя вводить целое число до победного конца
    $number01 = get_whole_number();
}

// Проверка на деление на ноль
if ($number02 == 0) {
    while (true) { 
        fwrite(STDERR, "Делить на 0 нельзя." . PHP_EOL);
        echo "Введите другое число 2 (не ноль): ";
        
        $input = trim(fgets(STDIN));
        
        if (is_numeric($input) && $input != 0) {
            $number02 = (float)$input;
            break;
        }
    }
};

// Вывод результата
fwrite(STDOUT, $number01 / $number02 . PHP_EOL);
?>

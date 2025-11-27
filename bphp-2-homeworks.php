<?php
// --- Функции ---

// Проверка на кирилицу
function containsCyrillic(&$text) {
    $check_result = preg_match('/[а-яёА-ЯЁ]/u', $text);

    if ($check_result === 0) {
        echo "Строка '$text' содержит не допустимые символы.\n" . "Используйте кирилицу: \n";
        $text = trim(fgets(STDIN));
        containsCyrillic($text);
    }
    // Форматирование регистров
    $text = mb_convert_case($text, MB_CASE_TITLE, 'UTF-8');
    return $text;
}

// --- Основная логика ---

// Ввод Фамилии
echo "Введите вашу фамилию: ";
$first_name_input = trim(fgets(STDIN));

// Вызов функции "Проверка на кирилицу"
containsCyrillic($first_name_input);

// Ввод Имени
echo "Введите ваше имя: ";
$last_name_input = trim(fgets(STDIN));

// Вызов функции "Проверка на кирилицу"
containsCyrillic($last_name_input);

// Ввод Отчества
echo "Введите ваше Отчество: ";
$sur_name_input = trim(fgets(STDIN));

// Вызов функции "Проверка на кирилицу"
containsCyrillic($sur_name_input);

// Извлечение первых букв
$first_initial = mb_substr($first_name_input, 0, 1, 'UTF-8');
$last_initial = mb_substr($last_name_input, 0, 1, 'UTF-8');
$sur_name_initial = mb_substr($sur_name_input, 0, 1, 'UTF-8');

$fullName = "$first_name_input $last_name_input $sur_name_input";
$fio = "$first_initial$last_initial$sur_name_initial";
$surnameAndInitials = "$last_name_input $first_initial.$sur_name_initial.";

echo "\nПолное имя: '$fullName' \nФамилия и инициалы: '$surnameAndInitials' \nАббревиатура: '$fio' \n";
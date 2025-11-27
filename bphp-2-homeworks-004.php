<?php
declare(strict_types=1);

// объявление констант и переменных
const OPERATION_EXIT = 0;
const OPERATION_ADD = 1;
const OPERATION_CHANGE = 2;
const OPERATION_DELETE = 3;
const OPERATION_PRINT = 4;

// объявление созданных функций 

function show_shopping_list($items) {
    echo 'Ваш список покупок: ' . PHP_EOL;
    echo implode("\n", $items) . "\n";
}

function operation_add(&$items) {
    echo "Введение название товара для добавления в список: \n> ";
    $itemName = trim(fgets(STDIN));
    $items[] = $itemName;
}

function operation_change(&$items) {
    echo "Введение название изменяемого товара: \n> ";
    $itemName = trim(fgets(STDIN));
    
    // Ищем значение в масиве
    $index = array_search($itemName, $items);

    if ($index !== false) {
        echo "Введите название товара для замены:0 \n> ";
        $itemChangeName = trim(fgets(STDIN));
        $items[$index] = $itemChangeName;
        echo "Товар изменён";
    } else {
        echo "Данный товар не найдет в списке, введите товар из списка: ";
        operation_change($items);
    }
}

function operation_delete(&$items) {
    // Проверить, есть ли товары в списке? Если нет, то сказать об этом и попросить ввести другую операцию
    show_shopping_list($items);

    echo 'Введение название товара для удаления из списка:' . PHP_EOL . '> ';
    $itemName = trim(fgets(STDIN));

    if (in_array($itemName, $items, true) !== false) {
        while (($key = array_search($itemName, $items, true)) !== false) {
        unset($items[$key]);
        }
    }
}

function operation_print(array $items) {
    show_shopping_list($items);
    echo 'Всего ' . count($items) . ' позиций. '. PHP_EOL;
    echo 'Нажмите enter для продолжения';
    fgets(STDIN);
}


// --- Основная логика ---
$operations = [
    OPERATION_EXIT => OPERATION_EXIT . '. Завершить программу.',
    OPERATION_ADD => OPERATION_ADD . '. Добавить товар в список покупок.',
    OPERATION_CHANGE => OPERATION_CHANGE . '. Изменить товар в списоке покупок.',
    OPERATION_DELETE => OPERATION_DELETE . '. Удалить товар из списка покупок.',
    OPERATION_PRINT => OPERATION_PRINT . '. Отобразить список покупок.',
];

$items = [];


do {
    system('cls');
//    system('cls'); // windows

    do {
        if (count($items)) {
            show_shopping_list($items);
        } else {
            echo 'Ваш список покупок пуст.' . PHP_EOL;
        }


        echo 'Выберите операцию для выполнения: ' . PHP_EOL;
        // Проверить, есть ли товары в списке? Если нет, то не отображать пункт про удаление товаров
        echo implode(PHP_EOL, $operations) . PHP_EOL . '> ';
        $operationNumber = trim(fgets(STDIN));

        if (!array_key_exists($operationNumber, $operations)) {
            system('cls');

            echo '!!! Неизвестный номер операции, повторите попытку.' . PHP_EOL;
        }

    } while (!array_key_exists($operationNumber, $operations));

    echo 'Выбрана операция: '  . $operations[$operationNumber] . PHP_EOL;

    switch ($operationNumber) {
        case OPERATION_ADD:
            operation_add($items);
            break;

        case OPERATION_CHANGE:
            operation_change($items);
            break;

        case OPERATION_DELETE:
            operation_delete($items);
            break;

        case OPERATION_PRINT:
            operation_print($items);
            break;
    }

    echo "\n ----- \n";
} while ($operationNumber > 0);

echo 'Программа завершена' . PHP_EOL;
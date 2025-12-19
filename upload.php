<?php
declare(strict_types=1);

$uploadDir = 'D:/CODING/ViCode Project/Netol/PHP/';
$maxFileSize = 10 * 1024 * 1024; // 10 МБ
$allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'application/pdf', 'text/plain'];

echo "<h3>Отладочная информация:</h3>";
echo "<pre>";
echo "REQUEST_METHOD: " . $_SERVER['REQUEST_METHOD'] . "\n";
echo "POST данные:\n";
print_r($_POST);
echo "\nFILES данные:\n";
print_r($_FILES);
echo "</pre>";

try {
    if (!isset($_POST['u_file_name'])) {
        throw new Exception('Отсутствует параметр file_name');
    }
    
    if ($_FILES['file_name']['size'] > $maxFileSize || !isset($_FILES['file_name'])) {
        throw new Exception('Нет файла или слишком большой');
    }  
    
    $userFileName = $_POST['u_file_name'] ?? '';
    $userFileName = trim($userFileName);
    $uploadFile = $uploadDir . $userFileName . substr($_FILES['file_name']['name'], -4);
    $sizeFile = $_FILES['file_name']['size'];

    if (move_uploaded_file($_FILES['file_name']['tmp_name'], $uploadFile)) {
        echo "Файл успешно загружен!<br>";
        echo "Имя файла: " . htmlspecialchars($userFileName) . "<br>";
        echo "Размер: " . $_FILES['file_name']['size'] . " байт<br>";
        echo "Путь: " . htmlspecialchars($uploadFile) . "<br>";
    } else {
        throw new Exception('Не удалось сохранить файл');
    }
    
} catch (Exception $e) {    
    header('Location: http://localhost:8000/bphp-2-homeworks-007.html');
    exit;
}
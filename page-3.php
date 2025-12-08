<?php
declare(strict_types=1);

session_start();

$_SESSION['number_of_sessions'] = ($_SESSION['number_of_sessions'] ?? 0) + 1;

$ses = $_SESSION['number_of_sessions'];

echo 'Это страница 3' . PHP_EOL;


if ($ses > 0 && $ses % 3 == 0) {
    header('Location: http://localhost:8000/page-4.php');
    exit();
}
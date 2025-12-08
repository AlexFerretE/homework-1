<?php
declare(strict_types=1);

session_start();

echo 'Это страница 4 <br>';
echo 'Количество ссесий на страницу №3: ' . $_SESSION['number_of_sessions'];
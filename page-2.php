<?php
declare(strict_types=1);

if (isset($_GET['text'])) {
    echo $text = $_GET['text'];
} else {
    echo "Это страница №2";
}
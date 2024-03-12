<?php

// Подключаем файл автозагрузки Composer
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/Employee.php';

// Создание экземпляра с корректными данными
$employee1 = new Employee(1, 'John Doe', 50000, '04-01-2020');

echo "<br>";

// Создание экземпляра с некорректными данными
$employee2 = new Employee('invalid_id', '', -1000, '');
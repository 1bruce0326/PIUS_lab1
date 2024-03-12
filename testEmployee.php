<?php

// Подключаем файл автозагрузки Composer
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/Employee.php';

// Создание экземпляра с корректными данными
$employee1 = new Employee(1, 'John Doe', 50000, '2020-01-04');
echo "Опыт работы: " . $employee1->getExperienceYears() . " года(лет)<br>";

echo "<br>";

// Создание экземпляра с некорректными данными
$employee2 = new Employee('invalid_id', '', -1000, '2021-03-12');
echo "Опыт работы: " . $employee2->getExperienceYears() . " года(лет)<br>";
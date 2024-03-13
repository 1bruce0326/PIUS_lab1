<?php

// Подключаем файл автозагрузки Composer
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/Employee.php';
require_once __DIR__ . '/src/Department.php';

//ex_2.1

// Создание экземпляра с корректными данными
$employee1 = new Employee(1, 'John Doe', 50000, '2020-01-04');
echo "Опыт работы: " . $employee1->getExperienceYears() . " года(лет)<br>";

echo "<br>";

// Создание экземпляра с некорректными данными
$employee2 = new Employee('invalid_id', '', -1000, '2021-03-12');
echo "Опыт работы: " . $employee2->getExperienceYears() . " года(лет)<br>";

echo "<br>";

//ex_2.2

$employees1 = [
    new Employee(1, 'ilya', 1, '2020-01-04'),
    new Employee(2, 'sasha', 55000, '2020-01-04'),
    new Employee(3, 'andrew', 74999, '2020-01-04')
];

$employees2 = [
    new Employee(1, 'ilya', 1, '2020-01-04'),
    new Employee(2, 'sasha', 55000, '2020-01-04'),
    new Employee(3, 'andrew', 74999, '2020-01-04')
];

$employees3 = [
    new Employee(1, 'nikita', 50000, '2020-01-04'),
    new Employee(1, 'oleg', 60000, '2020-01-04'),
    new Employee(1, 'vasya', 70000, '2020-01-04')
];

echo "<br>";

$department1 = new Department($employees1, 'Sales');
$department2 = new Department($employees2, 'Marketing');
$department3 = new Department($employees3, 'Finance');

$departments = [$department1, $department2, $department3];

Department::getMinSalaryDepartments($departments);

echo "<br>";

Department::getMaxSalaryDepartments($departments);

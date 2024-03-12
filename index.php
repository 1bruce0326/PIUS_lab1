<?php

// Подключаем файл автозагрузки Composer
require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validation;

// Создаем экземпляр валидатора
$validator = Validation::createValidator();

// Проводим валидацию строки
$violations = $validator->validate('Bernhard12', [
    new Length(['min' => 10]),
    new NotBlank(),
]);

// Если есть нарушения, выводим сообщения об ошибках
if (0 !== count($violations)) {
    foreach ($violations as $violation) {
        echo $violation->getMessage().'<br>';
    }
} else {
    echo "Строка прошла валидацию успешно!";
}

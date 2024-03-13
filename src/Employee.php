<?php

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;

class Employee
{
    private $id;
    private $name;
    private $salary;
    private $hireDate;

    public function __construct($id, $name, $salary, $hireDate)
    {
        $this->id = $id;
        $this->name = $name;
        $this->salary = $salary;
        $this->hireDate = new DateTime($hireDate);

        $this->validate();
    }

    private function validate()
    {
        $validator = Validation::createValidator();

        $violations = $validator->validate($this->id, [
            new Assert\NotBlank(),
            new Assert\Type(['type' => 'integer']),
            new Assert\Positive(),
        ]);
        $this->handleViolations($violations, 'id');

        $violations = $validator->validate($this->name, [
            new Assert\NotBlank(),
            new Assert\Length(['min' => 2]),
        ]);
        $this->handleViolations($violations, 'name');

        $violations = $validator->validate($this->salary, [
            new Assert\NotBlank(),
            new Assert\Type(['type' => 'integer']),
            new Assert\Positive(),
        ]);
        $this->handleViolations($violations, 'salary');

        $violations = $validator->validate($this->hireDate, [
            new Assert\NotBlank(),
        ]);
        $this->handleViolations($violations, 'hireDate');
    }

    private function handleViolations($violations, $fieldName)
    {
        if (0 !== count($violations)) {
            foreach ($violations as $violation) {
                echo "$fieldName: " . $violation->getMessage();
            }
        } else {
            echo "$fieldName: Валидация прошла успешно!";
        }
        echo "<br>";
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function getExperienceYears()
    {
        $currentDate = new DateTime();
        $difference = $currentDate->diff($this->hireDate);
        return $difference->y;
    }
}

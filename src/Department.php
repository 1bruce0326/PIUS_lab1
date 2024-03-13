<?php

class Department
{
    private $employees;
    private $name;

    public function __construct($employees, $name)
    {
        $this->employees = $employees;
        $this->name = $name;
    }

    public function getTotalSalary()
    {
        $totalSalary = 0;
        foreach ($this->employees as $employee) {
            $totalSalary += $employee->getSalary();
        }
        return $totalSalary;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmployeeCount() {
        return count($this->employees);
    }

    public static function getMinSalaryDepartments($departments) {
        $minSalary = $departments[0]->getTotalSalary();
        $minSalaryDepartments = [];
    
        for ($i = 1; $i < count($departments); $i++) {
            $totalSalary = $departments[$i]->getTotalSalary();
            if ($totalSalary < $minSalary) {
                $minSalary = $totalSalary;
            }
        }
        
        $maxEmployeeCount = 0;
        foreach ($departments as $department) {
            $totalSalary = $department->getTotalSalary();
            if ($totalSalary == $minSalary) {
                $minSalaryDepartments[] = $department;
                if ($department->getEmployeeCount() > $maxEmployeeCount)
                {
                    $maxEmployeeCount = $department->getEmployeeCount();
                }
            }
        }

        foreach ($minSalaryDepartments as $department){
            if ($department->getEmployeeCount() == $maxEmployeeCount)
            {
                echo "min total salary in " .$department->getName().": ".$department->getTotalSalary()." ye<br>";
            }
        }
    }

    public static function getMaxSalaryDepartments($departments) {
        $maxSalary = $departments[0]->getTotalSalary();
        $maxSalaryDepartments = [];
    
        for ($i = 1; $i < count($departments); $i++) {
            $totalSalary = $departments[$i]->getTotalSalary();
            if ($totalSalary > $maxSalary) {
                $maxSalary = $totalSalary;
            }
        }
        
        $maxEmployeeCount = 0;
        foreach ($departments as $department) {
            $totalSalary = $department->getTotalSalary();
            if ($totalSalary == $maxSalary) {
                $maxSalaryDepartments[] = $department;
                if ($department->getEmployeeCount() > $maxEmployeeCount)
                {
                    $maxEmployeeCount = $department->getEmployeeCount();
                }
            }
        }

        foreach ($maxSalaryDepartments as $department){
            if ($department->getEmployeeCount() == $maxEmployeeCount)
            {
                echo "max total salary in " .$department->getName().": ".$department->getTotalSalary()." ye<br>";
            }
        }
    }
}
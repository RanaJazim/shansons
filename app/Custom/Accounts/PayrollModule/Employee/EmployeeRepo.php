<?php

namespace App\Custom\Accounts\PayrollModule\Employee;

use App\MyPayroll\Employee;

class EmployeeRepo
{
    function fetchAll()
    {
        return Employee::all();
    }   

    function createData($input)
    {
        $attr = $this->validateData($input);
        return Employee::create($attr);
    }

    private function validateData($input)
    {
        return $input->validate([
            'name' => 'required',
            'salary' => 'required',
        ]);
    }
}


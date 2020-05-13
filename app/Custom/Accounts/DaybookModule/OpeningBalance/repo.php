<?php

namespace App\Custom\Accounts\DaybookModule\OpeningBalance;

use Exception;

class Repo 
{
    private $_service;

    function __construct()
    {
        $this->_service = new Service();
    }

    function fetchTodayBalance($date)
    {
        $todayTotalBalance = $this->_service->calculatingTodayBalance($date);
        $todayBalanceList = $this->_service->findAllTodayBalance($date);

        return compact('todayTotalBalance', 'todayBalanceList');
    }

    function storeRecord($input)
    {
        $attributes = $this->_validateData($input);
        $attributes['date'] = date("Y-m-d");

        return $this->_service->store($attributes);
    }

    function findById($id)
    {
        return $this->_service->findById($id);
    }

    function updateRecord($input, $id)
    {
        $existing = $this->findById($id);

        if ($existing->date != date("Y-m-d")) {
            throw new Exception("Cannot edit the record because date is not matched what we expect");
        };
        
        // update record
        $attributes = $this->_validateData($input);
        return $this->_service->update($attributes, $id);
    }

    function deleteRecord($id)
    {
        $existing = $this->findById($id);

        if ($existing->date != date("Y-m-d")) {
            throw new Exception("Cannot edit the record because date is not matched what we expect");
        };

        // delete record
        return $this->_service->delete($id);
    }



    private function _validateData($input)
    {
        return $input->validate([
            'amount' => 'required',
            'description' => 'required|min:5|max:255',
        ]);
    }
}
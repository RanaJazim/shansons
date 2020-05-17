<?php

namespace App\Custom\Accounts\DaybookModule\Daybook;

use App\Custom\Accounts\DaybookModule\Daybook\Service as DaybookService;
use App\Custom\Accounts\DaybookModule\OpeningBalance\Service as OpeningBalanceService;

class Repo
{
    private $_service;

    function __construct()
    {
        $this->_service = new DaybookService();
    }

    function calculatingTodayRemBalance($date)
    {
        $balance = $this->_gettingBalance($date);

        return $balance['today_opening_balance'] - $balance['today_daybook_balance'];
    }

    function find($date)
    {
        $balance = $this->_gettingBalance($date);
        $today_daybook_list = $this->_service->find($date);

        return compact("balance", "today_daybook_list");
    }

    function storeData($input) 
    {
        $attributes = $this->_validateData($input);

        return $this->_service->store($attributes);
    }

    private function _gettingBalance($date)
    {
        $balance_service = new OpeningBalanceService();
        $today_opening_balance = $balance_service->calculatingTodayBalance($date);

        $today_daybook_balance = $this->_service->todayDaybookAmount($date);
        
        return compact("today_opening_balance", "today_daybook_balance");
    }

    private function _validateData($input)
    {
        return $input->validate([
            'daybookCategory_id' => 'required',
            'description' => 'required|min:5|max:50',
            'price' => 'required',
        ]);
    }
}
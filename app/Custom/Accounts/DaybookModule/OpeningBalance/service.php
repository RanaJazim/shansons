<?php

namespace App\Custom\Accounts\DaybookModule\OpeningBalance;

use App\Models\MyDaybook\Openingbalance;

class Service 
{
    function findAllTodayBalance($date)
    {
        return Openingbalance::where('date', $date)
            ->get();
    }

    function calculatingTodayBalance($date)
    {
        return Openingbalance::where('date', $date)
            ->sum('amount');
    }

    function findById($id)
    {
        return Openingbalance::findOrFail($id);
    }

    function store($attr)
    {
        return Openingbalance::create($attr);
    }

    function update($attr, $id)
    {
        $existing = $this->findById($id);

        return $existing->update($attr);
    }

    function delete($id)
    {
        $existing = $this->findById($id);

        return $existing->delete();
    }
}
<?php

namespace App\Custom\Accounts\DaybookModule\Daybook;

use App\Models\MyDaybook\Daybook;

class Service
{
    function todayDaybookAmount($date)
    {
        return Daybook::where('date', $date)
            ->sum('price');
    }

    function find($date)
    {
        return Daybook::with('daybookCategory')
            ->where('date', $date)
            ->get();
    }

    function findById($id)
    {
        return Daybook::findOrFail($id);
    }

    function store($attr)
    {
        $today_date = date("Y-m-d");
        $attr['date'] = $today_date;

        return Daybook::create($attr);
    }

    function update($attr, $id)
    {
        $existing_daybook = $this->findById($id);

        return $existing_daybook->update($attr);
    }

    function delete($daybook)
    {
        return $daybook->delete();
    }
}
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
            ->get();
    }

    function store($attr)
    {
        $today_date = date("Y-m-d");
        $attr['date'] = $today_date;

        return Daybook::create($attr);
    }
}
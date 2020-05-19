<?php

namespace App\Custom\Accounts\DaybookModule\DaybookCategory;

use App\Models\Daybookcategory;

class Service
{
    function find()
    {
        return Daybookcategory::all();
    }

    function findWithDaybook($date) 
    {
        return Daybookcategory::with(['daybooks' => function($query) use ($date) {
            $query->where('date', $date);
        }])->get();
    }

    function findById($id)
    {
        return Daybookcategory::findOrFail($id);
    }

    function store($attr)
    {
        return Daybookcategory::create($attr);
    }

    function update($attr, $id)
    {
        $existing_record = $this->findById($id);

        return $existing_record->update($attr);
    }

    function delete($id)
    {
        return $this->findById($id)->delete();
    }
}
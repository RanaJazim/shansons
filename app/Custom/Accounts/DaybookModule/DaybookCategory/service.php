<?php

namespace App\Custom\Accounts\DaybookModule\DaybookCategory;

use App\Models\Daybookcategory;

class Service
{
    function find()
    {
        $sample = Daybookcategory::with('daybooks')->get();
        dd($sample->toArray());

        return Daybookcategory::all();
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
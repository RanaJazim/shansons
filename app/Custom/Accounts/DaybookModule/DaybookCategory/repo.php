<?php

namespace App\Custom\Accounts\DaybookModule\DaybookCategory;

use App\Custom\Accounts\DaybookModule\DaybookCategory\Service as DaybookCategoryService;

class Repo
{
    private $_service;

    function __construct()
    {
        $this->_service = new DaybookCategoryService();
    }

    function find()
    {
        return $this->_service->find();
    }

    function findWithAllDaybook($date)
    {
        return $this->_service->findWithDaybook($date);
    }

    function findById($id)
    {
        return $this->_service->findById($id);
    }

    function storeRecord($input)
    {
        $attributes = $this->_validateAttr($input);

        return $this->_service->store($attributes);
    }

    function updateRecord($input, $id)
    {
        $attributes = $this->_validateAttr($input);

        return $this->_service->update($attributes, $id);
    }

    function deleteRecord($id)
    {
        return $this->_service->delete($id);
    }

    private function _validateAttr($input)
    {
        return $input->validate([
            'name' => 'required|min:5|max:50',
        ]);
    }
}
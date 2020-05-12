<?php

namespace App\Http\Controllers\Daybook;

use App\Custom\Accounts\DaybookModule\DaybookCategory\Repo as DaybookCategoryRepo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DaybookCategoryController extends Controller
{
    private $_view;
    private $_repo;

    function __construct()
    {
        $this->_view = "panel.accounts.daybook.daybook_category";
        $this->_repo = new DaybookCategoryRepo();
    }

    function index()
    {
        return view("$this->_view.index", [
            'daybookCategories' => $this->_repo->find()
        ]);
    }

    function create() 
    {
        return view("$this->_view.create");
    }

    function store(Request $request)
    {
        $this->_repo->storeRecord($request);

        return back();
    }

    function edit($id)
    {
        return view("$this->_view.edit", [
            'category' => $this->_repo->findById($id)
        ]);
    }

    function update(Request $request, $id)
    {
        $this->_repo->updateRecord($request, $id);

        return redirect()->route('daybookCategory.index');
    }

    function destroy($id)
    {
        $this->_repo->deleteRecord($id);

        return back();
    }
}

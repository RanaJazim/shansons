<?php

namespace App\Http\Controllers\Daybook;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Custom\Accounts\DaybookModule\Daybook\Repo as DaybookRepo;
use App\Custom\Accounts\DaybookModule\DaybookCategory\Repo as DaybookCategoryRepo;

class DaybookController extends Controller
{
    private $_view;
    private $_repo;

    function __construct()
    {
        $this->_view = "panel.accounts.daybook";
        $this->_repo = new DaybookRepo();
    }

    function index(Request $request)
    {
        $today_daybook = $this->_repo->find($request->date);

        return view("$this->_view.index", [
            'today_balance'         => $today_daybook['balance'],   
            'today_daybook_list'    => $today_daybook['today_daybook_list'],
            "date"                  => $request->date,
        ]);
    }

    function create()
    {
        $today_date = date("Y-m-d");
        $balance = $this->_repo->calculatingTodayRemBalance($today_date);

        // if remaining_balance is 0 then it means you should add opening balance
        // then it should redirect to opening balance create page
        if ($balance <= 0) return redirect()->route('openingBalance.create');

        $daybook_category_repo = new DaybookCategoryRepo();

        return view("$this->_view.create", [
            "remaining_balance"     => $balance,
            "daybook_categories"    => $daybook_category_repo->find(),
        ]);
    }

    function store(Request $request)
    {
        $this->_repo->storeData($request);

        return back();
    }

    function edit($id)
    {
        $today_date = date("Y-m-d");
        $existing_daybook = $this->_repo->findRecord($id);

        $balance = $this->_repo->calculatingTodayRemBalance($today_date);
        $daybook_category_repo = new DaybookCategoryRepo();

        return view("$this->_view.edit", [
           "remaining_balance"  => $balance,
           "daybook_categories" => $daybook_category_repo->find(), 
           "existing_daybook"   => $existing_daybook
        ]);
    }

    function update(Request $request, $id)
    {
        $this->_repo->updateRecord($request, $id);

        return redirect()->route("daybook.index", ['date' => date("Y-m-d")]);
    }

    function destroy($id)
    {
        $this->_repo->deleteRecord($id);

        return back();
    }
}

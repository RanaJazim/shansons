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
            'today_balance' => $today_daybook['balance'],   
            'today_daybook_list' => $today_daybook['today_daybook_list'],
            "date" => $request->date,
        ]);
    }

    function create()
    {
        $today_date = date("Y-m-d");
        $balance = $this->_repo->calculatingTodayRemBalance($today_date);
        $daybook_category_repo = new DaybookCategoryRepo();

        return view("$this->_view.create", [
            "remaining_balance" => $balance,
            "daybook_categories" => $daybook_category_repo->find(),
        ]);
    }

    function store(Request $request)
    {
        $this->_repo->storeData($request);

        return back();
    }
}

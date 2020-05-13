<?php

namespace App\Http\Controllers\Daybook;

use App\Custom\Accounts\DaybookModule\OpeningBalance\Repo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class OpeningBalanceController extends Controller
{
    private $_view;
    private $_repo;

    function __construct()
    {
        $this->_view = "panel.accounts.daybook.opening_balance";
        $this->_repo = new Repo();
    }

    function index(Request $request)
    {
        // dd($request->all());
        // dd($request->date);
        // $this->_repo->fetchTodayBalance($request['date']);

        $openingBalance = $this->_repo->fetchTodayBalance($request->date);
        // dd($openingBalance);

        return view("$this->_view.index", [
            "todayOpeningBalance" => $openingBalance['todayTotalBalance'],
            "balanceList" => $openingBalance['todayBalanceList'],
            "date" => $request->date,
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
            "openingBalance" => $this->_repo->findById($id)
        ]);
    }

    function update(Request $request, $id)
    {
        $this->_repo->updateRecord($request, $id);

        return redirect()->route("openingBalance.index");
    }

    function destroy($id)
    {
        $this->_repo->deleteRecord($id);

        return back();
    }
}

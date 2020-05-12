<?php

namespace App\Http\Controllers\Daybook;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OpeningBalanceController extends Controller
{
    private $_view;

    function __construct()
    {
        $this->_view = "panel.accounts.daybook.opening_balance";
    }

    function index()
    {
        return view("$this->_view.index");
    }

    function create() 
    {
        return view("$this->_view.create");
    }
}

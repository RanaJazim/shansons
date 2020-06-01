<?php

namespace App\Http\Controllers\Payroll;

use App\Custom\Accounts\PayrollModule\Employee\EmployeeRepo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    private $view;
    private $repo;

    function __construct()
    {
        $this->view = "panel.accounts.payroll.employee";
        $this->repo = new EmployeeRepo();
    }

    function index()
    {
        return view("$this->view.index", [
            'employees' => $this->repo->fetchAll()
        ]);
    }

    function create()
    {
        return view("$this->view.create");
    }

    function store(Request $request)
    {
        return $request;
    }
}

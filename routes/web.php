<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Routes for dashboard
Route::get('/dashboard', function() {
    return view('panel.dashboard.header');
});

// Routes for daybook category
Route::resource('daybookCategory', 'Daybook\DaybookCategoryController');

// Routes for opening balance
Route::resource('openingBalance', 'Daybook\OpeningBalanceController');

// Routes for daybook
Route::get('/daybook/print', 'Daybook\DaybookController@print')->name('daybook.print');
Route::resource('daybook', 'Daybook\DaybookController');

// Routes for employee
Route::resource('employee', 'Payroll\EmployeeController');
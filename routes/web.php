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
Route::get('/daybookCategory', 'Daybook\DaybookCategoryController@index')
    ->name('daybookCategory.index');
Route::get('/daybookCategory/create', 'Daybook\DaybookCategoryController@create')
    ->name('daybookCategory.create');
Route::post('/daybookCategory', 'Daybook\DaybookCategoryController@store')
    ->name('daybookCategory.store');
Route::get('/daybookCategory/{daybookCategory}/edit', 'Daybook\DaybookCategoryController@edit')
    ->name('daybookCategory.edit');
Route::patch('/daybookCategory/{daybookCategory}', 'Daybook\DaybookCategoryController@update')
    ->name('daybookCategory.update');
Route::delete('/daybookCategory/{daybookCategory}', 'Daybook\DaybookCategoryController@destroy')
    ->name('daybookCategory.destroy');

// Routes for opening balance
Route::get('/openingBalance', 'Daybook\OpeningBalanceController@index');
Route::get('/openingBalance/create', 'Daybook\OpeningBalanceController@create');

// Routes for daybook
Route::get('/daybook', 'Daybook\DaybookController@index');
Route::get('/daybook/create', 'Daybook\DaybookController@create');
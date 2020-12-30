<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
/**
 * === DASHBOARD
 */
Route::redirect('/','employees');
// Route::get('/employees', 'EmployeeController@index')->name('employees');

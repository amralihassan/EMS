<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
/**
 * === DASHBOARD
 */
Route::redirect('/','dashboard');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

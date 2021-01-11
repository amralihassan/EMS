<?php

use Illuminate\Support\Facades\Config;

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    // CONFIGURATION
    Config::set('auth.defaults.guard', 'admin');
    Config::set('auth.defaults.passwords', 'users');

    // LOGIN
    Route::get('/login', 'AdminAuth@login')->name('login');
    Route::post('/signin', 'AdminAuth@signin')->name('signin');

    Route::group(['middleware' => 'admin'], function () {
        // LOGOUT
        Route::get('/logout', 'AdminAuth@logout')->name('logout');

        // ADMIN DASHBOARD
        Route::redirect('/', 'dashboard');
        Route::get('/dashboard', 'HomeController@index')->name('dashboard');

        // CHANGE SYSTEM LANG
        Route::get('/lang/{lang}', 'HomeController@lang')->name('lang');

        // MANAGE ADMINISTRATORS
        Route::resource('/administrators', 'AdminController')->except('destroy', 'show');
        Route::post('/administrators/destroy', 'AdminController@destroy')->name('administrators.destroy');
    });
});

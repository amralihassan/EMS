<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    // CONFIGURATION
    Config::set('auth.defaults.guard', 'admin');
    Config::set('auth.defaults.passwords', 'users');

    // LOGIN
    Route::get('/login', 'AdminAuth@login')->name('login');
    Route::post('/signin', 'AdminAuth@signin')->name('signin');

    Route::group(['middleware' => 'admin'], function () {
        // ACCESS DENIED
        Route::get('/access-denied','AccessDeniedController@accessDenied');
        // logs
        Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
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

        // CHANGE PASSWORD
        Route::get('/change-password','ProfileController@changePassword')->name('change.password');
        Route::post('/change-password','ProfileController@updatePassword')->name('update.password');

        // PROFILE
        Route::get('/profile','ProfileController@profile')->name('profile');
        Route::post('/profile','ProfileController@updateProfile')->name('update.profile');

        // GENERAL SETTINGS
        Route::get('/general-settings','GeneralSettingController@settings')->name('general.settings');
        Route::post('/general-settings','GeneralSettingController@updateSettings')->name('update.settings');

        // ROLES
        Route::resource('/roles', 'RoleController')->except('destroy');
        Route::post('/roles/destroy', 'RoleController@destroy')->name('roles.destroy');

        // ATTACH PERMISSION TO ROLE
        Route::post('/add-permissions','RoleController@addPermission')->name('add.permission');

        // DISPLAY ACTIVITY LOGS
        Route::get('/activities-logs','ActivityController@activities')->name('activities.logs');
        Route::get('/activities-logs/action/{id}','ActivityController@action')->name('activities.action');

    });
});

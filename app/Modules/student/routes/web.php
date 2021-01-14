<?php
use Illuminate\Support\Facades\Route;
$moduleName = basename(dirname(__DIR__));
/**
 * Since Laravel 5.2 the StartSession middleware has been moved from the global $middleware list to the
 * web middleware group in App\Http\Kernel.php. That means that if you need
 * session access for your routes you can use that middleware group
 */
Route::namespace (getNamespaceController($moduleName))->middleware(['web', 'admin', 'lang'])->group(function () use ($moduleName) {
    Route::prefix(buildPrefix($moduleName))->group(function () {
        Route::group(['namespace' => 'Settings', 'prefix' => 'settings'], function () {
            require 'settings.php';
        });

        // STUDENT DASHBOARD
        Route::get('dashboard', 'DashboardController@index')->name('students.dashboard');
    });
});

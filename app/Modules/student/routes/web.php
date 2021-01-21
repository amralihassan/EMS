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
            // STUDENT SETTINGS
            require 'settings.php';
        });

        // STUDENT DASHBOARD
        Route::get('dashboard', 'DashboardController@index')->name('students.dashboard');

        // CALCULATE STUDENT AGE
        Route::get('calculate-student-age', 'CalcStudentAgeController@index')->name('calc-age.index');
        Route::put('calculate-student-age', 'CalcStudentAgeController@calculate')->name('calc-age-student');

        // PARENTS
        Route::group(['namespace' => 'Parents', 'prefix' => 'parents'], function () {
            require 'parents.php';
        });

        // STUDENTS
        Route::group(['namespace' => 'Students', 'prefix' => 'students'], function () {
            require 'students.php';
        });
    });
});

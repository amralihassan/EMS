<?php
use Illuminate\Support\Facades\Route;

// STUDENTS
Route::resource('/students', 'StudentController')->except('destroy','create');
Route::get('students/create/{father_id}', 'StudentController@create')->name('students.create');
Route::post('students/destroy', 'StudentController@destroy')->name('students.destroy');
Route::get('students/print/{id}', 'StudentController@print')->name('students.print'); // print student application


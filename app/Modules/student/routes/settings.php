<?php
use Illuminate\Support\Facades\Route;

// ACADEMIC YEARS
Route::resource('academic-years', 'YearController')->except('destroy', 'show');
Route::post('academic-years/destroy', 'YearController@destroy')->name('academic-years.destroy');

// DIVISIONS
Route::resource('divisions', 'DivisionController')->except('destroy', 'show');
Route::post('divisions/destroy', 'DivisionController@destroy')->name('divisions.destroy');

// STAGES
Route::resource('stages', 'StageController')->except('destroy', 'show');
Route::post('stages/destroy', 'StageController@destroy')->name('stages.destroy');

// GRADES
Route::resource('grades', 'GradeController')->except('destroy', 'show');
Route::post('grades/destroy', 'GradeController@destroy')->name('grades.destroy');

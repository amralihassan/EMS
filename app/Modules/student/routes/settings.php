<?php
use Illuminate\Support\Facades\Route;

// ACADEMIC YEARS
Route::resource('academic-years', 'YearController')->except('destroy', 'show');
Route::post('academic-years/destroy', 'YearController@destroy')->name('academic-years.destroy');

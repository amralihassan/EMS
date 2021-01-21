<?php

use Illuminate\Support\Facades\Route;

Route::resource('parents','ParentController')->only('index','create','store');
Route::post('parents/destroy','ParentController@destroy')->name('parents.destroy');

// FATHER
Route::resource('fathers','FatherController')->only('edit','update','show');
Route::get('fathers/add-mother/{id}','FatherController@createMother')->name('mother.create');
Route::post('fathers/add-mother/store','FatherController@storeMother')->name('mother.store');


// MOTHER
Route::resource('mothers','MotherController')->only('edit','update','show');


<?php

use Illuminate\Support\Facades\Route;
use Spatie\Activitylog\Models\Activity;


/**
 * === DASHBOARD
 */

Route::redirect('/','admin/dashboard');

Route::get('/activity',function(){
    return Activity::all()->last();
});

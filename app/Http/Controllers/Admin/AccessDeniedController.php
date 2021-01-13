<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AccessDeniedController extends Controller
{
    public function accessDenied()
    {
        return view('access-denied');
    }
}

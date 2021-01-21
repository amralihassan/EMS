<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Operations\AdminOp;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // toastr()->success('Welcome');
        return view('home');
    }

    public function lang($lang)
    {
        if (AdminOp::updateLang($lang)) {
            session()->has('lang') ? session()->forget('lang') : '';
            // set new session
            $lang == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
        }

        return back();
    }
}

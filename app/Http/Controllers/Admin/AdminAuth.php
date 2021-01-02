<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuth extends Controller
{
    public function login()
    {
        if (session()->has('login') == true) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }
    public function signin(Request $request)
    {
        $remember_me = $request->input('remember_me') == 1 ? true : false;

        $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ], [
            'username.required' => trans('local.username_required'),
            'password.required' => trans('local.password_required'),
        ]);

        if (adminAuth()->attempt(
            ['username' => $request->input('username'), 'password' => $request->input('password')],
            $remember_me
        )) {
            if (authInfo()->status == trans('admin.inactive')) {

                toastr()->warning(trans('local.inactive_status'));
                return redirect()->route('login');
            }
            session()->put('login', true);

            if (!session()->has('lang')) {
                if (authInfo()->lang == 'ar') {
                    session()->put('lang', 'ar');
                } else {
                    session()->put('lang', 'en');
                }
            }
            return redirect()->route('dashboard');
        }
        toastr()->error(trans('local.invalid_username_password'));
        return redirect()->route('login');
    }

    public function logout()
    {
        adminAuth()->logout();
        session()->forget('login');

        return redirect()->route('login');
    }
}

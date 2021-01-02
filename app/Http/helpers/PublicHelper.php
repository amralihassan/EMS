<?php
if (!function_exists('adminAuth')) {
    function adminAuth()
    {
        return auth()->guard('admin');
    }
}

if (!function_exists('authInfo')) {
    function authInfo()
    {
        if (adminAuth()->check()) {
            $id = adminAuth()->user()->id;
            $userInfo = \App\Models\Admin::where('id', $id)->first();
            return $userInfo;
        }
    }
}

// page direction
if (!function_exists('dirPage')) {
    function dirPage()
    {
        if (session()->has('lang')) {
            if (session('lang') == 'ar') {
                return 'rtl';
            } else {
                return 'ltr';
            }
        } else {
            return 'ltr';
        }
    }
}
// page language
if (!function_exists('lang')) {
    function lang()
    {
        if (session()->has('lang')) {
            return session('lang');
        } else {
            if (adminAuth()->check()) {
                session()->put('lang', authInfo()->lang);
            }
            return session('lang');
        }
    }
}

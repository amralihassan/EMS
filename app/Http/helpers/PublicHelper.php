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

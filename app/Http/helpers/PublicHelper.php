<?php

use Student\Models\Settings\Year;


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

// general settings
if (!function_exists('settings')) {
    function settings()
    {
        return \App\Models\Setting::orderBy('id', 'desc')->first();
    }
}

if (!function_exists('currentYear')) {
    function currentYear()
    {
        $year = Year::current()->first();
        if (!empty($year)) {
            if ($year != null) {
                return $year->id;
            } else {
                return Year::orderBy('id', 'desc')->first()->id;
            }
        }
    }
}

if (!function_exists('checkYearStatus')) {
    function checkYearStatus($year_id)
    {
        $year_status = Student\Models\Settings\Year::findOrFail($year_id)->year_status;
        if ($year_status == trans('student::local.close')) {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('getYearAcademic')) {
    function getYearAcademic()
    {
        $year = Year::current()->first();

        if ($year != null) {
            $date = \DateTime::createFromFormat("Y-m-d", $year->start_from);
            return $date->format("y");
        }
        return '0000';
    }
}

if (!function_exists('fullAcademicYear')) {
    function fullAcademicYear($yearId = null)
    {
        $year = '';
        if (empty($yearId)) {
            $year = Year::current()->first();
        } else {
            $year = Year::where('id', $yearId)->first();
        }

        if ($year != null) {
            $date = \DateTime::createFromFormat("Y-m-d", $year->start_from);
            return $year->name;
        }
        return 'none';
    }
}

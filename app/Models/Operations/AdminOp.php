<?php

namespace App\Models\Operations;

use App\Interfaces\IMainOperations;
use App\Models\Admin;

class AdminOp extends Admin implements IMainOperations
{
    public static function _store($request)
    {
    }

    public static function _update($admin, $request)
    {
    }

    public static function _destroy($admin)
    {
    }
    public static function updateLang($lang)
    {
        Admin::where('id', authInfo()->id)->update(['lang' => $lang]);
        return true;
    }
}

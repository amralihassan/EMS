<?php

namespace App\Models\Operations;

use App\Interfaces\IFetchData;
use App\Interfaces\IMainOperations;
use App\Models\Admin;

class AdminOp extends Admin implements IMainOperations, IFetchData
{
    public static function _fetchAll()
    {
        return Admin::get();
    }

    public static function _fetchById($id)
    {
        return Admin::findOrFail($id);
    }

    public static function _store($request)
    {
        Admin::firstOrCreate($request->only(['en_name', 'ar_name', 'username', 'email', 'password', 'lang']));
        return true;
    }

    public static function _update($request, $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->update($request->except('_token', '_method', '/admin/admin/profile'));
    }

    public static function _destroy($request)
    {
        foreach (request('id') as $id) {
            Admin::destroy($id);
        }
        return true;
    }
    public static function updateLang($lang)
    {
        Admin::where('id', authInfo()->id)->update(['lang' => $lang]);
        return true;
    }

    public static function updatePassword($request)
    {
        $admin = Admin::findOrFail(authInfo()->id);
        $admin->update($request->only('password'));
        return true;
    }
}

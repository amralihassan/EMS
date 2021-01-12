<?php

namespace App\Models\Operations;

use App\Interfaces\IFetchData;
use App\Interfaces\IMainOperations;
use App\Models\Admin;
use Intervention\Image\Facades\Image;

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
        $admin = Admin::firstOrCreate($request->only(['en_name', 'ar_name', 'username', 'email', 'password', 'lang']));

        if ($request->hasFile('image_profile')) {

            if (file_exists('storage/admins/' . authInfo()->image_profile)) {
                unlink('storage/admins/' . authInfo()->image_profile);
            }

            $image = $request->file('image_profile');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(46, 46)->save(public_path('storage/admins/' . $filename));
            $admin->image_profile = $filename;
            $admin->save();
        }
        return true;
    }

    public static function _update($request, $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->update($request->except('_token', '_method', '/admin/admin/profile'));

        if ($request->hasFile('image_profile')) {

            if (file_exists('storage/admins/' . authInfo()->image_profile)) {
                unlink('storage/admins/' . authInfo()->image_profile);
            }

            $image = $request->file('image_profile');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(46, 46)->save(public_path('storage/admins/' . $filename));
            $admin->image_profile = $filename;
            $admin->save();
        }
        return true;
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

<?php

namespace Student\Models\Settings\Operations;

use App\Interfaces\IFetchData;
use App\Interfaces\IMainOperations;
use Student\Models\Settings\Design;
use Intervention\Image\Facades\Image;

class DesignOp extends Design implements IFetchData, IMainOperations
{
    private static function attributes()
    {
        return ['file_name', 'lang_type', 'admin_id'];
    }

    public static function _fetchAll()
    {
        return Design::latest();
    }

    public static function _fetchById($id)
    {
        return Design::findOrFail($id);
    }

    public static function _store($request)
    {
        $design = $request->user()->designs()->firstOrCreate($request->only(self::attributes()));

        if ($request->hasFile('file_name')) {
            $image = $request->file('file_name');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(220, 220)->save(public_path('storage/id-designs/' . $filename));
            $design->file_name = $filename;
            $design->save();

        }
        return true;
    }

    public static function _update($request, $id)
    {
        $design = Design::findOrFail($id);
        $design->update($request->only(self::attributes()));

        if ($request->hasFile('file_name')) {
            if (file_exists('storage/id-designs/' . $design->file_name)) {
                unlink('storage/id-designs/' . $design->file_name);
            }

            $image = $request->file('file_name');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(220, 220)->save(public_path('storage/id-designs/' . $filename));
            $design->file_name = $filename;
            $design->save();

        }
    }

    public static function _destroy($data)
    {
        foreach (request('id') as $id) {
            Design::destroy($id);
        }
        return true;
    }
}

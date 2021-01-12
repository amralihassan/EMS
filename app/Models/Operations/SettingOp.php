<?php

namespace App\Models\Operations;

use App\Models\Setting;
use Intervention\Image\Facades\Image;

class SettingOp extends Setting
{
    public static function updateSetting($request)
    {

        $data = Setting::first();
        $data->update($request->except('_token', '_method', 'query_string', 'logo', 'icon'));

        if ($request->hasFile('logo')) {
            // remove old
            if (file_exists('storage/settings/' . settings()->logo)) {
                unlink('storage/settings/' . settings()->logo);
            }
            $image = $request->file('logo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(128, 128)->save(public_path('storage/settings/' . $filename));
            $data->logo = $filename;
            $data->save();
        }

        if ($request->hasFile('icon')) {
            // remove old
            if (file_exists('storage/settings/' . settings()->icon)) {
                unlink('storage/settings/' . settings()->icon);
            }

            $image = $request->file('icon');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('storage/settings/' . $filename));
            $data->icon = $filename;
            $data->save();
        }

        return true;
    }
}

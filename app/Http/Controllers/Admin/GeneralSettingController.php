<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Operations\SettingOp;

class GeneralSettingController extends Controller
{
    public function settings()
    {
        return view('admin.settings.settings');
    }

    public function updateSettings(SettingRequest $request)
    {
        SettingOp::updateSetting($request);
        toastr()->success(trans('local.updated_success'));
        return redirect()->back();
    }
}

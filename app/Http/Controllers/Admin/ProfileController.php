<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\Operations\AdminOp;

class ProfileController extends Controller
{
    public function changePassword()
    {
        return view('admin.profile.change-password');
    }

    public function updatePassword(PasswordRequest $request)
    {
        AdminOp::updatePassword($request);
        toastr()->success(trans('local.password_updated'));
        return redirect()->back();
    }

    public function profile()
    {
        $admin = AdminOp::_fetchById(authInfo()->id);
        return view('admin.profile.profile', compact('admin'));
    }

    public function updateProfile(AdminRequest $request)
    {
        AdminOp::_update($request, authInfo()->id);
        toastr()->success(trans('local.updated_success'));
        return redirect()->back();
    }
}

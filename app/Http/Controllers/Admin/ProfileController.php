<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Models\Operations\AdminOp;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function changePassword()
    {
        return view('admin.admins.change-password');
    }

    public function updatePassword(PasswordRequest $request)
    {
        AdminOp::updatePassword($request);
        toastr()->success(trans('local.password_updated'));
        return redirect()->back();
    }
}

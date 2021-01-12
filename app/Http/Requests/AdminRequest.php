<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = request()->segment(3) == null ? authInfo()->id : request()->segment(3);

        return [
            'ar_name' => ['required', 'min:2', 'max:15'],
            'en_name' => ['required', 'min:2', 'max:15'],
            'email' => ['required', 'email', 'max:50', Rule::unique('admins')->ignore($id)],
            'password' => ['required', 'sometimes'],
            'confirm_password' => ['required', 'same:password', 'sometimes'],
            'username' => ['required', 'sometimes', Rule::unique('admins')->ignore($id)],
            'image_profile' => ['image','mimes:jpeg,png,jpg','max:256'],
        ];
    }

    public function messages()
    {
        return [
            'ar_name.required' => trans('local.ar_name_required'),
            'ar_name.min' => trans('local.ar_name_min_2'),
            'ar_name.max' => trans('local.ar_name_max_15'),
            'en_name.required' => trans('local.en_name_required'),
            'en_name.min' => trans('local.en_name_min_2'),
            'en_name.max' => trans('local.en_name_max_15'),
            'email.required' => trans('local.email_required'),
            'email.unique' => trans('local.email_unique'),
            'email.email' => trans('local.email_email'),
            'email.max' => trans('local.email_max_50'),
            'password.required' => trans('local.password_required'),
            'password.same' => trans('local.match_password'),
            'confirm_password.required' => trans('local.confirm_password_required'),
            'username.required' => trans('local.username_required'),
            'username.unique' => trans('local.username_unique'),
        ];
    }
}

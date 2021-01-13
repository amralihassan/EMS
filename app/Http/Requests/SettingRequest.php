<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
        return [
            'ar_school_name' => ['required', 'max:75', 'min:10'],
            'en_school_name' => ['required', 'max:75', 'min:10'],
            'ar_education_administration' => ['required', 'max:50', 'min:10'],
            'en_education_administration' => ['required', 'max:50', 'min:10'],
            'ar_governorate' => ['required', 'max:50', 'min:10'],
            'en_governorate' => ['required', 'max:50', 'min:10'],
            'email' => ['email', 'max:50', 'min:10'],
            'address' => ['max:100', 'min:10', 'nullable'],
            'contact1' => ['nullable', 'numeric'],
            'contact2' => ['numeric', 'nullable'],
            'contact3' => ['numeric', 'nullable'],
            'facebook' => ['max:50', 'nullable'],
            'youtube' => ['max:50', 'nullable'],
            'logo' => ['image', 'mimes:jpeg,png,jpg', 'max:256'],
            'icon' => ['image', 'mimes:ico'],
            'msg_maintenance' => ['max:190', 'nullable'],

        ];
    }

    public function messages()
    {
        return [
            'ar_school_name.required' => trans('local.ar_school_name_required'),
            'ar_school_name.max' => trans('local.ar_school_name_max'),
            'ar_school_name.min' => trans('local.ar_school_name_min'),
            'en_school_name.required' => trans('local.en_school_name_required'),
            'en_school_name.max' => trans('local.en_school_name_max'),
            'en_school_name.min' => trans('local.en_school_name_min'),
            'ar_education_administration.required' => trans('local.ar_education_administration_required'),
            'ar_education_administration.max' => trans('local.ar_education_administration_max'),
            'ar_education_administration.min' => trans('local.ar_education_administration_min'),
            'en_education_administration.required' => trans('local.en_education_administration_required'),
            'en_education_administration.max' => trans('local.en_education_administration_max'),
            'en_education_administration.min' => trans('local.en_education_administration_min'),
            'ar_governorate.required' => trans('local.ar_governorate_required'),
            'ar_governorate.max' => trans('local.ar_governorate_max'),
            'ar_governorate.min' => trans('local.ar_governorate_min'),
            'en_governorate.required' => trans('local.en_governorate_required'),
            'en_governorate.max' => trans('local.en_governorate_max'),
            'en_governorate.min' => trans('local.en_governorate_min'),
            'email.email' => trans('local.email_email'),
            'email.max' => trans('local.email_max'),
            'email.min' => trans('local.email_min'),
            'contact1.numeric' => trans('local.contact1_numeric'),
            'contact2.numeric' => trans('local.contact2_numeric'),
            'contact3.numeric' => trans('local.contact3_numeric'),
            'facebook.max' => trans('local.facebook_max'),
            'youtube.max' => trans('local.youtube_max'),
            'msg_maintenance.max' => trans('local.msg_maintenance_max'),
        ];
    }
}

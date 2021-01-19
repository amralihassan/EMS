<?php

namespace Student\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchoolRequest extends FormRequest
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
            'ar_name' => ['required', 'max:50'],
            'en_name' => ['required', 'max:50'],
            'school_government' => ['required', 'max:30'],
            'school_address' => ['required', 'max:100'],
        ];
    }
    public function messages()
    {
        return [
            'ar_name.required' => trans('student::local.ar_school_name_required'),
            'ar_name.max' => trans('student::local.ar_school_name_max50'),
            'en_name.required' => trans('student::local.en_school_name_required'),
            'en_name.max' => trans('student::local.en_school_name_max50'),
            'school_government.required' => trans('student::local.school_government_required'),
            'school_government.max' => trans('student::local.school_government_max30'),
            'school_address.required' => trans('student::local.school_address_required'),
            'school_address.max' => trans('student::local.school_address_max100'),
        ];
    }
}

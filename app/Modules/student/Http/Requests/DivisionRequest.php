<?php

namespace Student\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DivisionRequest extends FormRequest
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
            'ar_school_name' => ['required', 'max:50'],
            'en_school_name' => ['required', 'max:50'],
            'total' => ['required', 'numeric'],
            'sort' => ['required', 'numeric'],
        ];
    }
    public function messages()
    {
        return [
            'ar_name.required' => trans('student::local.ar_division_name_required'),
            'ar_name.max' => trans('student::local.ar_division_name_max'),
            'en_name.required' => trans('student::local.en_division_name_required'),
            'en_name.max' => trans('student::local.en_division_name_max'),
            'ar_school_name.required' => trans('student::local.ar_school_name_required'),
            'ar_school_name.max' => trans('student::local.ar_school_name_max'),
            'en_school_name.required' => trans('student::local.en_school_name_required'),
            'en_school_name.max' => trans('student::local.en_school_name_max'),
            'total.required' => trans('student::local.total_required'),
            'total.numeric' => trans('student::local.total_numeric'),
            'sort.required' => trans('student::local.sort_required'),
            'sort.numeric' => trans('student::local.sort_numeric'),
        ];
    }
}

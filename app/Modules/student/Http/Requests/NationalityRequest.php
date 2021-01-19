<?php

namespace Student\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NationalityRequest extends FormRequest
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
            'ar_male_name' => ['required', 'max:50'],
            'ar_female_name' => ['required', 'max:50'],
            'en_name' => ['required', 'max:50'],
            'sort' => ['required', 'numeric'],
        ];
    }
    public function messages()
    {
        return [
            'ar_male_name.required' => trans('student::local.ar_male_name_required'),
            'ar_male_name.max' => trans('student::local.ar_male_name_max50'),
            'ar_female_name.required' => trans('student::local.ar_female_name_required'),
            'ar_female_name.max' => trans('student::local.ar_female_name_max50'),
            'en_name.required' => trans('student::local.en_national_name_required'),
            'en_name.max' => trans('student::local.en_national_name_max50'),
            'sort.required' => trans('student::local.sort_required'),
            'sort.numeric' => trans('student::local.sort_numeric'),
        ];
    }
}

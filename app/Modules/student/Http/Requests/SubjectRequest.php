<?php

namespace Student\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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
            'ar_shortcut' => ['required', 'max:50'],
            'en_shortcut' => ['required', 'max:50'],
            'sort' => ['required', 'numeric'],
        ];
    }
    public function messages()
    {
        return [
            'ar_name.required' => trans('student::local.ar_subject_name_required'),
            'ar_name.max' => trans('student::local.ar_subject_name_max50'),
            'en_name.required' => trans('student::local.en_subject_name_required'),
            'en_name.max' => trans('student::local.en_subject_name_max50'),
            'ar_shortcut.required' => trans('student::local.ar_shortcut_required'),
            'ar_shortcut.max' => trans('student::local.ar_shortcut_max50'),
            'en_shortcut.required' => trans('student::local.en_shortcut_required'),
            'en_shortcut.max' => trans('student::local.en_shortcut_max50'),
            'sort.required' => trans('student::local.sort_required'),
            'sort.numeric' => trans('student::local.sort_numeric'),

        ];
    }
}

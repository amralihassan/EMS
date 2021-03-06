<?php

namespace Student\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StageRequest extends FormRequest
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
            'sort' => ['required', 'numeric'],
        ];
    }
    public function messages()
    {
        return [
            'ar_name.required' => trans('student::local.ar_stage_name_required'),
            'ar_name.max' => trans('student::local.ar_stage_name_max'),
            'en_name.required' => trans('student::local.en_stage_name_required'),
            'en_name.max' => trans('student::local.en_stage_name_max'),
            'sort.required' => trans('student::local.sort_required'),
            'sort.numeric' => trans('student::local.sort_numeric'),
        ];
    }
}

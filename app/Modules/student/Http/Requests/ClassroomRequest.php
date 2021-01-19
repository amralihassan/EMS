<?php

namespace Student\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassroomRequest extends FormRequest
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
            'total' => ['required', 'numeric'],
            'division_id' => ['required'],
            'grade_id' => ['required'],
            'year_id' => ['required'],

        ];
    }
    public function messages()
    {
        return [
            'ar_name.required' => trans('student::local.ar_classroom_name_required'),
            'ar_name.max' => trans('student::local.ar_classroom_name_max50'),
            'en_name.required' => trans('student::local.en_classroom_name_required'),
            'en_name.max' => trans('student::local.en_classroom_name_max50'),
            'total.required' => trans('student::local.total_required'),
            'total.numeric' => trans('student::local.total_numeric'),
            'division_id.required' => trans('student::local.division_id_required'),
            'grade_id.required' => trans('student::local.grade_id_required'),
            'year_id.required' => trans('student::local.year_id_required'),
            'sort.required' => trans('student::local.sort_required'),
            'sort.numeric' => trans('student::local.sort_numeric'),
        ];
    }
}

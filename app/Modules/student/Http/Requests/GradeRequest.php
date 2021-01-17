<?php

namespace Student\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradeRequest extends FormRequest
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
            'ar_online_name' => ['required', 'max:50'],
            'en_online_name' => ['required', 'max:50'],
            'from_age_year' => ['required', 'numeric'],
            'from_age_month' => ['required', 'numeric'],
            'to_age_year' => ['required', 'numeric'],
            'to_age_month' => ['required', 'numeric'],
            'stage_id' => ['required'],
            'sort' => ['required', 'numeric'],
        ];
    }
    public function messages()
    {
        return [
            'ar_name.required' => trans('student::local.ar_name_required'),
            'ar_name.max' => trans('student::local.ar_name_max'),
            'en_name.required' => trans('student::local.en_name_required'),
            'en_name.max' => trans('student::local.en_name_max'),
            'ar_online_name.required' => trans('student::local.ar_online_name_required'),
            'ar_online_name.max' => trans('student::local.ar_online_name_max'),
            'en_online_name.required' => trans('student::local.en_online_name_required'),
            'en_online_name.max' => trans('student::local.en_online_name_max'),
            'from_age_year.required' => trans('student::local.from_age_year_required'),
            'from_age_year.numeric' => trans('student::local.from_age_year_numeric'),
            'from_age_month.required' => trans('student::local.from_age_month_required'),
            'from_age_month.numeric' => trans('student::local.from_age_month_numeric'),
            'to_age_year.required' => trans('student::local.to_age_year_required'),
            'to_age_year.numeric' => trans('student::local.to_age_year_numeric'),
            'to_age_month.required' => trans('student::local.to_age_month_required'),
            'to_age_month.numeric' => trans('student::local.to_age_month_numeric'),
            'stage_id.required' => trans('student::local.stage_id_required'),
            'sort.required' => trans('student::local.sort_required'),
            'sort.numeric' => trans('student::local.sort_numeric'),
        ];
    }
}

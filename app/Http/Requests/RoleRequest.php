<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
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
        $id = request()->segment(3);
        return [
            'name' => ['required', Rule::unique('roles')->ignore($id)],
            'display_name' => ['required', Rule::unique('roles')->ignore($id)],
            'description' => ['required', Rule::unique('roles')->ignore($id)],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('local.name_required'),
            'name.unique' => trans('local.name_unique'),
            'display_name.required' => trans('local.display_name_required'),
            'description.required' => trans('local.description_required'),


        ];
    }
}

<?php

namespace Ecom\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = (!empty($this->id) ? $this->id : 'null');
        return [
            'name' => "required|unique:permissions,name,$id,id",
            'display_name' => "required|unique:permissions,display_name,$id,id",
        ];
    }
}

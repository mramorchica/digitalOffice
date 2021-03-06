<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $isUpdateRequest = !empty($this->request->all()['user_id']);

        return [
            'name' => 'required|min:8',
            'email' => ['required', 'string', 'email', 'max:255', ($isUpdateRequest) ? '' : 'unique:users'],
            'phone' => 'required',
            'role' => 'required',
            'department_id' => 'required',
            'position_id' => 'required',
            'level' => 'nullable'
        ];
    }
}

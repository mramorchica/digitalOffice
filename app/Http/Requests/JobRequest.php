<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'title' => 'required|min:3',
            'location' => 'required',
            'description' => 'required|min:10',
            'requirements' => 'required|min:10',
            'responsibilities' => 'required|min:10',
            'our_offer' => 'required|min:10',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'how_to_apply' => 'nullable',
            'position_id' => 'nullable|numeric',
            'department_id' => 'required|numeric',
            'responsible_user_id' => 'nullable|numeric',
        ];
    }
}

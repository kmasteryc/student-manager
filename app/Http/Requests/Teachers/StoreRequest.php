<?php

namespace App\Http\Requests\Teachers;

use App\Http\Requests\Request;
use Gate;

class StoreRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('store', $this->getTeacher());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_name' => 'required|string|unique:users,user_name',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
	        'password' => 'required|confirmed',
	        'email' => 'required|email|unique:users,email',
	        'info' => 'max:1000',
	        'subjects' => 'required'
        ];
    }
}

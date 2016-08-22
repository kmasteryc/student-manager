<?php

namespace App\Http\Requests\Parents;

use App\Http\Requests\Request;
use Gate;

class UpdateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
	    return true;
//        return Gate::allows('update', $this->getGrade());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
	    $id = $this->route('parent')->id;
	    return [
		    'user_name' => 'required|string|unique:users,user_name,'.$id,
		    'first_name' => 'required|string',
		    'last_name' => 'required|string',
		    'password' => 'confirmed',
		    'email' => 'required|email|unique:users,email,'.$id,
		    'info' => 'max:1000'
	    ];
    }
}

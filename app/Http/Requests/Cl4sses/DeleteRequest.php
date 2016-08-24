<?php

namespace App\Http\Requests\Cl4sses;

use App\Http\Requests\Request;
use Gate;

class DeleteRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
	    return true;
//        return Gate::allows('destroy', $this->getSemester());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}

<?php

namespace App\Http\Requests\Cl4sses;

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
//        return Gate::allows('update', $this->getCl4ss());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
//            'cl4ss_name' => 'required|unique:cl4sses,cl4ss_name,'.$this->getCl4ss()->id,
	        'cl4ss_type_id' => 'required|integer',
            'grade_id' => 'required|integer',
            'scholastic_id' => 'required|integer',
            'semester_id' => 'required|integer',
            'parent_id' => 'required|integer',
            'teacher_id' => 'required|integer',
        ];
    }
}

<?php

namespace App\Http\Requests\Cl4sses;

use App\Http\Requests\Request;
use App\Models\ClassLayer\Scholastic;
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
	    return true;
//        return Gate::allows('store', $this->getCl4ss());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cl4ss_name' => 'required',
            'grade_id' => 'required|integer',
            'scholastic_id' => 'required|integer',
            'semester_id' => 'required|integer',
            'parent_id' => 'required|integer',
            'teacher_id' => 'required|integer',
        ];
    }
}

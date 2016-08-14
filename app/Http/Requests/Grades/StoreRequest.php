<?php

namespace App\Http\Requests\Grades;

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
        return Gate::allows('store', $this->getGrade());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'grade_name' => 'required|unique:grades,grade_name',
        ];
    }
}

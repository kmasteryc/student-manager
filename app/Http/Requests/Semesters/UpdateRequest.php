<?php

namespace App\Http\Requests\Semesters;

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
        return Gate::allows('update', $this->getSemester());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'semester_name' => 'required|unique:semesters,semester_name,'.$this->getSemester()->id,
        ];
    }
}

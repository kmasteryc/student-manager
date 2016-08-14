<?php

namespace App\Http\Requests\Scholastics;

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
        return Gate::allows('update', $this->getScholastic());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'scholastic_from' => 'required|integer',
            'scholastic_to' => 'required|integer',
        ];
    }
}

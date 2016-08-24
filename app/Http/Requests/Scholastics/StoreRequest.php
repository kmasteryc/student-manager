<?php

namespace App\Http\Requests\Scholastics;

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
        return Gate::allows('store', $this->getScholastic());
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
            'scholastic_to' => 'required|integer'
        ];
    }
}

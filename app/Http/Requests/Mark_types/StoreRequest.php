<?php

namespace App\Http\Requests\Mark_types;

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
        return Gate::allows('store', $this->getMarkType());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'mark_type_name' => 'required|string|unique:mark_types,mark_type_name',
            'mark_type_multiple' => 'required|numeric',
        ];
    }
}

<?php

namespace App\Http\Requests\Subcategory;

use App\Http\Requests\UpdateRequest;
use App\Models\Subcategory;

class UpdateSubcategoryRequest extends UpdateRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<array>
     */
    public function rules()
    {
        return Subcategory::$rules;
    }
}

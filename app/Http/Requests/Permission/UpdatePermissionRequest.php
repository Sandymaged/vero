<?php

namespace App\Http\Requests\Permission;

use App\Http\Requests\UpdateRequest;
use App\Models\Permission;

class UpdatePermissionRequest extends UpdateRequest
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
        return Permission::$rules;
    }
}

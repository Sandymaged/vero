<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\UpdateRequest;
use App\Models\Admin;

class UpdateAdminRequest extends UpdateRequest
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
        Admin::$rules['email'] = 'required|string|email|max:255|unique:admins,email,' . $this->getSegmentFromEnd() . ',id';

        if (!$this->filled('password')) {
            unset(Admin::$rules['password']);
        }

        return Admin::$rules;
    }
}

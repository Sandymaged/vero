<?php

namespace App\Http\Requests\Merchant;

use App\Http\Requests\UpdateRequest;
use App\Models\Merchant;

class UpdateMerchantRequest extends UpdateRequest
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
        Merchant::$rules['email'] = 'required|string|email|max:255|unique:admins,email,' . $this->getSegmentFromEnd() . ',id';

        return Merchant::$rules;
    }
}

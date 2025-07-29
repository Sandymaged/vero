<?php

namespace App\Http\Requests\MerchantBranch;

use App\Models\MerchantBranch;
use Illuminate\Foundation\Http\FormRequest;

class StoreMerchantBranchRequest extends FormRequest
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
        return MerchantBranch::$rules;
    }
}

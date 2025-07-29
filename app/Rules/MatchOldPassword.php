<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

Illuminate\Database\Eloquent\Model;

class MatchOldPassword implements Rule
{
    private $model;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Hash::check($value, $this->model::find(request()->id)->password);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The specified :attribute does not match the current password.';
    }
}

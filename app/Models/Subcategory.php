<?php

namespace App\Models;

use App\Domain\Interfaces\Entities\ISubcategoryEntity;
use App\Scopes\SubcategoryScope;

/**
 * Class Subcategory
 * @package App\Models
 * @version June 18, 2021, 11:19 am UTC
 */
class Subcategory extends Category implements ISubcategoryEntity
{

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'state_id' => ["required", "exists:states,id"],
        'parent_id' => ["required", "exists:categories,id"],
        'name' => ["required", " string"]
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new SubcategoryScope());
    }
}

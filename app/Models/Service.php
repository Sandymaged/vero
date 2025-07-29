<?php

namespace App\Models;

use App\Domain\Interfaces\Entities\IServiceEntity;
use App\Scopes\ServiceScope;

/**
 * Class Service
 * @package App\Models
 * @version June 18, 2021, 11:19 am UTC
 */
class Service extends Category implements IServiceEntity
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function parent()
    {
        return $this->belongsTo(Subcategory::class, 'parent_id', 'id');
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new ServiceScope());
    }
}

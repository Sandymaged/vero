<?php

namespace App\Models;

use App\Domain\Entities\StateEntityTrait;
use App\Domain\Interfaces\Entities\IStateEntity;
use App\ValueObjects\BooleanValueObject;
use Illuminate\Database\Eloquent\Model;

/**
 * Class State
 * @package App\Models
 * @version June 18, 2021, 11:19 am UTC
 *
 * @property string name
 * @property BooleanValueObject is_active
 */
class State extends Model implements IStateEntity
{
    use StateEntityTrait;

    public $table = 'states';

    public $fillable = [
        'name',
        'is_active',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
//        'is_active' => IsActiveCast::class
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => ["required", " string"],
        'cities' => ["nullable", " array"],
        'cities.*.name' => ["required"]
    ];

    /**
     * New Attributes
     *
     * @var array
     */
    protected $appends = [
    ];

    // mutators

    public function getIsActiveAttribute(): BooleanValueObject
    {
        return new BooleanValueObject($this->attributes['is_active']);
    }

    public function setIsActiveAttribute(BooleanValueObject $isActive): void
    {
        $this->setIsActive($isActive);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cities()
    {
        return $this->hasMany(City::class, 'state_id', 'id');
    }
}

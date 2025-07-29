<?php

namespace App\Models;

use App\Domain\Entities\CityEntityTrait;
use App\Domain\Interfaces\Entities\ICityEntity;
use App\ValueObjects\BooleanValueObject;
use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 * @package App\Models
 * @version June 18, 2021, 11:19 am UTC
 *
 * @property string name
 * @property State state
 * @property integer state_id
 * @property BooleanValueObject is_active
 */
class City extends Model implements ICityEntity
{
    use CityEntityTrait;

    public $table = 'cities';

    public $fillable = [
        'name',
        'state_id',
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
        'state_id' => ["required", "exists:states,id"]
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

    // relations

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }
}

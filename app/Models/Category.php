<?php

namespace App\Models;

use App\Domain\Entities\CategoryEntityTrait;
use App\Domain\Interfaces\Entities\ICategoryEntity;
use App\Scopes\CategoryScope;
use App\ValueObjects\BooleanValueObject;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App\Models
 * @version June 18, 2021, 11:19 am UTC
 *
 * @property State state
 * @property Category parent
 * @property string name
 * @property integer state_id
 * @property integer parent_id
 * @property BooleanValueObject is_service
 * @property BooleanValueObject is_active
 */
class Category extends Model implements ICategoryEntity
{
    use CategoryEntityTrait;

    public $table = 'categories';

    const IMAGE_DIR = 'category';

    public $fillable = [
        'name',
        'state_id',
        'parent_id',
        'is_active',
        'is_service',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'state_id' => ["required", "exists:states,id"],
        'parent_id' => ["nullable", "exists:categories,id"],
        'name' => ["required", " string"],
        'subcategories' => ["nullable", " array"],
        'subcategories.*.name' => ["required"]
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

    public function setIsActiveAttribute(BooleanValueObject $boolean): void
    {
        $this->setIsActive($boolean);
    }

    public function getIsServiceAttribute(): BooleanValueObject
    {
        return new BooleanValueObject($this->attributes['is_service']);
    }

    public function setIsServiceAttribute(BooleanValueObject $boolean): void
    {
        $this->setIsService($boolean);
    }

    // relations

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'parent_id', 'id');
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new CategoryScope());
    }
}

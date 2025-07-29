<?php

namespace App\Models;

use App\Domain\Entities\MerchantBrabchEntityTrait;
use App\Domain\Interfaces\Entities\IMerchantBranchEntity;
use App\ValueObjects\BooleanValueObject;
use App\ValueObjects\ImageValueObject;
use App\ValueObjects\LocationValueObject;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MerchantBranch
 * @package App\Models
 * @version June 18, 2021, 11:19 am UTC
 *
 * @property State state
 * @property Merchant merchant
 * @property string name
 * @property integer state_id
 * @property integer merchant_id
 * @property ImageValueObject image
 * @property LocationValueObject location
 * @property string responsible_name
 * @property string responsible_phone
 * @property BooleanValueObject is_active
 */
class MerchantBranch extends Model implements IMerchantBranchEntity
{
    use SpatialTrait, MerchantBrabchEntityTrait;

    public $table = 'merchant_branches';

    const IMAGE_DIR = 'merchant_branch';

    protected $spatialFields = [
        'location'
    ];

    public $fillable = [
        'name',
        'state_id',
        'merchant_id',
        'image',
        'location',
        'responsible_name',
        'responsible_phone',
        'is_active',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
//        'image' => ImageCast::class,
//        'location' => LocationCast::class,
//        'is_active' => IsActiveCast::class
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'state_id' => ["required", "exists:states,id"],
        'merchant_id' => ["required", "exists:merchants,id"],
        'name' => ["required", " string"],
        'image' => ['nullable', 'mimes:jpeg,jpg,png,gif'],
        'location' => ['required', "array"],
        'location.latitude' => ['required', 'numeric', 'between:-90,90'],
        'location.longitude' => ['required', 'numeric', 'between:-180,180'],
        'responsible_name' => ['required'],
        'responsible_phone' => ['required']
    ];

    /**
     * New Attributes
     *
     * @var array
     */
    protected $appends = [
        'latitude',
        'longitude'
    ];

    /**
     * @return string
     */
    public function getLatitudeAttribute()
    {
        return $this->location ? sprintf("%.7f", $this->location->value['latitude']) : "";    // 40.7484404
    }

    /**
     * @return string
     */
    public function getLongitudeAttribute()
    {
        return $this->location ? sprintf("%.7f", $this->location->value['longitude']) : "";    // 40.7484404
    }

    // mutators
    public function getIsActiveAttribute(): BooleanValueObject
    {
        return new BooleanValueObject($this->attributes['is_active']);
    }

    public function setIsActiveAttribute(BooleanValueObject $boolean): void
    {
        $this->setIsActive($boolean);
    }

    public function getLocationAttribute(): LocationValueObject
    {
        return new LocationValueObject($this->attributes['location']);
    }

    public function setLocationAttribute(LocationValueObject $location): void
    {
        $this->setLocation($location);
    }

    public function getImagePathAttribute(): string
    {
        return (new ImageValueObject($this->attributes['image'], self::IMAGE_DIR))->image();
    }

    public function getImageAttribute(): ImageValueObject
    {
        return new ImageValueObject($this->attributes['image'], self::IMAGE_DIR);
    }

    public function setImageAttribute(ImageValueObject $image): void
    {
        $this->setImage($image);
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
    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'merchant_id', 'id');
    }
}

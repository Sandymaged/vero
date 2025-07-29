<?php

namespace App\Models;

use App\Domain\Entities\MerchantEntityTrait;
use App\Domain\Interfaces\Entities\IMerchantEntity;
use App\ValueObjects\BooleanValueObject;
use App\ValueObjects\EmailValueObject;
use App\ValueObjects\ImageValueObject;
use App\ValueObjects\LocationValueObject;
use App\ValueObjects\MerchantTypeValueObject;
use App\ValueObjects\UrlValueObject;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Merchant
 * @package App\Models
 * @version June 18, 2021, 11:19 am UTC
 *
 * @property State state
 * @property string name
 * @property integer state_id
 * @property ImageValueObject logo
 * @property ImageValueObject image
 * @property LocationValueObject location
 * @property float deposit_percentage
 * @property string admin_name
 * @property string admin_phone
 * @property string reservations_responsible_name
 * @property string reservations_responsible_phone
 * @property BooleanValueObject is_active
 * @property UrlValueObject video_url
 * @property EmailValueObject $email
 * @property MerchantTypeValueObject type
 */
class Merchant extends Model implements IMerchantEntity
{
    use SpatialTrait, MerchantEntityTrait;

    public $table = 'merchants';

    const IMAGE_DIR = 'merchant';

    protected $spatialFields = [
        'location'
    ];

    public $fillable = [
        'name',
        'state_id',
        'deposit_percentage',
        'type', // 1 for center, 2 for home
        'logo',
        'image',
        'video_url',
        'location',
        'admin_name',
        'reservations_responsible_name',
        'admin_phone',
        'reservations_responsible_phone',
        'email',
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
        'name' => ["required", " string"],
        'email' => ["required", " email", " unique:merchants"],
        'type' => ["required"],
        'deposit_percentage' => ["required"],
        'video_url' => ["nullable", "url"],
        'image' => ['nullable', 'mimes:jpeg,jpg,png,gif'],
        'logo' => ['required', 'mimes:jpeg,jpg,png,gif'],
        'location' => ['required'],
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

    public function getVideoUrlAttribute(): UrlValueObject
    {
        return new UrlValueObject($this->attributes['video_url']);
    }

    public function setVideoUrlAttribute(UrlValueObject $videoUrl): void
    {
        $this->setVideoUrl($videoUrl);
    }

    public function getIsActiveAttribute(): BooleanValueObject
    {
        return new BooleanValueObject($this->attributes['is_active']);
    }

    public function setIsActiveAttribute(BooleanValueObject $boolean): void
    {
        $this->setIsActive($boolean);
    }

    public function getTypeAttribute(): MerchantTypeValueObject
    {
        return new MerchantTypeValueObject($this->attributes['type']);
    }

    public function setTypeAttribute(MerchantTypeValueObject $type): void
    {
        $this->setType($type);
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

    public function getLogoPathAttribute(): string
    {
        return (new ImageValueObject($this->attributes['logo'], self::IMAGE_DIR))->image();
    }

    public function getLogoAttribute(): ImageValueObject
    {
        return new ImageValueObject($this->attributes['logo'], self::IMAGE_DIR);
    }

    public function setLogoAttribute(ImageValueObject $logo): void
    {
        $this->setLogo($logo);
    }

    public function getEmailAttribute(): EmailValueObject
    {
        return new EmailValueObject($this->attributes['email']);
    }

    public function setEmailAttribute(EmailValueObject $email): void
    {
        $this->setEmail($email);
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

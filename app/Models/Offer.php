<?php

namespace App\Models;

use App\Domain\Entities\OfferEntityTrait;
use App\Domain\Interfaces\Entities\IOfferEntity;
use App\ValueObjects\BooleanValueObject;
use App\ValueObjects\ImageValueObject;
use App\ValueObjects\OfferTypeValueObject;
use App\ValueObjects\UrlValueObject;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Offer
 * @package App\Models
 * @version June 18, 2021, 11:19 am UTC
 *
 * @property Merchant merchant
 * @property MerchantBranch merchantBranch
 * @property Category category
 * @property Category subcategory
 * @property Category service
 * @property string name
 * @property integer merchant_id
 * @property integer merchant_branch_id
 * @property integer category_id
 * @property integer subcategory_id
 * @property integer service_id
 * @property float price
 * @property float application_percentage
 * @property string extra_details
 * @property string notes
 * @property OfferTypeValueObject type
 * @property ImageValueObject image
 * @property UrlValueObject video_url
 * @property BooleanValueObject is_active
 */
class Offer extends Model implements IOfferEntity
{
    use OfferEntityTrait;

    public $table = 'offers';

    const IMAGE_DIR = 'offer';

    public $fillable = [
        'name',
        'merchant_id',
        'merchant_branch_id',
        'category_id',
        'subcategory_id',
        'service_id',
        'price',
        'application_percentage',
        'extra_details',
        'notes',
        'type',
        'image',
        'video_url',
        'is_active',
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
        'merchant_branch_id' => ["nullable", "exists:merchant_branches,id"],
        'merchant_id' => ["required", "exists:merchants,id"],
        'category_id' => ["required", "exists:categories,id"],
        'subcategory_id' => ["nullable", "exists:categories,id"],
        'service_id' => ["nullable", "exists:categories,id"],
        'name' => ["required", " string"],
        'image' => ['nullable', 'mimes:jpeg,jpg,png,gif'],
        'video_url' => ["nullable", "url"],
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

    public function getOfferTypeAttribute(): OfferTypeValueObject
    {
        return new OfferTypeValueObject($this->attributes['type']);
    }

    public function setOfferTypeAttribute(OfferTypeValueObject $type): void
    {
        $this->setType($type);
    }

    public function getVideoUrlAttribute(): UrlValueObject
    {
        return new UrlValueObject($this->attributes['video_url']);
    }

    public function setVideoUrlAttribute(UrlValueObject $videoUrl): void
    {
        $this->setVideoUrl($videoUrl);
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
    public function merchantBranch()
    {
        return $this->belongsTo(MerchantBranch::class, 'merchant_branch_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'merchant_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function subcategory()
    {
        return $this->belongsTo(Category::class, 'subcategory_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function service()
    {
        return $this->belongsTo(Category::class, 'service_id', 'id');
    }
}

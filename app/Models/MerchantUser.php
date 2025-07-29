<?php

namespace App\Models;

use App\Domain\Entities\MerchantUserEntityTrait;
use App\Domain\Interfaces\Entities\IMerchantUserEntity;
use App\ValueObjects\BooleanValueObject;
use App\ValueObjects\EmailValueObject;
use App\ValueObjects\ImageValueObject;
use App\ValueObjects\PasswordValueObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class MerchantBranch
 * @package App\Models
 * @version June 18, 2021, 11:19 am UTC
 *
 * @property Merchant merchant
 * @property MerchantBranch merchantBranch
 * @property string name
 * @property integer merchant_id
 * @property integer merchant_branch_id
 * @property ImageValueObject image
 * @property EmailValueObject $email
 * @property-write PasswordValueObject $password
 * @property BooleanValueObject is_active
 */
class MerchantUser extends Authenticatable implements IMerchantUserEntity
{
    use HasFactory, Notifiable, MerchantUserEntityTrait;

    public $table = 'merchant_users';

    const IMAGE_DIR = 'merchant_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_active',
        'image',
        'merchant_id',
        'merchant_branch_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
//        'email' => EmailCast::class,
//        'password' => PasswordCast::class,
//        'is_active' => BooleanValueObject::class,
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'merchant_id' => ["required", "exists:merchants,id"],
        'merchant_branch_id' => ["nullable", "exists:merchant_branches,id"],
        'name' => ["required", " string"],
        'password' => ['required', 'string', 'confirmed', 'min:6'],
        'email' => ["required", " email", " unique:merchant_users"],
        'image' => ['nullable', 'mimes:jpeg,jpg,png,gif'],
    ];

    // mutators

    public function getEmailAttribute(): EmailValueObject
    {
        return new EmailValueObject($this->attributes['email']);
    }

    public function setEmailAttribute(EmailValueObject $email): void
    {
        $this->setEmail($email);
    }

    public function getIsActiveAttribute(): BooleanValueObject
    {
        return new BooleanValueObject($this->attributes['is_active']);
    }

    public function setIsActiveAttribute(BooleanValueObject $isActive): void
    {
        $this->setIsActive($isActive);
    }

    public function getPasswordAttribute(): PasswordValueObject
    {
        return new PasswordValueObject($this->attributes['password']);
    }

    public function setPasswordAttribute(PasswordValueObject $password): void
    {
        $this->setPassword($password);
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
    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'merchant_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function merchantBranch()
    {
        return $this->belongsTo(MerchantBranch::class, 'merchant_branch_id', 'id');
    }
}

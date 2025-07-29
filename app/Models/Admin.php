<?php

namespace App\Models;

use App\Domain\Entities\AdminEntityTrait;
use App\Domain\Interfaces\Entities\IAdminEntity;
use App\ValueObjects\BooleanValueObject;
use App\ValueObjects\EmailValueObject;
use App\ValueObjects\ImageValueObject;
use App\ValueObjects\PasswordValueObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class Admin
 * @package App\Models
 * @version June 18, 2021, 11:19 am UTC
 *
 * @property string name
 * @property ImageValueObject image
 * @property EmailValueObject $email
 * @property-write PasswordValueObject $password
 * @property BooleanValueObject is_active
 */
class Admin extends Authenticatable implements IAdminEntity
{
    use AdminEntityTrait;

    use HasFactory;
    use Notifiable;
    use HasRoles;

    public $table = 'admins';

    const IMAGE_DIR = 'admin';

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
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => ["required", " string"],
        'password' => ['required', 'string', 'confirmed', 'min:6'],
        'email' => ["required", " email", " unique:admins"],
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
}

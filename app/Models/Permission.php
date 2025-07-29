<?php

namespace App\Models;

use App\Domain\Entities\PermissionEntityTrait;
use App\Domain\Interfaces\Entities\IPermissionEntity;

/**
 * Class Permission
 * @package App\Models
 * @version June 18, 2021, 11:19 am UTC
 *
 * @property string name
 * @property string guard_name
 */
class Permission extends \Spatie\Permission\Models\Permission implements IPermissionEntity
{
    use PermissionEntityTrait;

    public $table = 'permissions';

    const IMAGE_DIR = 'permission';

    public $fillable = [
        'name',
        'guard_name',
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
        'name' => ["required", " string"],
        'guard_name' => ["required", " string"]
    ];

    /**
     * New Attributes
     *
     * @var array
     */
    protected $appends = [
    ];

    // mutators

    // relations
}

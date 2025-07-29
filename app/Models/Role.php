<?php

namespace App\Models;

use App\Domain\Entities\RoleEntityTrait;
use App\Domain\Interfaces\Entities\IRoleEntity;

/**
 * Class Role
 * @package App\Models
 * @version June 18, 2021, 11:19 am UTC
 *
 * @property string name
 * @property string guard_name
 */
class Role extends \Spatie\Permission\Models\Role implements IRoleEntity
{
    use RoleEntityTrait;

    public $table = 'roles';

    const IMAGE_DIR = 'role';

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

<?php

namespace App\Repositories;


use App\Domain\Interfaces\Repositories\IAdminRepository;
use App\Domain\Interfaces\Entities\IAdminEntity;
use App\Models\Admin;

/**
 * Class IAdminRepository
 * @package App\Repositories
 * @version July 10, 2018, 11:44 am UTC
 *
 * @method Admin findWithoutFail($id, $columns = ['*'])
 * @method Admin find($id, $columns = ['*'])
 * @method Admin first($columns = ['*'])
*/
class AdminRepository extends AppBaseRepository implements IAdminRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name',
        'email',
        'is_active'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Admin::class;
    }

    public function exists(IAdminEntity $user): bool
    {
        return $this->model->where([
            'name' => $user->getName(),
            'email' => (string)$user->getEmail(),
        ])->exists();
    }
}

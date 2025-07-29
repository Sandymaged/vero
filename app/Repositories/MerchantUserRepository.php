<?php

namespace App\Repositories;


use App\Domain\Interfaces\Repositories\IMerchantUserRepository;
use App\Domain\Interfaces\Entities\IMerchantUserEntity;
use App\Models\MerchantUser;

/**
 * Class IMerchantUserRepository
 * @package App\Repositories
 * @version July 10, 2018, 11:44 am UTC
 *
 * @method MerchantUser findWithoutFail($id, $columns = ['*'])
 * @method MerchantUser find($id, $columns = ['*'])
 * @method MerchantUser first($columns = ['*'])
*/
class MerchantUserRepository extends AppBaseRepository implements IMerchantUserRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name',
        'email',
        'is_active',
        'merchant_id',
        'merchant_branch_id',
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
        return MerchantUser::class;
    }

    public function exists(IMerchantUserEntity $user): bool
    {
        return $this->model->where([
            'name' => $user->getName(),
            'email' => (string)$user->getEmail(),
        ])->exists();
    }
}

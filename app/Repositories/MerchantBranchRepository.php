<?php

namespace App\Repositories;

use App\Domain\Interfaces\Repositories\IMerchantBranchRepository;
use App\Models\MerchantBranch;

/**
 * Class IMerchantBranchRepository
 * @package App\Repositories
 * @version July 10, 2018, 11:44 am UTC
 *
 * @method MerchantBranch findWithoutFail($id, $columns = ['*'])
 * @method MerchantBranch find($id, $columns = ['*'])
 * @method MerchantBranch first($columns = ['*'])
*/
class MerchantBranchRepository extends AppBaseRepository implements IMerchantBranchRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name',
        'state_id',
        'merchant_id',
        'location',
        'is_active',
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
        return MerchantBranch::class;
    }
}

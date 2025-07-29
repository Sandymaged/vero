<?php

namespace App\Repositories;

use App\Domain\Interfaces\Repositories\IMerchantRepository;
use App\Models\Merchant;

/**
 * Class IMerchantRepository
 * @package App\Repositories
 * @version July 10, 2018, 11:44 am UTC
 *
 * @method Merchant findWithoutFail($id, $columns = ['*'])
 * @method Merchant find($id, $columns = ['*'])
 * @method Merchant first($columns = ['*'])
*/
class MerchantRepository extends AppBaseRepository implements IMerchantRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name',
        'state_id',
        'deposit_percentage',
        'type', // 1 for center, 2 for home
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
        return Merchant::class;
    }
}

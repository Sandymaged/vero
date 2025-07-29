<?php

namespace App\Repositories;

use App\Domain\Interfaces\Repositories\IOfferRepository;
use App\Models\Offer;

/**
 * Class IOfferRepository
 * @package App\Repositories
 * @version July 10, 2018, 11:44 am UTC
 *
 * @method Offer findWithoutFail($id, $columns = ['*'])
 * @method Offer find($id, $columns = ['*'])
 * @method Offer first($columns = ['*'])
*/
class OfferRepository extends AppBaseRepository implements IOfferRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
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
        return Offer::class;
    }
}

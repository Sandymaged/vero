<?php

namespace App\Repositories;

use App\Domain\Interfaces\Repositories\ISubcategoryRepository;
use App\Models\Subcategory;

/**
 * Class ISubcategoryRepository
 * @package App\Repositories
 * @version July 10, 2018, 11:44 am UTC
 *
 * @method Subcategory findWithoutFail($id, $columns = ['*'])
 * @method Subcategory find($id, $columns = ['*'])
 * @method Subcategory first($columns = ['*'])
*/
class SubcategoryRepository extends AppBaseRepository implements ISubcategoryRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name',
        'state_id',
        'parent_id',
        'is_active',
        'is_service',
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
        return Subcategory::class;
    }
}

<?php

namespace App\Repositories;

use App\Domain\Interfaces\Repositories\ICityRepository;
use App\Models\City;

/**
 * Class CityRepository
 * @package App\Repositories
 * @version July 10, 2018, 11:44 am UTC
 *
 * @method City findWithoutFail($id, $columns = ['*'])
 * @method City find($id, $columns = ['*'])
 * @method City first($columns = ['*'])
*/
class CityRepository extends AppBaseRepository implements ICityRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name',
        'state_id',
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
        return City::class;
    }
}

<?php

namespace App\Repositories;

use App\Domain\Interfaces\Repositories\IStateRepository;
use App\Models\State;

/**
 * Class IStateRepository
 * @package App\Repositories
 * @version July 10, 2018, 11:44 am UTC
 *
 * @method State findWithoutFail($id, $columns = ['*'])
 * @method State find($id, $columns = ['*'])
 * @method State first($columns = ['*'])
*/
class StateRepository extends AppBaseRepository implements IStateRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name',
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
        return State::class;
    }
}

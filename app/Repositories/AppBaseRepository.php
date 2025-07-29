<?php

namespace App\Repositories;

use Carbon\Carbon;
use Prettus\Repository\Eloquent\BaseRepository;


/**
 * Class AppBaseRepository
 * @package App\Repositories
 * @version June 20, 2021, 4:29 pm UTC
 *
 */
class AppBaseRepository extends BaseRepository
{
    public function model()
    {
        // TODO: Implement model() method.
    }

    public function upsert(array $values, array $uniqueKeys)
    {
        if (!empty($values)) {
            $updateValues = array_diff(array_keys($values[0]), $uniqueKeys);
            $this->getModel()->upsert($values, $uniqueKeys, $updateValues);
        }
    }

    public function getLatest()
    {

        $this->applyCriteria();
        $this->applyScope();

        $results = $this->model->latest()->get();

        $this->resetModel();
        $this->resetScope();

        return $this->parserResult($results);

    }

    public function bulkUpdateValues(array $values)
    {
        $values = array_map(function (array $i) {
            return $i + array('updated_at' => Carbon::now());
        }, $values);

        $tableName = $this->getModel()->getTable();

        if ($tableName && !empty($values)) {

            // column or fields to update
            $updateColumn = array_keys($values[0]);
            $referenceColumn = $updateColumn[0]; //e.g id
            unset($updateColumn[0]);
            $whereIn = "";

            $q = "UPDATE " . $tableName . " SET ";
            foreach ($updateColumn as $uColumn) {
                $q .= $uColumn . " = CASE ";

                foreach ($values as $data) {
                    $q .= "WHEN " . $referenceColumn . " = " . $data[$referenceColumn] . " THEN '" . (!empty($data[$uColumn]) ? $data[$uColumn] : $uColumn) . "' ";
                }
                $q .= "ELSE " . $uColumn . " END, ";
            }
            foreach ($values as $data) {
                $whereIn .= "'" . $data[$referenceColumn] . "', ";
            }
            $q = rtrim($q, ", ") . " WHERE " . $referenceColumn . " IN (" . rtrim($whereIn, ', ') . ")";

            // Update
            \DB::update(\DB::raw($q));

        }
    }
}

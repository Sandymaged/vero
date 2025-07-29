<?php

namespace App\DataTables;

use App\Models\CustomField;
use App\Models\MerchantBranch;
use Barryvdh\DomPDF\Facade as PDF;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class MerchantBranchDataTable extends DataTable
{
    /**
     * custom fields columns
     * @var array
     */
    public static $customFields = [];

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        $columns = array_column($this->getColumns(), 'data');
        $dataTable = $dataTable
            ->editColumn('created_at', function ($station) {
                return getDateColumn($station, 'created_at');
            })
            ->editColumn('updated_at', function ($station) {
                return getDateColumn($station, 'updated_at');
            })
            ->editColumn('is_active', function ($station) {
                return getBooleanColumn($station, 'is_active');
            })
            ->addColumn('action', 'stations.datatables_actions')
            ->addColumn('checkbox', 'stations.datatables_checkbox')
            ->rawColumns(array_merge($columns, ['action', 'checkbox']));

        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param MerchantBranch $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MerchantBranch $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addCheckbox(['class' => 'checkbox icheck table-checkbox', 'printable' => false, 'defaultContent' => 'stations'], true)
            ->addAction(['width' => '80px', 'printable' => false, 'responsivePriority' => '100', 'title' => trans('lang.actions')])
            ->parameters(array_merge(
                config('datatables-buttons.parameters'), [
                    'language' => json_decode(
                        file_get_contents(base_path('resources/lang/' . app()->getLocale() . '/datatable.json')
                        ), true)
                ]
            ));
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'data' => 'is_active',
                'name' => 'is_active',
                'title' => trans('station.station_is_active'),

            ]
            ,
            [
                'data' => 'created_at',
                'name' => 'created_at',
                'title' => trans('station.station_created_at'),
                'searchable' => false,
            ]
            ,
            [
                'data' => 'updated_at',
                'name' => 'updated_at',
                'title' => trans('station.station_updated_at'),
                'searchable' => false,
            ]

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'stationsdatatable_' . time();
    }

    /**
     * Export PDF using DOMPDF
     * @return mixed
     */
    public function pdf()
    {
        $data = $this->getDataForPrint();
        $pdf = PDF::loadView($this->printPreview, compact('data'));
        return $pdf->download($this->filename() . '.pdf');
    }
}

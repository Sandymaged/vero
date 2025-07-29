<?php

namespace App\Domain\UseCases\Merchant\PaginateMerchant;

use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IMerchantRepository;
use Yajra\DataTables\Facades\DataTables;

class PaginateMerchantInteractor implements IPaginateMerchantInputPort
{

    private $output;
    private $repository;

    public function __construct(
        IPaginateMerchantOutputPort $output,
        IMerchantRepository         $repository
    )
    {
        $this->output = $output;
        $this->repository = $repository;
    }

    public function listMerchant(PaginateMerchantRequestModel $model): IViewModel
    {
        try {

            $data = $this->repository->select('merchants.*')->with(['state']);
            $merchants = Datatables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('layouts.commons.datatables_actions')
                        ->with('model', 'merchants')->with('row', $row);
                })
                ->addColumn('checkbox', function ($row) {
                    return view('layouts.commons.datatables_checkbox')
                        ->with('row', $row);
                })
                ->editColumn('image', function ($row) {
                    return view('layouts.commons.datatables_image')
                        ->with('name', $row->name)->with('image', $row->image_path);
                })
                ->editColumn('is_active', function ($row) {
                    return getIsActive($row->is_active);
                })
                ->editColumn('name', function ($row) {
                    return $row->name;
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y, h:i a');
                })
                ->filter(function ($instance) {
                    if (request()->filled('is_active')) {
                        $instance->where('is_active', request()->get('is_active'));
                    }

                    if (request()->filled('state_id')) {
                        $instance->where('state_id', request()->get('state_id'));
                    }
                })
                ->escapeColumns([])
                ->rawColumns(['action', 'checkbox'])
                ->make(true);

        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->merchantPaginateed(
            new PaginateMerchantResponseModel($merchants)
        );
    }
}

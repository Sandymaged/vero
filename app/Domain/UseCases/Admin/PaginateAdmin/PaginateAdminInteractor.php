<?php

namespace App\Domain\UseCases\Admin\PaginateAdmin;

use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IAdminRepository;
use Yajra\DataTables\Facades\DataTables;

class PaginateAdminInteractor implements IPaginateAdminInputPort
{

    private $output;
    private $repository;

    public function __construct(
        IPaginateAdminOutputPort $output,
        IAdminRepository         $repository
    )
    {
        $this->output = $output;
        $this->repository = $repository;
    }

    public function listAdmin(PaginateAdminRequestModel $model): IViewModel
    {
        try {

            $data = $this->repository->select('admins.*')->with(['roles']);
            $admins = Datatables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('layouts.commons.datatables_actions')
                        ->with('model', 'admins')->with('row', $row);
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
                ->editColumn('email', function ($row) {
                    return $row->email;
                })
                ->editColumn('name', function ($row) {
                    return $row->name;
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y, h:i a');
                })
                ->addColumn('roles', function ($row) {
                    $html = '';
                    foreach ($row->roles as $role) {
                        $html .= '<span class="badge badge-light-info fs-7 m-1">' . $role->name . '</span>';
                    }
                    return $html;
                })
                ->filter(function ($instance) {
                    if (request()->filled('is_active')) {
                        $instance->where('is_active', request()->get('is_active'));
                    }

                    if (request()->filled('role_id')) {
                        $instance->whereHas('roles', function ($query){
                            $query->where('id', request()->get('role_id'));
                        });
                    }
                })
                ->escapeColumns([])
                ->rawColumns(['action', 'checkbox'])
                ->make(true);

        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->adminPaginateed(
            new PaginateAdminResponseModel($admins)
        );
    }
}

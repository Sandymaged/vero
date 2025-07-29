<?php

namespace App\Http\Controllers\Backend\Role;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Role\EditRole\EditRoleRequestModel;
use App\Domain\UseCases\Role\EditRole\IEditRoleInputPort;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class EditRoleController extends AppBaseController
{
    private $interactor;

    public function __construct(
        IEditRoleInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->editRole($id,
            new EditRoleRequestModel()
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}

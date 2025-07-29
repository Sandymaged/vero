<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Admin\EditAdmin\EditAdminRequestModel;
use App\Domain\UseCases\Admin\EditAdmin\IEditAdminInputPort;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class EditAdminController extends AppBaseController
{
    private $interactor;

    public function __construct(
        IEditAdminInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->editAdmin($id,
            new EditAdminRequestModel()
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}

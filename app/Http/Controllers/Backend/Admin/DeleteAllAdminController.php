<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Admin\DeleteAllAdmin\IDeleteAllAdminInputPort;
use App\Domain\UseCases\Admin\DeleteAllAdmin\DeleteAllAdminRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\DeleteAllRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class DeleteAllAdminController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IDeleteAllAdminInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(DeleteAllRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->deleteAllAdmin(
            new DeleteAllAdminRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}

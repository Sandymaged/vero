<?php

namespace App\Http\Controllers\Backend\State;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\State\DeleteAllState\DeleteAllStateRequestModel;
use App\Domain\UseCases\State\DeleteAllState\IDeleteAllStateInputPort;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\DeleteAllRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class DeleteAllStateController extends AppBaseController
{
    private $interactor;

    public function __construct(
        IDeleteAllStateInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(DeleteAllRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->deleteAllState(
            new DeleteAllStateRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}

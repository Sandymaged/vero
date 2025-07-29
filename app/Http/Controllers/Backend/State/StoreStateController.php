<?php

namespace App\Http\Controllers\Backend\State;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\State\StoreState\IStoreStateInputPort;
use App\Domain\UseCases\State\StoreState\StoreStateRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\State\StoreStateRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class StoreStateController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IStoreStateInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(StoreStateRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->createState(
            new StoreStateRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}

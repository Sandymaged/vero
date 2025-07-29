<?php

namespace App\Http\Controllers\Backend\Service;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Service\StoreService\IStoreServiceInputPort;
use App\Domain\UseCases\Service\StoreService\StoreServiceRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\Service\StoreServiceRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class StoreServiceController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IStoreServiceInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(StoreServiceRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->createService(
            new StoreServiceRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}

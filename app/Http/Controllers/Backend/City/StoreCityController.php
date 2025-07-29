<?php

namespace App\Http\Controllers\Backend\City;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\City\StoreCity\IStoreCityInputPort;
use App\Domain\UseCases\City\StoreCity\StoreCityRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\City\StoreCityRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class StoreCityController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IStoreCityInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(StoreCityRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->createCity(
            new StoreCityRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}

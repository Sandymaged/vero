<?php

namespace App\Http\Controllers\Backend\City;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\City\DeleteAllCity\IDeleteAllCityInputPort;
use App\Domain\UseCases\City\DeleteAllCity\DeleteAllCityRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\DeleteAllRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class DeleteAllCityController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IDeleteAllCityInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(DeleteAllRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->deleteAllCity(
            new DeleteAllCityRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}

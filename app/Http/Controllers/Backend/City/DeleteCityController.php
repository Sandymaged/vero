<?php

namespace App\Http\Controllers\Backend\City;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\City\DeleteCity\DeleteCityRequestModel;
use App\Domain\UseCases\City\DeleteCity\IDeleteCityInputPort;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class DeleteCityController extends AppBaseController
{
    private $interactor;

    public function __construct(
        IDeleteCityInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->deleteCity($id,
            new DeleteCityRequestModel()
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}

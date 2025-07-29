<?php

namespace App\Http\Controllers\Backend\City;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\City\UpdateCity\IUpdateCityInputPort;
use App\Domain\UseCases\City\UpdateCity\UpdateCityRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\City\UpdateCityRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class UpdateCityController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IUpdateCityInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, UpdateCityRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->updateCity($id,
            new UpdateCityRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}

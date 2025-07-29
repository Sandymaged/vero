<?php

namespace App\Http\Controllers\Backend\City;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\City\EditCity\EditCityRequestModel;
use App\Domain\UseCases\City\EditCity\IEditCityInputPort;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class EditCityController extends AppBaseController
{
    private $interactor;

    public function __construct(
        IEditCityInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->editCity($id,
            new EditCityRequestModel()
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}

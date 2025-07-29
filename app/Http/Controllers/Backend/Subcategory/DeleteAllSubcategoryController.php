<?php

namespace App\Http\Controllers\Backend\Subcategory;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Subcategory\DeleteAllSubcategory\IDeleteAllSubcategoryInputPort;
use App\Domain\UseCases\Subcategory\DeleteAllSubcategory\DeleteAllSubcategoryRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\DeleteAllRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class DeleteAllSubcategoryController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IDeleteAllSubcategoryInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(DeleteAllRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->deleteAllSubcategory(
            new DeleteAllSubcategoryRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}

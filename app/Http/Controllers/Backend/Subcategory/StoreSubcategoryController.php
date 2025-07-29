<?php

namespace App\Http\Controllers\Backend\Subcategory;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Subcategory\StoreSubcategory\IStoreSubcategoryInputPort;
use App\Domain\UseCases\Subcategory\StoreSubcategory\StoreSubcategoryRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\Subcategory\StoreSubcategoryRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class StoreSubcategoryController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IStoreSubcategoryInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(StoreSubcategoryRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->createSubcategory(
            new StoreSubcategoryRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}

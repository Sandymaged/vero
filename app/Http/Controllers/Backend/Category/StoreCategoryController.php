<?php

namespace App\Http\Controllers\Backend\Category;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Category\StoreCategory\IStoreCategoryInputPort;
use App\Domain\UseCases\Category\StoreCategory\StoreCategoryRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\Category\StoreCategoryRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class StoreCategoryController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IStoreCategoryInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(StoreCategoryRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->createCategory(
            new StoreCategoryRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}

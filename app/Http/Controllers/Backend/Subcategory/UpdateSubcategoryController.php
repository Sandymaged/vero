<?php

namespace App\Http\Controllers\Backend\Subcategory;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Subcategory\UpdateSubcategory\IUpdateSubcategoryInputPort;
use App\Domain\UseCases\Subcategory\UpdateSubcategory\UpdateSubcategoryRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\Subcategory\UpdateSubcategoryRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class UpdateSubcategoryController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IUpdateSubcategoryInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, UpdateSubcategoryRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->updateSubcategory($id,
            new UpdateSubcategoryRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}

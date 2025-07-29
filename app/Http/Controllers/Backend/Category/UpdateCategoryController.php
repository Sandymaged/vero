<?php

namespace App\Http\Controllers\Backend\Category;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Category\UpdateCategory\IUpdateCategoryInputPort;
use App\Domain\UseCases\Category\UpdateCategory\UpdateCategoryRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\Category\UpdateCategoryRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class UpdateCategoryController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IUpdateCategoryInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, UpdateCategoryRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->updateCategory($id,
            new UpdateCategoryRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}

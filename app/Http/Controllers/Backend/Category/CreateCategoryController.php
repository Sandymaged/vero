<?php

namespace App\Http\Controllers\Backend\Category;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Category\CreateCategory\CreateCategoryRequestModel;
use App\Domain\UseCases\Category\CreateCategory\ICreateCategoryInputPort;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class CreateCategoryController extends AppBaseController
{
    private $interactor;

    public function __construct(
        ICreateCategoryInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->createCategory(
            new CreateCategoryRequestModel()
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}

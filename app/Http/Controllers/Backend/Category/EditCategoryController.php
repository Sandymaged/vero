<?php

namespace App\Http\Controllers\Backend\Category;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Category\EditCategory\EditCategoryRequestModel;
use App\Domain\UseCases\Category\EditCategory\IEditCategoryInputPort;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class EditCategoryController extends AppBaseController
{
    private $interactor;

    public function __construct(
        IEditCategoryInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->editCategory($id,
            new EditCategoryRequestModel()
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}

<?php

namespace App\Http\Controllers\Backend\Category;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Category\ListCategory\IListCategoryInputPort;
use App\Domain\UseCases\Category\ListCategory\ListCategoryRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class ListCategoryController extends AppBaseController
{
    private $interactor;

    public function __construct(
        IListCategoryInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->listCategory(
            new ListCategoryRequestModel($request->page)
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}

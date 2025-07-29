<?php

namespace App\Http\Controllers\Backend\Subcategory;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Subcategory\ListSubcategory\IListSubcategoryInputPort;
use App\Domain\UseCases\Subcategory\ListSubcategory\ListSubcategoryRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class ListSubcategoryController extends AppBaseController
{
    private $interactor;

    public function __construct(
        IListSubcategoryInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->listSubcategory(
            new ListSubcategoryRequestModel($request->page)
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}

<?php

namespace App\Http\Controllers\Backend\Subcategory;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Subcategory\DeleteSubcategory\DeleteSubcategoryRequestModel;
use App\Domain\UseCases\Subcategory\DeleteSubcategory\IDeleteSubcategoryInputPort;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class DeleteSubcategoryController extends AppBaseController
{
    private $interactor;

    public function __construct(
        IDeleteSubcategoryInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->deleteSubcategory($id,
            new DeleteSubcategoryRequestModel()
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}

<?php

namespace App\Http\Controllers\Backend\MerchantBranch;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\MerchantBranch\EditMerchantBranch\EditMerchantBranchRequestModel;
use App\Domain\UseCases\MerchantBranch\EditMerchantBranch\IEditMerchantBranchInputPort;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class EditMerchantBranchController extends AppBaseController
{
    private $interactor;

    public function __construct(
        IEditMerchantBranchInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->editMerchantBranch($id,
            new EditMerchantBranchRequestModel()
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}

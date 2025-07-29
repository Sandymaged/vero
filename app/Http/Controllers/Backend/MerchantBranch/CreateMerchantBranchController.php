<?php

namespace App\Http\Controllers\Backend\MerchantBranch;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\MerchantBranch\CreateMerchantBranch\CreateMerchantBranchRequestModel;
use App\Domain\UseCases\MerchantBranch\CreateMerchantBranch\ICreateMerchantBranchInputPort;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class CreateMerchantBranchController extends AppBaseController
{
    private $interactor;

    public function __construct(
        ICreateMerchantBranchInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->createMerchantBranch(
            new CreateMerchantBranchRequestModel()
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}

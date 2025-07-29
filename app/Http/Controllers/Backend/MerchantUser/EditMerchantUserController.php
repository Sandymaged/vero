<?php

namespace App\Http\Controllers\Backend\MerchantUser;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\MerchantUser\EditMerchantUser\EditMerchantUserRequestModel;
use App\Domain\UseCases\MerchantUser\EditMerchantUser\IEditMerchantUserInputPort;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class EditMerchantUserController extends AppBaseController
{
    private $interactor;

    public function __construct(
        IEditMerchantUserInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->editMerchantUser($id,
            new EditMerchantUserRequestModel()
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}

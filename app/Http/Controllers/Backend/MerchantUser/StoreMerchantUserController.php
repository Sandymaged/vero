<?php

namespace App\Http\Controllers\Backend\MerchantUser;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\MerchantUser\StoreMerchantUser\IStoreMerchantUserInputPort;
use App\Domain\UseCases\MerchantUser\StoreMerchantUser\StoreMerchantUserRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\MerchantUser\StoreMerchantUserRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class StoreMerchantUserController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IStoreMerchantUserInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(StoreMerchantUserRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->createMerchantUser(
            new StoreMerchantUserRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}

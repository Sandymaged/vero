<?php

namespace App\Http\Controllers\Backend\Merchant;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Merchant\StoreMerchant\IStoreMerchantInputPort;
use App\Domain\UseCases\Merchant\StoreMerchant\StoreMerchantRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\Merchant\StoreMerchantRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class StoreMerchantController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IStoreMerchantInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(StoreMerchantRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->createMerchant(
            new StoreMerchantRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}

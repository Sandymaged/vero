<?php

namespace App\Adapters\Presenters\MerchantBranch;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\MerchantBranch\CreateMerchantBranch\CreateMerchantBranchResponseModel;
use App\Domain\UseCases\MerchantBranch\CreateMerchantBranch\ICreateMerchantBranchOutputPort;

class CreateMerchantBranchHttpPresenter extends HttpPresenter implements ICreateMerchantBranchOutputPort
{
    public function createMerchantBranch(CreateMerchantBranchResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.merchant_branches.create')
                ->with([
                    'merchants' => $model->getMerchants(),
                    'states' => $model->getStates()
                ])
        );
    }
}

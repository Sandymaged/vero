<?php

namespace App\Adapters\Presenters\MerchantBranch;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\MerchantBranch\ListMerchantBranch\IListMerchantBranchOutputPort;
use App\Domain\UseCases\MerchantBranch\ListMerchantBranch\ListMerchantBranchResponseModel;

class ListMerchantBranchHttpPresenter extends HttpPresenter implements IListMerchantBranchOutputPort
{
    public function merchantBranchListed(ListMerchantBranchResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.merchant_branches.index')
                ->with([
                    'merchantBranches' => $model->getMerchantBranches(),
                ])
        );
    }
}

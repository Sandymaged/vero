<?php

namespace App\Adapters\Presenters\Service;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Service\StoreService\IStoreServiceOutputPort;
use App\Domain\UseCases\Service\StoreService\StoreServiceResponseModel;
use Laracasts\Flash\Flash;

class StoreServiceHttpPresenter extends HttpPresenter implements IStoreServiceOutputPort
{
    public function serviceCreated(StoreServiceResponseModel $model): IViewModel
    {
        Flash::success(__('messages.created_successfully', ['operator' => __('messages.attributes.service')]));
        return new HttpResponseIViewModel(
            app('redirect')->route(request()->get('guard').'.services.index')
        );
    }


    public function unableToStoreService(StoreServiceResponseModel $model, \Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        Flash::error(trans("messages.error_creating", ['operator' => trans("messages.attributes.service" . " {$model->getService()->getName()}")]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard').'.services.index')
        );
    }
}

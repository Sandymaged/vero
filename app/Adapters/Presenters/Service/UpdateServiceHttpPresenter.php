<?php

namespace App\Adapters\Presenters\Service;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Service\UpdateService\IUpdateServiceOutputPort;
use App\Domain\UseCases\Service\UpdateService\UpdateServiceResponseModel;
use Laracasts\Flash\Flash;

class UpdateServiceHttpPresenter extends HttpPresenter implements IUpdateServiceOutputPort
{
    public function serviceUpdated(UpdateServiceResponseModel $model): IViewModel
    {
        Flash::success(__('messages.updated_successfully', ['operator' => __('messages.attributes.service')]));
        return new HttpResponseIViewModel(
            app('redirect')->route(request()->get('guard').'.services.index')
        );
    }


    public function unableToUpdateService(UpdateServiceResponseModel $model, \Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        Flash::error(trans("messages.error_updating", ['operator' => trans("messages.attributes.Service") . " {$model->getService()->getName()}"]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard').'.services.index')
        );
    }

    public function unableToFindService(): IViewModel
    {
        Flash::error(trans("messages.not_found", ['operator' => trans("messages.attributes.service")]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard') . '.services.index')
        );
    }
}

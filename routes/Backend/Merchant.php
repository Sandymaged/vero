<?php

// merchant routes
Route::group(['prefix' => 'merchants', 'as' => 'merchants.'], function () {
    Route::get('/', Merchant\ListMerchantController::class)->name('index');
    Route::post('/get-data', Merchant\PaginateMerchantController::class)->name('getData');
    Route::get('/create', Merchant\CreateMerchantController::class)->name('create');
    Route::post('/', Merchant\StoreMerchantController::class)->name('store');
    Route::get('/{id}/edit', Merchant\EditMerchantController::class)->name('edit');
    Route::patch('/{id}', Merchant\UpdateMerchantController::class)->name('update');
    Route::delete('/{id}', Merchant\DeleteMerchantController::class)->name('delete');
    Route::delete('/all/delete', Merchant\DeleteAllMerchantController::class)->name('deleteAll');
});

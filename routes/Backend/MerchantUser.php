<?php

// merchant users routes
Route::group(['prefix' => 'merchant-users', 'as' => 'merchantUsers.'], function () {
    Route::get('/', MerchantUser\ListMerchantUserController::class)->name('index');
    Route::get('/create', MerchantUser\CreateMerchantUserController::class)->name('create');
    Route::post('/', MerchantUser\StoreMerchantUserController::class)->name('store');
    Route::get('/{id}/edit', MerchantUser\EditMerchantUserController::class)->name('edit');
    Route::patch('/{id}', MerchantUser\UpdateMerchantUserController::class)->name('update');
    Route::delete('/{id}', MerchantUser\DeleteMerchantUserController::class)->name('delete');
    Route::delete('/all/delete', MerchantUser\DeleteAllMerchantUserController::class)->name('deleteAll');
});

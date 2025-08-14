<?php

// merchant routes
Route::group(['prefix' => 'merchants', 'as' => 'merchants.'], function () {
    // Route::get('/get-Markets', 'Merchant\CreateMerchantController@getMarkets')->name('getMarkets');

    Route::get('/', 'Merchant\ListMerchantController@merchantsIndex')->name('index');
    Route::post('/get-data', Merchant\PaginateMerchantController::class)->name('getData');
    Route::get('/create', 'Merchant\ListMerchantController@create')->name('create');
    Route::post('/', 'Merchant\ListMerchantController@store')->name('store');
    Route::get('/{id}/edit', Merchant\EditMerchantController::class)->name('edit');
    Route::patch('/{id}', Merchant\UpdateMerchantController::class)->name('update');
    Route::get('/{id}','Merchant\ListMerchantController@delete')->name('delete');
    Route::delete('/all/delete', Merchant\DeleteAllMerchantController::class)->name('deleteAll');
});

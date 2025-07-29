<?php

// offers routes
Route::group(['prefix' => 'offers', 'as' => 'offers.'], function () {
    Route::get('/', Offer\ListOfferController::class)->name('index');
    Route::get('/create', Offer\CreateOfferController::class)->name('create');
    Route::post('/', Offer\StoreOfferController::class)->name('store');
    Route::get('/{id}/edit', Offer\EditOfferController::class)->name('edit');
    Route::patch('/{id}', Offer\UpdateOfferController::class)->name('update');
    Route::delete('/{id}', Offer\DeleteOfferController::class)->name('delete');
    Route::delete('/all/delete', Offer\DeleteAllOfferController::class)->name('deleteAll');
});

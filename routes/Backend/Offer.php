<?php

// offers routes
Route::group(['prefix' => 'offers', 'as' => 'offers.'], function () {
    Route::get('/','Offer\ListOfferController@ProductIndex')->name('index');
    Route::get('/create', Offer\CreateOfferController::class)->name('create');
    Route::post('/', 'Offer\ListOfferController@store')->name('store');
    Route::get('/{id}/edit', Offer\EditOfferController::class)->name('edit');
    Route::patch('/{id}', Offer\UpdateOfferController::class)->name('update');
    Route::get('/{id}', 'Offer\ListOfferController@delete')->name('delete');
    Route::delete('/all/delete', Offer\DeleteAllOfferController::class)->name('deleteAll');
});

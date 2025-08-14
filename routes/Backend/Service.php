<?php

// services routes
Route::group(['prefix' => 'services', 'as' => 'services.'], function () {
    Route::get('/get-services', 'Service\ServiceController@getCategories')->name('getCategories');
    Route::get('/', Service\ListServiceController::class)->name('index');
    Route::get('/create', 'Service\ServiceController@getAbout')->name('create');
    Route::post('/', Service\StoreServiceController::class)->name('store');
    Route::get('/{id}/edit', Service\EditServiceController::class)->name('edit');
    Route::patch('/{id}', 'Service\ServiceController@updateAbout'::class)->name('update');
    Route::delete('/{id}', Service\DeleteServiceController::class)->name('delete');
    Route::delete('/all/delete', Service\DeleteAllServiceController::class)->name('deleteAll');
});
//  Route::get('/about-us', 'Service\ServiceController@getAbout')->name('getAbout');
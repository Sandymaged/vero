<?php

// cities routes
Route::group(['prefix' => 'cities', 'as' => 'cities.'], function () {
    Route::get('/', City\ListCityController::class)->name('index');
    Route::get('/create', City\CreateCityController::class)->name('create');
    Route::post('/', City\StoreCityController::class)->name('store');
    Route::get('/{id}/edit', City\EditCityController::class)->name('edit');
    Route::patch('/{id}', City\UpdateCityController::class)->name('update');
    Route::delete('/{id}', City\DeleteCityController::class)->name('delete');
    Route::delete('/all/delete', City\DeleteAllCityController::class)->name('deleteAll');
});

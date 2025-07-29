<?php

// states routes
Route::group(['prefix' => 'states', 'as' => 'states.'], function () {
    Route::get('/', State\ListStateController::class)->name('index');
    Route::get('/create', State\CreateStateController::class)->name('create');
    Route::post('/', State\StoreStateController::class)->name('store');
    Route::get('/{id}/edit', State\EditStateController::class)->name('edit');
    Route::patch('/{id}', State\UpdateStateController::class)->name('update');
    Route::delete('/{id}', State\DeleteStateController::class)->name('delete');
    Route::delete('/all/delete', State\DeleteAllStateController::class)->name('deleteAll');
});

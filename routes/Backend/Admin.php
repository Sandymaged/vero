<?php

// admins routes
Route::group(['prefix' => 'admins', 'as' => 'admins.'], function () {
    Route::get('/', Admin\ListAdminController::class)->name('index');
    Route::post('/get-data', Admin\PaginateAdminController::class)->name('getData');
    Route::get('/create', Admin\CreateAdminController::class)->name('create');
    Route::post('/', Admin\StoreAdminController::class)->name('store');
    Route::get('/{id}/edit', Admin\EditAdminController::class)->name('edit');
    Route::patch('/{id}', Admin\UpdateAdminController::class)->name('update');
    Route::delete('/{id}', Admin\DeleteAdminController::class)->name('delete');
    Route::delete('/all/delete', Admin\DeleteAllAdminController::class)->name('deleteAll');
});

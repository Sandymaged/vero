<?php

// permissions routes
Route::group(['prefix' => 'permissions', 'as' => 'permissions.'], function () {
    Route::get('/', Permission\ListPermissionController::class)->name('index');
    Route::get('/create', Permission\CreatePermissionController::class)->name('create');
    Route::post('/', Permission\StorePermissionController::class)->name('store');
    Route::get('/{id}/edit', Permission\EditPermissionController::class)->name('edit');
    Route::patch('/{id}', Permission\UpdatePermissionController::class)->name('update');
    Route::delete('/{id}', Permission\DeletePermissionController::class)->name('delete');
    Route::delete('/all/delete', Permission\DeleteAllPermissionController::class)->name('deleteAll');
});

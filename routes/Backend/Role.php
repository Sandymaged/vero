<?php

// roles routes
Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
    Route::get('/', Role\ListRoleController::class)->name('index');
    Route::get('/create', Role\CreateRoleController::class)->name('create');
    Route::post('/', Role\StoreRoleController::class)->name('store');
    Route::get('/{id}/edit', Role\EditRoleController::class)->name('edit');
    Route::patch('/{id}', Role\UpdateRoleController::class)->name('update');
    Route::delete('/{id}', Role\DeleteRoleController::class)->name('delete');
    Route::delete('/all/delete', Role\DeleteAllRoleController::class)->name('deleteAll');
});

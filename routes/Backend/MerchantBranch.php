<?php

// merchant branches routes
Route::group(['prefix' => 'merchant-branches', 'as' => 'merchantBranches.'], function () {
    Route::get('/get-branches', 'MerchantBranch\MerchantBranchController@getBranches')->name('getBranches');
    Route::get('/', MerchantBranch\ListMerchantBranchController::class)->name('index');
    Route::get('/create', MerchantBranch\CreateMerchantBranchController::class)->name('create');
    Route::post('/', MerchantBranch\StoreMerchantBranchController::class)->name('store');
    Route::get('/{id}/edit', MerchantBranch\EditMerchantBranchController::class)->name('edit');
    Route::patch('/{id}', MerchantBranch\UpdateMerchantBranchController::class)->name('update');
    Route::delete('/{id}', MerchantBranch\DeleteMerchantBranchController::class)->name('delete');
    Route::delete('/all/delete', MerchantBranch\DeleteAllMerchantBranchController::class)->name('deleteAll');
});

<?php

// subcategories routes
Route::group(['prefix' => 'subcategories', 'as' => 'subcategories.'], function () {
    Route::get('/get-subcategories', 'Subcategory\SubcategoryController@getCategories')->name('getCategories');
    Route::get('/', Subcategory\ListSubcategoryController::class)->name('index');
    Route::get('/create', Subcategory\CreateSubcategoryController::class)->name('create');
    Route::post('/', Subcategory\StoreSubcategoryController::class)->name('store');
    Route::get('/{id}/edit', Subcategory\EditSubcategoryController::class)->name('edit');
    Route::patch('/{id}', Subcategory\UpdateSubcategoryController::class)->name('update');
    Route::delete('/{id}', Subcategory\DeleteSubcategoryController::class)->name('delete');
    Route::delete('/all/delete', Subcategory\DeleteAllSubcategoryController::class)->name('deleteAll');
});

<?php

// categories routes
Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
    Route::get('/get-categories', 'Category\CategoryController@getCategories')->name('getCategories');
    Route::get('/', Category\ListCategoryController::class)->name('index');
    Route::get('/create', Category\CreateCategoryController::class)->name('create');
    Route::post('/', Category\StoreCategoryController::class)->name('store');
    Route::get('/{id}/edit', Category\EditCategoryController::class)->name('edit');
    Route::patch('/{id}', Category\UpdateCategoryController::class)->name('update');
    Route::delete('/{id}', Category\DeleteCategoryController::class)->name('delete');
    Route::delete('/all/delete', Category\DeleteAllCategoryController::class)->name('deleteAll');
});

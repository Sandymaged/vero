<?php

//dashboard routes
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('dashboard', 'Dashboard\DashboardController@dashboard');
    Route::get('/', 'Dashboard\DashboardController@dashboard')->name('index');
});

<?php

/*authentication*/
Route::get('forgot-password', 'ForgotPasswordController@forgot_password')->name('forgot-password');
Route::post('forgot-password', 'ForgotPasswordController@reset_password_request');
Route::get('reset-password', 'ForgotPasswordController@reset_password_index')->name('reset-password');
Route::post('reset-password', 'ForgotPasswordController@reset_password_submit');

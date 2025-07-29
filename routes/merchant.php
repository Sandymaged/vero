<?php

/*
|--------------------------------------------------------------------------
| Merchant Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "merchant" middleware group. Now create something great!
|
 */

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Backend', 'prefix' => 'merchant', 'as' => 'merchant.'], function () {

    Route::get('/', function (){
        return redirect()->route('merchant.auth.login');
    });

    /*authentication*/
    Route::group(['namespace' => 'Auth', 'prefix' => 'auth', 'as' => 'auth.'], function () {
        Route::get('login', 'LoginController@showMerchantLoginForm')->name('login');
        Route::post('login', 'LoginController@merchantLogin');
        Route::get('logout', 'LoginController@merchantLogout')->name('logout');
        include('Backend/Auth.php');
    });

    /*authenticated*/
    Route::group(['middleware' => ['merchant']], function () {

        //dashboard routes
        include('Backend/Dashboard.php');

        // merchant branches routes
        include('Backend/MerchantBranch.php');

        // merchant users routes
        include('Backend/MerchantUser.php');

        // offers routes
        include('Backend/Offer.php');

        // categories routes
        Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
            Route::get('/get-categories', 'Category\CategoryController@getCategories')->name('getCategories');
        });
    });

});

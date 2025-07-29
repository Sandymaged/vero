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

Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', function (){
        return redirect()->route('admin.auth.login');
    });

    /*authentication*/
    Route::group(['namespace' => 'Auth', 'prefix' => 'auth', 'as' => 'auth.'], function () {
        Route::get('login', 'LoginController@showAdminLoginForm')->name('login');
        Route::post('login', 'LoginController@adminLogin');
        Route::get('logout', 'LoginController@adminLogout')->name('logout');
        include('Backend/Auth.php');
    });

    /*authenticated*/
    Route::group(['middleware' => ['admin']], function () {
        //dashboard routes
        include('Backend/Dashboard.php');

        // merchant routes
        include('Backend/Merchant.php');

        // merchant branches routes
        include('Backend/MerchantBranch.php');

        // merchant users routes
        include('Backend/MerchantUser.php');

        // offers routes
        include('Backend/Offer.php');

        // categories routes
        include('Backend/Category.php');

        // services routes
        include('Backend/Service.php');

        // subcategories routes
        include('Backend/Subcategory.php');

        // states routes
        include('Backend/State.php');

        // cities routes
        include('Backend/City.php');

        // admins routes
        include('Backend/Admin.php');

        // roles routes
        include('Backend/Role.php');

        // permissions routes
        include('Backend/Permission.php');
    });

});

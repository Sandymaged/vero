<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
//    return view('web.index');
    return view('web.home.index');
});

Route::get('/about-us', function () {
    return view('web.about');
});

Route::get('/contact-us', function () {
    return view('web.contact');
});

Route::post('/contact-us', 'WebController@sendContactUs');

Route::get('/silotel', function () {
    return view('web.silotel');
});

Route::get('/products/{slug}', function ($slug) {
    return view('web.products.' . $slug);
});

Route::get('/categories/{slug}', function ($slug) {
    return view('web.categories.' . $slug);
});

Route::get('/portfolio', 'WebController@downloadPortfolio');

Route::get('/our-certifications', function () {
    return view('web.our-certifications');
});

Route::get('/markets', function () {
    return view('web.markets');
});

//Route::view('user/create', 'user.create')->name('user.create');

//Route::post('user', StoreUserController::class)->name('user.store');

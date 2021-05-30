<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'DashboardController@index');

Route::group(['prefix' => 'posts'], function () {
    Route::resource('blogs', 'BlogController');
    Route::resource('Categories', 'CategoryController');
    Route::resource('pages', 'PageController');
    Route::resource('banners', 'BannerController');
});

Route::group(['prefix' => 'products'], function () {
    Route::resource('items', 'ProductController');
    Route::resource('categories', 'CategoryController');
});

Route::group(['prefix' => 'companies'], function () {
    Route::resource('merchants', 'MerchantController');
    Route::resource('creditors', 'CreditorController');
});

Route::group(['prefix' => 'transactions'], function () {
    Route::resource('interest', 'InterestController');
    Route::resource('/', 'TransactionController');
});

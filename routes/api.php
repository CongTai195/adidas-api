<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['as' => 'user.'], function () {
    Route::post('/login', 'AuthenticateController@login')->name('login');

    Route::group(['prefix' => 'category', 'as' => 'user.'], function () {
        Route::get('/', 'CategoryController@index')->name('index');
        Route::get('/{id}/product', 'CategoryController@getProductsForCategory')->name('getProductsForCategory');
    });

    Route::group(['prefix' => 'product', 'as' => 'user.'], function () {
        Route::get('/', 'ProductController@index')->name('index');
        Route::get('/{id}', 'ProductController@getDetailProduct')->name('getDetailProduct');
    });

    Route::group(['prefix' => 'transaction', 'as' => 'user.'], function () {
        Route::get('/{id}', 'TransactionController@index')->name('index');
    });

    Route::group(['prefix' => 'order', 'as' => 'user.'], function () {
        Route::get('/{id}', 'OrderController@index')->name('index');
    });

    Route::group(['middleware' => 'api-user'], function () {
        Route::get('/logout', 'AuthenticateController@logout')->name('logout');
        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('/', 'UserController@index')->name('index');
            Route::put('/update', 'UserController@update')->name('update');
        });
        Route::group(['prefix' => 'cart', 'as' => 'user.'], function () {
            Route::get('/', 'CartController@index')->name('index');
            Route::post('/create', 'CartController@create')->name('create');
        });
    });
});

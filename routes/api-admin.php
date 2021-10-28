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

Route::group(['as' => 'admin.'], function () {
    Route::post('/login', 'AuthenticateController@login')->name('login');
    Route::group(['middleware' => 'api-admin'], function () {
        Route::get('/logout', 'AuthenticateController@logout')->name('logout');

        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('/', 'UserController@index')->name('index');
        });

        Route::group(['prefix' => 'admin', 'as' => 'user.'], function () {
            Route::get('/', 'AdminController@index')->name('index');
        });

        Route::group(['prefix' => 'category', 'as' => 'user.'], function () {
            Route::get('/', 'CategoryController@index')->name('index');
        });

        Route::group(['prefix' => 'product', 'as' => 'user.'], function () {
            Route::get('/', 'ProductController@index')->name('index');
        });

        Route::group(['prefix' => 'transaction', 'as' => 'user.'], function () {
            Route::get('/', 'TransactionController@index')->name('index');
        });
    });
});

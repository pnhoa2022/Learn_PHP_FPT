<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Route::group(['namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'login', 'middleware' => 'CheckLogedIn'], function () {
        Route::get('/', 'LoginController@getLogin')->name('login');
        Route::post('/', 'LoginController@postLogin');
    });

    Route::group(['prefix' => 'logout'], function () {
        Route::get('/', 'LoginController@getLogout')->name('logout');
    });

    Route::group(['prefix' => 'admin', 'middleware' => 'CheckLogedOut'], function () {
        Route::get('home', 'HomeController@getHome')->name('home');

        Route::group(['prefix' => 'category'], function () {
            Route::get('/', 'CategoryController@getCategory')->name('category');
            Route::post('/', 'CategoryController@postAddCategory');

            Route::get('/edit/{id}', 'CategoryController@getEditCategory');
            Route::post('/edit/{id}', 'CategoryController@postEditCategory');

            Route::get('/delete/{id}', 'CategoryController@getDeleteCategory');
        });

//        Route::group(['prefix' =>'product'], function () {
//            Route::get('/', '')->name('product');
//        });
    });
});

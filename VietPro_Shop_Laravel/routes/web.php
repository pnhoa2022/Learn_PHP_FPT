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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['prefix' => ''], function () {
    Route::get('', 'FrontendController@index');

    Route::group(['prefix' => 'details'], function () {
        Route::get('{id}/{slug}.html', 'FrontendController@details');

        Route::post('post-comment/{id}/{slug}.html', 'FrontendController@postComment');
    });

    Route::get('category/{id}/{slug}.html', 'FrontendController@category');

    Route::get('search', 'FrontendController@search');

    Route::group(['prefix' => 'cart'], function () {
        Route::get('add/{id}', 'CartController@add');
        Route::get('show', 'CartController@show');
        Route::get('delete/{rowId}', 'CartController@delete');

        Route::get('update', 'CartController@update');

        Route::post('show', 'CartController@postMail');
        Route::get('complete', 'CartController@complete');
    });
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
        Route::get('/', 'HomeController@getHome')->name('admin');

        Route::group(['prefix' => 'category'], function () {
            Route::get('/', 'CategoryController@getCategory')->name('category');
            Route::post('/', 'CategoryController@postAddCategory');

            Route::get('/edit/{id}', 'CategoryController@getEditCategory');
            Route::post('/edit/{id}', 'CategoryController@postEditCategory');

            Route::get('/delete/{id}', 'CategoryController@getDeleteCategory');
        });

        Route::group(['prefix' => 'product'], function () {
            Route::get('/', 'ProductController@index')->name('product');

            Route::get('/view/{id}', 'ProductController@show');

            Route::get('/add', 'ProductController@create');
            Route::post('/add', 'ProductController@store');

            Route::get('/edit/{id}', 'ProductController@edit');
            Route::post('/edit/{id}', 'ProductController@update');

            Route::get('/delete/{id}', 'ProductController@destroy');
        });
    });
});

<?php

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


Route::get('/', [
    'as' => 'admin.index',
    'uses' => 'AdminController@index'
]);
Route::post('/', [
    'as' => 'admin.login',
    'uses' => 'AdminController@login'
]);

Route::get('/home', function () {
    return view('home');
});

Route::prefix('admin')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/list', [
            'as' => 'categories.index',
            'uses' => 'CategoryController@index',
        ]);
        Route::get('/create', [
            'as' => 'categories.create',
            'uses' => 'CategoryController@create',
        ]);
        Route::post('/store', [
            'as' => 'categories.store',
            'uses' => 'CategoryController@store',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'categories.edit',
            'uses' => 'CategoryController@edit',
        ]);
        Route::post('/update/{id}', [
            'as' => 'categories.update',
            'uses' => 'CategoryController@update',
        ]);
        Route::get('/delete/{id}', [
            'as' => 'categories.delete',
            'uses' => 'CategoryController@delete',
        ]);
    });

    Route::prefix('menu')->group(function () {
        Route::get('/', [
            'as' => 'menu.index',
            'uses' => 'MenuController@index',
        ]);
        Route::get('/create', [
            'as' => 'menu.create',
            'uses' => 'MenuController@create',
        ]);
        Route::post('/store', [
            'as' => 'menu.store',
            'uses' => 'MenuController@store',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'menu.edit',
            'uses' => 'MenuController@edit',
        ]);
        Route::post('/update/{id}', [
            'as' => 'menu.update',
            'uses' => 'MenuController@update',
        ]);
        Route::get('/delete/{id}', [
            'as' => 'menu.delete',
            'uses' => 'MenuController@delete',
        ]);
    });

    Route::prefix('products')->group(function () {
        Route::get('/', [
            'as' => 'product.index',
            'uses' => 'AdminProductController@index',
        ]);

        Route::get('/create', [
            'as' => 'product.create',
            'uses' => 'AdminProductController@create',
        ]);


        Route::post('/store', [
            'as' => 'product.store',
            'uses' => 'AdminProductController@store',
        ]);

        Route::get('/edit/{id}', [
            'as' => 'product.edit',
            'uses' => 'AdminProductController@edit',
        ]);

        Route::post('/delete/{id}', [
            'as' => 'product.delete',
            'uses' => 'AdminProductController@delete',
        ]);

        Route::post('/update/{id}', [
            'as' => 'product.update',
            'uses' => 'AdminProductController@update',
        ]);

    });
});



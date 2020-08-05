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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

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
    Route::get('/edit', [
        'as' => 'menu.edit',
        'uses' => 'MenuController@edit',
    ]);
    Route::get('/update', [
        'as' => 'menu.update',
        'uses' => 'MenuController@update',
    ]);
    Route::get('/delete', [
        'as' => 'menu.delete',
        'uses' => 'MenuController@delete',
    ]);
});

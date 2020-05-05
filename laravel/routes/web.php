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

Route::get('/', 'SiteController@index');


Route::group(['prefix'=>'names'],function (){
    Route::get('/','NamesController@index');
    Route::get('/full','NamesController@fullName');
});

Route::group(['prefix'=>'posts'],function (){
    Route::get('/','PostController@index');
    Route::get('/one/{id}','PostController@one');
    Route::get('/create','PostController@create');
    Route::post('/create','PostController@create');
    Route::get('/form','PostController@form');
});





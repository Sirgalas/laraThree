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

Route::get('/', 'Frontend\SiteController@index');


Route::group(['prefix'=>'names','namespace'=>'Frontend'],function (){
    Route::get('/','NamesController@index')->name('contacts');
    Route::get('/full','NamesController@fullName');
});

Route::group(['prefix'=>'posts','namespace'=>'Frontend'],function (){
    Route::get('/','PostController@index')->name('posts');
    Route::get('/one/{id}','PostController@one');
    Route::post('/create','PostController@create')->name('post_create');
    Route::get('/form','PostController@form');
    Route::post('/form','PostController@form');
});

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    Route::get('/','SiteController@index')->name('admin');
    Route::group(['prefix'=>'post'],function(){
        Route::get('/','PostController@index')->name('posts');
        Route::get('/create','PostController@create')->name('post_create');
        Route::post('/store','PostController@store')->name('post_store');
        Route::get('/show/{id}','PostController@show')->name('post_show');
        Route::get('/update/{id}','PostController@edit')->name('post_edit');
        Route::put('/update/{id}','PostController@update')->name('post_update');
        Route::delete('delete/{id}','PostController@delete')->name('post_delete');
    });
    /*Route::resource('post','PostController');*/
});





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

Route::group(['prefix'=>'user'], function() {
    Route::post('/enter', 'loginController@enter');
    Route::post('/save', 'loginController@save');
});

Route::group(['prefix'=>'182.753.488-94/dashboard'], function() {
	//GET Requests
    Route::get('/', 'admController@dashboard');
    Route::get('/newpost', 'admController@newpost');
    Route::get('/newrace', 'admController@newrace');
    Route::get('/newalbum', 'admController@newalbum');

    //POST Requests
    Route::post('/insert', 'admController@insertpost');
    Route::post('/createalbum', 'admController@createalbum');
    Route::post('/insertphoto', 'admController@insertphoto');


});

 
Route::get('/getposts', 'admController@getposts');
Route::get('/', 'homeController@index');
Route::get('/about', 'homeController@about');
Route::get('/login', 'loginController@index');
Route::get('/register', 'loginController@register');
Route::get('/photos', 'homeController@photos');
Route::get('/album/load', 'homeController@loadphotos');
Route::get('/logout', 'homeController@logout');



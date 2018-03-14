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
    // POST Requests
    Route::post('/enter', 'loginController@enter');
    Route::post('/save', 'loginController@save');
    Route::post('/pay', 'userController@pay');
    Route::post('/subscribe', 'userController@subscribe');

    // DELETE Requests
    Route::delete('/cancelsubscribe', 'userController@cancel');

    // GET Requests
    Route::get('/retrievedata', 'userController@retrievedata');

});

Route::group(['prefix'=>'182.753.488-94/dashboard'], function() {
	//GET Requests
    Route::get('/', 'admController@dashboard');
    Route::get('/newpost', 'admController@newpost');
    Route::get('/newrace', 'admController@newrace');
    Route::get('/newalbum', 'admController@newalbum');
    Route::get('/deletepost', 'admController@deletepost');
    Route::get('/deleterace', 'admController@deleterace');
    Route::get('/deletealbum', 'admController@deletealbum');

    // DELETE Requests
    Route::delete('/deletepost', 'admController@post_delete');
    Route::delete('/deleterace', 'admController@race_delete');
    Route::delete('/deletegallery', 'admController@gallery_delete');

    //POST Requests
    Route::post('/insert', 'admController@insertpost');
    Route::post('/createalbum', 'admController@createalbum');
    Route::post('/insertphoto', 'admController@insertphoto');
    Route::post('/insert_race', 'admController@insert_race');


});

Route::get('/services', 'homeController@services');
Route::get('/myraces', 'userController@myraces');
Route::get('/races', 'homeController@races');
Route::get('/getraces', 'admController@getraces');
Route::get('/getracesfromid', 'admController@getraces_fromid');
Route::get('/getposts', 'admController@getposts');
Route::get('/', 'homeController@index');
Route::get('/about', 'homeController@about');
Route::get('/login', 'loginController@index');
Route::get('/register', 'loginController@register');
Route::get('/photos', 'homeController@photos');
Route::get('/album/load', 'homeController@loadphotos');
Route::get('/logout', 'homeController@logout');



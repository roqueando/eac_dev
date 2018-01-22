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
    Route::get('/', 'admController@dashboard');
    Route::get('/newpost', 'admController@newpost');

});

 Route::post('/insert', 'admController@insertpost');

Route::get('/', 'homeController@index');
Route::get('/about', 'homeController@about');
Route::get('/login', 'loginController@index');
Route::get('/register', 'loginController@register');



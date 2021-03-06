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

Route::get('/', 'ArticlesController@index');
Route::resource('articles', 'ArticlesController');
Route::resource('articles', 'ArticlesController')->only(['create','update','destroy','edit'])->middleware('check');

Auth::routes();

Route::get('register/confirm/{token}', 'Auth\RegisterController@confirmEmail');
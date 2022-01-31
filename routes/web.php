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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'urls'], function () {
    Route::get('/', 'UrlsController@index')->name('index');
    Route::get('/list', 'UrlsController@list')->name('list');
    Route::post('/store', 'UrlsController@store')->name('store');
    Route::delete('/destroy/{id}', 'UrlsController@destroy')->name('destroy');
    Route::get('/show/{id}', 'UrlsController@show')->name('show');
    Route::get('/listAndUpdate', 'UrlsController@listAndUpdate')->name('listAndUpdate');
});

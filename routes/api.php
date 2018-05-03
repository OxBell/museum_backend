<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Auth Route
Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'auth:api'], function() {
    // Galleries Routes
    Route::get('galleries', 'GalleryController@index');
    Route::get('galleries/{gallery}', 'GalleryController@show');
    Route::post('galleries', 'GalleryController@store');
    Route::put('galleries/{gallery}', 'GalleryController@update');
    Route::delete('galleries/{gallery}', 'GalleryController@delete');

    // Photos Routes
    Route::get('photos', 'PhotoController@index');
    Route::get('photos/{photo}', 'PhotoController@show');
    Route::post('photos', 'PhotoController@store');
    Route::put('photos/{photo}', 'PhotoController@update');
    Route::delete('photos/{photo}', 'PhotoController@delete');
});

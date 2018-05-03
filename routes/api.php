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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('galleries', 'GalleryController@index');
Route::get('galleries/{gallery}', 'GalleryController@show');
Route::post('galleries', 'GalleryController@store');
Route::put('galleries/{gallery}', 'GalleryController@update');
Route::delete('galleries/{gallery}', 'GalleryController@delete');

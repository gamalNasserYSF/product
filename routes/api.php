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
Route::group(['middleware' => 'api'], function () {

        Route::get('/getAll',         'API\ProductController@index');
        Route::get('/{id}/get',       'API\ProductController@show');
        Route::post('/add',           'API\ProductController@store');
        Route::put('/{id}/edit',      'API\ProductController@update');
        Route::delete('/{id}/delete', 'API\ProductController@destroy');
        Route::get('/filter/{name}',         'API\ProductController@filter');
});




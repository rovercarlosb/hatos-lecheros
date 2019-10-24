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

Route::post('auth/login', 'AuthController@login');

Route::group(['middleware' => 'jwt.auth'], function () {
	// Users y auth
	Route::get('auth/user', 'AuthController@user');
	Route::post('auth/logout', 'AuthController@logout');
	Route::post('auth/register', 'AuthController@register');
	Route::get('/users', 'AuthController@index');
	Route::put('/user/update/{id}', 'AuthController@update');
	Route::delete('/user/delete/{id}', 'AuthController@delete');
});

Route::group(['middleware' => 'jwt.refresh'], function () {
	Route::get('auth/refresh', 'AuthController@refresh');
});

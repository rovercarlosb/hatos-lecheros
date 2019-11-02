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
	// Users and auth
	Route::get('auth/user', 'AuthController@user');
	Route::post('auth/logout', 'AuthController@logout');
	Route::post('auth/register', 'AuthController@register');
	Route::get('/users', 'AuthController@index');
	Route::put('/user/update/{user}', 'AuthController@update');
	Route::delete('/user/delete/{user}', 'AuthController@delete');

	//Employees
	Route::post('/employee/register', 'EmployeeController@register');
	Route::get('/employees/{vaccination?}', 'EmployeeController@index');
	Route::put('/employee/update/{employee}', 'EmployeeController@update');
	Route::delete('/employee/delete/{employee}', 'EmployeeController@delete');

	//Cows
	Route::post('/cow/register', 'CowController@register');
	Route::get('/cows', 'CowController@index');
	Route::put('/cow/update/{cow}', 'CowController@update');
	Route::delete('/cow/delete/{cow}', 'CowController@delete');

	//Vaccines
	Route::post('/vaccine/register', 'VaccineController@register');
	Route::get('/vaccines', 'VaccineController@index');
	Route::put('/vaccine/update/{vaccine}', 'VaccineController@update');
	Route::delete('/vaccine/delete/{vaccine}', 'VaccineController@delete');

});

Route::group(['middleware' => 'jwt.refresh'], function () {
	Route::get('auth/refresh', 'AuthController@refresh');
});

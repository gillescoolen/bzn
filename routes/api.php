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

Route::get('municipalities', 'MunicipalityController@index');

Route::get('legend', 'LegendController@index');

Route::get('questions', 'QuestionController@index');

Route::get('statements', 'StatementController@allStatements');
Route::get('statement/{statement}', 'StatementController@getStatement');
Route::get('measure/{measure}', 'MeasureController@getMeasure');

Route::get('textblocks', 'TextBlockController@index');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('user', 'AuthController@user');

    Route::get('users', 'UserController@index');
    Route::get('users/approved', 'UserController@approved')->middleware('role:admin');
    Route::get('users/unapproved', 'UserController@unapproved')->middleware('role:admin');
    Route::patch('users/{id}/removemunicipality', 'UserController@removeMunicipality')->middleware('role:admin');
    Route::patch('users/{id}/addmunicipality/{municipality_id}', 'UserController@addMunicipality')->middleware('role:admin');
    Route::patch('users/{id}/approve', 'UserController@approve')->middleware('role:admin');
    Route::delete('users/{id}', 'UserController@decline')->middleware('role:admin');
});

Route::post('login', 'AuthController@login');
Route::post('logout', 'AuthController@logout');
Route::post('register', 'AuthController@register');
Route::post('forgot-password', 'AuthController@sendPasswordResetLink');
Route::post('reset-password', 'AuthController@callResetPassword');

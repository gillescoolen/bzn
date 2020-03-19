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

Route::get('/municipalities', function () {
    $municipality = ['name' => 'Horn'];
    return $municipality;
});

Route::get('municipalities', 'MunicipalityController@index');

Route::get('legend', 'LegendController@index');

Route::get('/questions', 'QuestionController@index');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/user', 'Auth\LoginController@authUser');
});

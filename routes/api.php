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

Route::group(['middleware' => 'cors'], function() {

	Route::get('v1/register','MainController@register');

	Route::post('v1/login','MainController@login');

	Route::any('v1/answer/{slug}','MainController@answer');

	Route::any('v1/show-answer/{slug}','MainController@showAnswer');

	Route::any('v1/show-hint/{slug}','MainController@showHint');

	Route::get('v1/user-questions','MainController@userQuestions');

	Route::get('v1/user-questions/{slug}','MainController@questions');

	Route::get('v1/plans','MainController@plans');

	Route::post('v1/balance','MainController@getBalance');

	Route::post('v1/transaction','MainController@transaction');

	Route::post('v1/test-failed-transaction','MainController@testFailedTransaction');

	Route::get('v1/users','MainController@users');

	route::get('v1/search','MainController@search');
});
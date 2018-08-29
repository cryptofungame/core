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

Route::get('admin/login','AdminController@login');
Route::get('logout','AdminController@logout');
Route::post('verify','AdminController@verify');
Route::resource('admin/questions','AdminController');
Route::get('admin/questions/delete/{id}','AdminController@delete');

Route::resource('admin/levels','LevelController');
Route::get('admin/levels/delete/{id}','LevelController@delete');

Route::resource('admin/plans','PlanController');
Route::get('admin/plans/delete/{id}','PlanController@delete');

Route::resource('admin/users','UserController');
Route::get('admin/transactions','TransactionController@index');

Route::get('address','MainController@addresses');
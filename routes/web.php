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

Route::get('/','HomeController@index')->name('home');

Route::get('/futures','FutureController@index')->name('futures.index');

Route::get('/futures/create','FutureController@showCreateForm')->name('futures.create');
Route::post('/futures/create','FutureController@create');

Route::get('/futures/{future_id}/edit','FutureController@showEditForm')->name('futures.edit');
Route::post('/futures/{future_id}/edit','FutureController@edit');

Route::delete('/futures/{future_id}/delete','FutureController@delete')->name('futures.delete');


Route::get('/ideal/create','IdealController@showCreateForm')->name('ideal.create');
Route::post('/ideal/create','IdealController@create');

Route::get('/ideal/edit','IdealController@showEditForm')->name('ideal.edit');
Route::post('/ideal/edit','IdealController@edit');

Auth::routes();

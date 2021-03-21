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
Route::post('/futures/{future_id}/update','FutureController@update')->name('futures.update');

Route::get('/ideal/create','IdealController@showCreateForm')->name('ideals.create');
Route::post('/ideal/create','IdealController@create');

Route::get('/ideal/edit','IdealController@showEditForm')->name('ideals.edit');
Route::post('/ideal/edit','IdealController@edit');

Route::get('/reportcontents/create','ReportContentController@showCreateForm')->name('reportcontents.create');
Route::post('/reportcontents/create','ReportContentController@create');

Route::delete('/reportcontents/{reportcontent_id}/delete','ReportContentController@delete')->name('reportcontents.delete');

Route::get('/company/create','CompanyController@showCreateForm')->name('companies.create');
Route::post('/company/create','CompanyController@create');

Route::get('/company/edit','CompanyController@showEditForm')->name('companies.edit');
Route::post('/company/edit','CompanyController@edit');

Route::get('/team/create','TeamController@showCreateForm')->name('teams.create');
Route::post('/team/create','TeamController@create');

Route::get('/team/edit','TeamController@showEditForm')->name('teams.edit');
Route::post('/team/edit','TeamController@edit');

Auth::routes();

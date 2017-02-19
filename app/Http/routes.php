<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PagesController@home');

Route::get('/jeux','PagesController@jeux');

Route::get('/getIK','PagesController@ik');

Route::get('/logout','ConnectController@logout');

Route::post('/login','ConnectController@login');

Route::get('/cas','ConnectController@casLogin');

Route::post('/ik/date','IKController@getByDate');

Route::post('/article/{id}', 'ArticleController@update');

Route::post('article/{id}/like','ArticleController@like');

Route::post('/article/{id}/commentaire','ArticleController@comment');

Route::post('/article/{id}/valider','ArticleController@valider');

Route::post('/categorie/{id}', 'CatController@update');

Route::post('/actuskes/{id}', 'ActusKesController@update');

Route::post('/ik/{numero}', 'IKController@update');


Route::resource('article', 'ArticleController');

Route::resource('khote', 'KhoteController');

Route::resource('actuskes','actusKesController');

Route::resource('categorie','CatController');

Route::resource('ik','IKController');

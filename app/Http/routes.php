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

Route::post('/article/{id}', 'ArticleController@update');

Route::post('/article/{id}/commentaire','ArticleController@ajouterCommentaire');

Route::resource('article', 'ArticleController');

Route::resource('khote', 'KhoteController');

Route::resource('actuskes','actusKesController');

Route::get('/jeux','PagesController@jeux');

Route::get('/rubrique/{$type}','PagesController@rubrique');






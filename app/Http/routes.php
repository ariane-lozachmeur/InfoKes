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

Route::resource('article', 'ArticleController');

Route::get('/jeux','PagesController@jeux');

Route::get('/actuskes','PagesController@actuskes');

Route::get('/khotes','PagesController@khotes');

Route::get('/rubrique/{$type}','PagesController@rubrique');

Route::post('/rediger','FormController@postArticle');






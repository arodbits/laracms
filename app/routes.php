<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


Route::get('/login','AuthWithPasswordController@index');
Route::post('/login','AuthWithPasswordController@doLogin');

// Facebook Login Routes
Route::get('login/facebook', 'AuthWithFacebookController@facebookRedirect');
Route::get('login/facebookCallback', 'AuthWithFacebookController@facebookCallback');


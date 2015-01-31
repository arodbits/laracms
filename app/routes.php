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

	// return View::make('hello');
		$user = new \LaracmsApp\Repository\UserEloquentRepository(new \LaracmsApp\User);
		
		// $data = array('email'=>'carlos@gmail.com', 'password'=>'1234');
		// $user->create($data);
		dd($user->getFirstBy('email','carlos@gmail.com'));
});

Route::get('/login','FacebookLoginController@index');
Route::get('/login/facebookCallback','FacebookLoginController@facebookCallback');

Route::get('dashboard', 'DashboardController@index');

Route::get('/login/{provider}', 'LoginController@index');
Route::get('/login/{provider}/callback', 'LoginController@callback');




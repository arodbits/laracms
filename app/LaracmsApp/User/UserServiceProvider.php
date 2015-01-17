<?php 
namespace LaracmsApp\User;

use \Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider{

	public function register(){
		$this->app->bind("UserRepositoryInterface", function(){
			return new UserMySQLRepository;
		});
	}

}
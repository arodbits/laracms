<?php 
namespace LaracmsApp\Authentication; 
use Illuminate\Support\ServiceProvider;

class SocialServiceProvider extends ServiceProvider{

	public function register(){
		$this->RegisterSocialAuthManager();
		$this->RegisterTwitterProvider();
	}

	public function RegisterTwitterProvider(){
		$this->app['authentication.twitterProvider'] = $this->app->share(function(){
			return 
		});
	}

	public function RegisterSocialAuthManager(){
		$this->app[''] = $this->app->share(function(){
			return new SocialAuthManager;
		});
	}

}
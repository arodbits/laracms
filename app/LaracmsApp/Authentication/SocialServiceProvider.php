<?php 
namespace LaracmsApp\Authentication; 
use Illuminate\Support\ServiceProvider;
use League\OAuth1\Client\Server\Twitter;

class SocialServiceProvider extends ServiceProvider{

	public function register(){
		$this->RegisterSocialAuthManager();
		$this->RegisterTwitterProvider();
	}

	public function RegisterTwitterProvider(){
		$this->app->bindShared('authentication.twitterProvider', function(){
			return new Twitter(array(
				"identifier"	=> $this->app['config']->get('auth.providers.twitter.identifier'),
				"secret"		=> $this->app['config']->get('auth.providers.twitter.secret'),
				"callback_url"	=> $this->app['config']->get('auth.providers.twitter.callback_url')
			));
		});
	}

	public function RegisterSocialAuthManager(){
		$this->app->bindShared('LaracmsApp\Authentication\SocialAuthManager', function(){
			return new SocialAuthManager;
		});
	}

	public function boot(){
		$this->app['LaracmsApp\Authentication\SocialAuthManager']->set('twitter',$this->app['authentication.twitterProvider']);
	}

}
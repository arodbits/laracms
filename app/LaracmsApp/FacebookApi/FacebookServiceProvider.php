<?php 
namespace LaracmsApp\FacebookApi;

use Illuminate\Support\ServiceProvider;
use Facebook\FacebookSession;

class FacebookServiceProvider extends ServiceProvider{

	/*
	 * Register the ServiceProvider
	 *
	 * @return voic
	*/

	public function Register(){

		$this->app->bind('facebook', function(){

			// FacebookApi Application Id
			$appId = \Config::get('facebookApi.appId');
			// FacebookApi Application Secret
			$appSecret = \Config::get('facebookApi.appSecret');
			// Connection with FacebookApi
			FacebookSession::setDefaultApplication($appId, $appSecret);

			$helper = new MyFacebookRedirectLoginHelper(\Config::get('facebookApi.callbackUrl'));
			
			return new FacebookLogin($helper);

		});

	}

}

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

		$this->app->bind('FacebookLogin', function(){
			
			// FacebookApi Application Id
			$appId = \Config::get('facebookApi.appId');
			// FacebookApi Application Secret
			$appSecret = \Config::get('facebookApi.appSecret');
			// Connection with the FacebookApi
			FacebookSession::setDefaultApplication($appId, $appSecret);
			// Get the helper from the call
			$helper = new MyFacebookRedirectLoginHelper(\Config::get('facebookApi.callbackUrl'));
			// return an instance of the class FacebookLogin. The class takes a MyFacebookRedirectLoginHelper Parameter  
			return new FacebookLogin($helper);

		});

	}

}

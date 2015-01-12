<?php 
namespace LaracmsApp\FacebookApi;
use Facebook\FacebookSession;

class FacebookLogin {

	protected $helper;

	public function __construct($redirectUrl){

		// FacebookApi Application Id
		$appId = \Config::get('facebookApi.appId');
		// FacebookApi Application Secret
		$appSecret = \Config::get('facebookApi.appSecret');
		// Connection with FacebookApi
		FacebookSession::setDefaultApplication($appId, $appSecret);
		/* save locally Helper class for getting a facebookLoginUrl, 
		 * facebookLogoutUrl or sessionFromRedirect. 
		*/
		$this->helper = new MyFacebookRedirectLoginHelper($redirectUrl);
	}
	/*
	 * @return FacebookSession object 
	 */
	public function getSession(){
		return $this->helper->getSessionFromRedirect();
	}
	/*
	 * @param next_url redirect url 
	 */
	public function getLogoutUrl($next_url){
		$session = $this->getSession();
		$this->helper->getLogoutUrl($session, $next_url);
	}
	/*
	 * @return String url 
	 */
	public function getLoginUrl(){
		return $this->helper->getLoginUrl();
	}

} 

